<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Driver extends  Authenticatable
{
    use HasApiTokens, HasFactory ,AuthenticatableTrait ;

    protected $guarded = [];

    public function bikes(){
        return $this->belongsToMany(Bike::class)
                    ->withPivot(['departure_time','arrival_time'])
                    ->withTimestamps();
    }
    
}
