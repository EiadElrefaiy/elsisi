<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'salary',
    ];

        // Define the relationship with the Attendance model
        public function attendances()
        {
            return $this->hasMany(Attendance::class);
        }
    
        // Define the relationship with the Attendance model
        public function absences()
        {
            return $this->hasMany(Absence::class);
        }
        
        public function rewards()
        {
            return $this->hasMany(Reward::class);
        }
    
        public function discounts()
        {
            return $this->hasMany(Discount::class);
        }
        
}
