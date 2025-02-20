<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomFacility extends Model
{
    protected $fillable = [
        'room_type',
        'image',
        'facilities',
    ];
}
