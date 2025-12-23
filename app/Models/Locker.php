<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locker extends Model {
    protected $fillable = ['locker_code', 'status', 'active_session_id'];

    public function sessions() {
        return $this->hasMany(LockerSession::class);
    }

    public function activeSession() {
        return $this->belongsTo(LockerSession::class, 'active_session_id');
    }
}

