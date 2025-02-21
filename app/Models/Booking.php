<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'check_in',
        'check_out',
        'number_of_rooms',
        'email',
        'phone',
        'visitor_name',
        'room_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
