<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'phone_no', 'nid', 'train_name', 'class', 'departure_station', 'arrival_station', 'departure_time', 'departure_date'
    ];
}
