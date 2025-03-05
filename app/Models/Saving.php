<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Saving extends Model
{

    protected $fillable = ['name', 'target_amount', 'monthly_contribution','user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
