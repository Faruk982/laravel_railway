<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class registration extends Model
{
    use HasFactory, Notifiable;
    // protected $table = 'registrations';
    protected $fillable =[
        'fullName',
        'email',
        'phoneNo',
        'NID',
        'birthdate',
        'Hometown',
        'password',
        'gender'
    ];
}
