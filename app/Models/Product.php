<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'price',
    ];

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_items');
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'offer_items');
    }

    public function items()
    {
        return $this->hasMany(OfferItem::class);
    }

    public function returns()
    {
        return $this->hasMany(Returns::class);
    }

    public function invoice_items()
    {
        return $this->hasMany(OfferItem::class);
    }

}
