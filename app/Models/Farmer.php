<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function expenditures()
    {
        return $this->hasMany(Expenditure::class);
    }

    public function crops()
    {
        return $this->hasMany(Crop::class);
    }

    public function cropsuggestions()
    {
        return $this->hasMany(CropSuggestion::class);
    }

}
