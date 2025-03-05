<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Depense;
use App\Models\Saving;
use App\Models\Wishlist;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'salaire',
        'salaire_date',
        'budget'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function reduceBudget($amount){
        $this->budget -= $amount;
        $this->save();
    }

    public function isAdmin(){
        return $this->role == 'admin';
    }
    public function isClient(){
        return $this->role == 'client';
    }
    public function depense(){
        return $this->hasMany(Depense::class);
    }
    public function savings(){
        return $this->hasMany(Saving::class);
    }
    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }
    public function notification(){
        return $this->hasMany(Notification::class);
    }
}
