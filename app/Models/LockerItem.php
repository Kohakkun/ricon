<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LockerItem extends Model
{
    protected $fillable = [
        'session_id', 'item_code', 'added_by',
        'added_at', 'photo_in',
    ];

    public function session()
    {
        return $this->belongsTo(LockerSession::class, 'session_id');
    }

    public function courier()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

}
