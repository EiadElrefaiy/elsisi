<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_num',
        'name',
        'client_id',
        'represenative_id',
        'total',
        'payed',
        'state',
        'financial_state',
        'notes',
        'created_at',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function items()
    {
        return $this->hasMany(OfferItem::class);
    }

    public function returns()
    {
        return $this->hasMany(Returns::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'offer_items');
    }

    public function representative()
    {
        return $this->belongsTo(Representative::class);
    }

}
