<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'state',
        'address',
    ];

    // Define the relationship with the Offer model
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

}
