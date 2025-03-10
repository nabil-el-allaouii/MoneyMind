<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Depense;
use App\Models\User;
use App\Models\Alert;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];
    public function depense()
    {
        return $this->hasMany(Depense::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function alert()
    {
        return $this->hasOne(Alert::class);
    }
}
