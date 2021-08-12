<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmerCrop extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_id',
        'crop_id',
        'amount',
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
