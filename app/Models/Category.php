<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Depense;
use App\Models\User;

class Category extends Model
{
    public function depense(){
        return $this->hasMany(Depense::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
