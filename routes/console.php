<?php

use App\Console\Commands\BudgetCheck;
use App\Console\Commands\BudgetUpdate;
use App\Console\Commands\Savings;
use App\Console\Commands\Subscription;
use App\Console\Commands\WishlistUpdate;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command(Subscription::class)->daily();
Schedule::command(BudgetUpdate::class)->daily();
Schedule::command(Savings::class)->daily();
Schedule::command(WishlistUpdate::class)->daily();
Schedule::command(BudgetCheck::class)->daily();