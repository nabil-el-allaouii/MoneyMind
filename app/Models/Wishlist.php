<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Wishlist extends Model
{
    protected $fillable = ['name' , 'target_price', 'monthly_contribution', 'user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
