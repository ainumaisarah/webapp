<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'review_id', 'cust_id', 'room_id', 'rating', 'review_text', 'review_date'
    ];
}
