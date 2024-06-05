<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'invoice_num',
        'image',
        'payed',
        'state',
        'total',
        'created_at',
    ];

    // Define the relationship with the Supplier model
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // Define the relationship with the Supplier model
    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'invoice_items');
    }

}
