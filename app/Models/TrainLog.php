<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainLog extends Model
{
    protected $fillable = [
        'train_id',
        'log_at',
        'active'
    ];

    public function train()
    {
        return $this->belongsTo(Train::class);
    }
}
