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

    protected $appends = [
        'formated_start_date',
        'formated_end_date',
        'progress', 'trained_today'
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

    public function getFormatedStartDateAttribute()
    {
        return date('d/m/Y', strtotime($this->start_date));
    }

    public function getFormatedEndDateAttribute()
    {
        return $this->end_date ? date('d/m/Y', strtotime($this->end_date)) : null;
    }

    public function getProgressAttribute()
    {
        $percent = min(100, (int)(($this->current / $this->goal) * 100));
        if ($this->goal == 0) {
            $percent = 0;
        } else min(100, (int)(($this->current / $this->goal) * 100));

        if ($percent < 20) {
            $percent = 20;
        }

        return $percent;
    }

    public function getTrainedTodayAttribute()
    {
        $today = date('Y-m-d');
        return $this->logs()->whereDate('created_at', $today)->exists();
    }

}
