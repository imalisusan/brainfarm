<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'date',
        'amount',
        'description',
        'farmer_id',
    ];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
}
