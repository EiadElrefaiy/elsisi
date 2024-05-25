<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_num',
        'offer_date',
        'state',
        'client_id', // Foreign key included in fillable
    ];

    // Define the relationship with the Client model
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Define the relationship with the Supplier model
    public function items()
    {
        return $this->hasMany(OfferItem::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'offer_items');
    }

    public function representatives()
    {
        return $this->belongsToMany(Representative::class, 'delivery')
                    ->using(Delivery::class)
                    ->withTimestamps();
    }

}
