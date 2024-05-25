<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'price',
        'employee_id',
        'operation'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
