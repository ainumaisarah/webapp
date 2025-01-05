<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable, HasProfilePhoto;

    protected $fillable = ['cust_id', 'cust_name', 'cust_email', 'cust_pass', 'cust_phone'];

    protected $hidden = [
        'cust_pass',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'cust_pass' => 'hashed',
    ];

    public function getAuthPassword()
    {
        return $this->cust_pass;
    }
}
