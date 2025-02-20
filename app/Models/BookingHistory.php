<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingHistory extends Model
{
    protected $fillable = [
        'user_id',
        'check_in',
        'check_out',
        'number_of_rooms',
        'order_name',
        'order_email',
        'order_phone',
        'visitor_name',
        'room_id',
    ];
}
