<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CropSuggestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'crop_id',
        'farmer_id',  
    ];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }
}
