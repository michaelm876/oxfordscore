<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hip extends Model
{
    use HasFactory;

    protected $fillable = [
        'bed',
        'car',
        'chi',
        'consultant_id',
        'dob',
        'joint',
        'limping',
        'meal',
        'name',
        'pain',
        'shopping',
        'socks',
        'spasms',
        'stairs',
        'surgery_cancelled',
        'surgery_date',
        'surgery_notfv',
        'surgery_type',
        'type',
        'walking',
        'washing',
        'work',
    ];

    protected $dates = [
        'dob',
        'surgery_date',
    ];

    protected $casts = [
        'surgery_cancelled' => 'boolean',
        'surgery_notfv' => 'boolean',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['q'] ?? false) {
            $query->with('consultant')
                  ->where('name', 'like', '%' . request('q') . '%')
                  ->orWhere('chi', '=', request('q'))
                  ->orWhereHas('consultant', function($q) {
                      $q->where('name', 'like', '%' . request('q') . '%');
                  });
        }

    }

    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


}
