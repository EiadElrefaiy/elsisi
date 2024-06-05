<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    use HasFactory;

    protected $fillable = [
        'representative_id',
        'price',
        'description',
        'operation',
        'created_at',
    ];

    // Define the relationship with the Offer model
    public function representative()
    {
        return $this->belongsTo(Representative::class);
    }

}
