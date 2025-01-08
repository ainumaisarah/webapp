<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'admin_name',
        'admin_email',
        'admin_pass',
        'booking_id',
    ];

    public function index()
    {
        // Return the admin dashboard view
        return view('admin');
    }

    // Define relationship with the Booking model
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
