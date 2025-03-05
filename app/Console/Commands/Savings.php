<?php

namespace App\Console\Commands;

use App\Models\Saving;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Savings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:savings';

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
        $savings = Saving::with('user')->whereHas('user', function ($query) use ($today) {
            $query->where('salaire_date', 12);
        })->get();
        foreach ($savings as $saving) {
            if($saving->monthly_contribution + $saving->current_amount > $saving->target_amount){
                $left = $saving->target_amount - $saving->current_amount;
                $saving->user->budget -= $left;
                $saving->user->save();
                $saving->current_amount += $left;
                $saving->save();
            }
            elseif ($saving->current_amount !== $saving->target_amount && $saving->current_amount < $saving->target_amount) {
                $saving->user->budget -= $saving->monthly_contribution;
                $saving->user->save();
                $saving->current_amount += $saving->monthly_contribution;
                $saving->save();
                $this->info('Updated savings for'.$saving->user->name);
            }else{
                return $this->info("Saving target reached for {$saving->user->name}");
            }
            return $this->info("Updated budget for {$saving->user->name}");
        }
    }
}
