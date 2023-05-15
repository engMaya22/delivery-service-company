<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeDriver extends Model
{
    use HasFactory;
    protected $table = 'bike_driver';
    public function driver(){
        return $this->belongsTo(Driver::class);
    }
    public function bike(){
        return $this->belongsTo(Bike::class);
    }
}
