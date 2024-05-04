<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','email','nid','price','train_name', 'class', 'departure_station', 'arrival_station', 'departure_time', 'departure_date','booking_timestamp','bogi','seat'
    ];
}
