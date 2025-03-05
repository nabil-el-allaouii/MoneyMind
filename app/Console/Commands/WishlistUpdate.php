<?php

namespace App\Console\Commands;

use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Console\Command;

class WishlistUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:wishlist-update';

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
        $wishlists = Wishlist::with('user')->whereHas('user', function ($query) {
            $query->where('salaire_date', 12);
        })->get();
        foreach ($wishlists as $wishlist) {
            if ($wishlist->monthly_contribution + $wishlist->saved_amount > $wishlist->target_price) {
                $left = $wishlist->target_price - $wishlist->saved_amount;
                $wishlist->user->budget -= $left;
                $wishlist->user->save();
                $wishlist->saved_amount += $left;
                $wishlist->save();
            } elseif ($wishlist->saved_amount !== $wishlist->target_price && $wishlist->saved_amount < $wishlist->target_price) {
                $wishlist->user->budget -= $wishlist->monthly_contribution;
                $wishlist->user->save();
                $wishlist->saved_amount += $wishlist->monthly_contribution;
                $wishlist->save();
                $this->info("Wishlist Updated for {$wishlist->user->name}");
            }
        }
    }
}
