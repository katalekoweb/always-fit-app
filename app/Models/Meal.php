<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'every_day',
        'week_days',
        'active'
    ];

    protected $casts = [
        'week_days' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
