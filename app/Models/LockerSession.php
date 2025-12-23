<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LockerSession extends Model {
    protected $fillable = [
        'session_code', 'locker_id', 'user_id',
        'assigned_taker_id', 'taken_by',
        'status', 'started_at', 'taken_at', 'ended_at'
    ];

    public function locker() {
        return $this->belongsTo(Locker::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function assignedTaker() {
        return $this->belongsTo(Taker::class, 'assigned_taker_id');
    }

    public function takenBy() {
        return $this->belongsTo(Taker::class, 'taken_by');
    }

    public function items() {
        return $this->hasMany(LockerItem::class, 'session_id');
    }
}

