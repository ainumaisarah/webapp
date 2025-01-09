<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    protected $primaryKey = 'booking_id';
    protected $fillable = ['user_id', 'room_id', 'check_in_date', 'check_out_date'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->booking_id)) {
                $model->booking_id = 'BOOK-' . strtoupper(uniqid());
            }
            if (empty($model->guest_count)) {
                $model->guest_count = 1; // Default 1 guest
            }
            if (empty($model->booking_status)) {
                $model->booking_status = 'pending'; // Default status
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }

    public function admins()
    {
        return $this->hasMany(Admin::class, 'booking_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'booking_id');
    }
}
