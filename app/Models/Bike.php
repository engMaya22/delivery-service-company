<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;

    protected $guarded = [];

    const AVAILABLE = 1;
    const IDLE = 2;
   
    public function drivers(){
        return $this->belongsToMany(Driver::class)
                    ->withPivot(['departure_time','arrival_time'])
                    ->withTimestamps();
    }

}
