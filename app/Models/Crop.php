<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'temperature',
        'lowest_temperature',
        'highest_temperature',
        'lowest_humidity',
        'highest_humidity',
        'lowest_atmospheric_pressure',
        'highest_atmospheric_pressure',
    ];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
    
    public function cropsuggestions()
    {
        return $this->hasMany(CropSuggestion::class);
    }
}
