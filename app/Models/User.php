<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* ======================
       RELATIONSHIPS
    ====================== */

    // User booking locker
    public function lockerSessions()
    {
        return $this->hasMany(LockerSession::class);
    }

    // Courier adding items
    public function addedItems()
    {
        return $this->hasMany(LockerItem::class, 'added_by');
    }

    // Face-recognition taker (optional)
    public function takerProfile()
    {
        return $this->hasOne(Taker::class);
    }

    // Notifications
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /* ======================
       HELPERS
    ====================== */

    public function isUser()
    {
        return $this->role === 'user';
    }

    public function isCourier()
    {
        return $this->role === 'courier';
    }
}
