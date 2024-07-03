<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'quantity',
        'offer_id',
        'product_id',
        'notes',
    ];

    // Define the relationship with the Offer model
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
