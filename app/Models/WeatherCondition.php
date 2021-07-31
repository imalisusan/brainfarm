<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'condition', 
        'condition_desc', 
        'condition_icon',
        'temperature',
        'pressure',
        'humidity',
    ];
}
