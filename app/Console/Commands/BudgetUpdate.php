<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Carbon\Carbon;

class BudgetUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'budget:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Budget Updated';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = (int) Carbon::now()->format('d');
        $users = User::whereNotNull('salaire')->where('salaire_date',$today)->get();


        foreach($users as $user){
            $user->budget += $user->salaire;
            $user->save();
            $this->info("Updated budget for {$user->name}");
        }
        $this->info('User budgets have been updated successfully for today\'s matching users.');
    }
}
