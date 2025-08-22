<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'every_day',
        'week_days',
        'goal',
        'current',
        'active'
    ];

    protected $casts = [
        'week_days' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function logs()
    {
        return $this->hasMany(TrainLog::class);
    }
}
