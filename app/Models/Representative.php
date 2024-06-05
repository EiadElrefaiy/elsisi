<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'password',
        'created_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Define the relationship with the Money model
    public function money()
    {
        return $this->hasMany(Money::class);
    }



    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'delivery')
                    ->using(Delivery::class)
                    ->withTimestamps();
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

}
