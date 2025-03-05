<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Depense extends Model
{

    protected $fillable = ['price', 'type', 'depense_date', 'user_id','category_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
