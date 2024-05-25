<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Delivery extends Pivot
{
    use HasFactory;

    protected $table = 'delivery';

    protected $fillable = [
        'offer_id',
        'representative_id',
        'line',
        'price',
    ];

}
