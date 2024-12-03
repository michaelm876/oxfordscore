<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $attributes = [
        'is_active' => true,
    ];

    public function hips()
    {
        return $this->hasMany(Hip::class);
    }

    public function knees()
    {
        return $this->hasMany(Knee::class);
    }

    public function shoulders()
    {
        return $this->hasMany(Shoulder::class);
    }

}