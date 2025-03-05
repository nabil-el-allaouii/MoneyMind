<?php

namespace App\Console\Commands;

use App\Models\Depense;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Subscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:subscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = (int) Carbon::now()->format('d');
        $depenses = Depense::where('depense_date' , $today)->where('type' , 'recurrentes')->with('user')->get();

        foreach ($depenses as $depense) {
            $depense->user->budget -= $depense->price;
            $depense->user->save();
            $this->info("Updated budget for {$depense->user->name}");
        }
    }
}
