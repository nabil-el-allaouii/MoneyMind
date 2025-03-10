<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Notifications\BudgetExceedNotification;

class BudgetCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:budget-check';

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
        $users = User::with('alert', 'depense')->get();
        foreach ($users as $user) {
            $globalAlerts = $user->alert->where('type', 'global');
            if ($user->budget > 0) {
                $expenses = $user->depense->sum('price');
                $totalBudget = $user->budget + $expenses;
                $percentageSpent = ($expenses / $totalBudget) * 100;
                foreach ($globalAlerts as $alert) {
                    if ($percentageSpent > $alert->percentage) {
                        $user->notify(new BudgetExceedNotification($percentageSpent));
                        $this->info($user->name.' Has excceeded his budget by :'.$percentageSpent);
                    }
                }
            }
        }
    }
}
