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
        'pending',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function income()
    {
        return $this->hasmMany(Income::class);
    }

    public function expenditure()
    {
        return $this->hasmMany(Expenditure::class);
    }
}
