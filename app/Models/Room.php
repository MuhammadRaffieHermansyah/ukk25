<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'room_type_id',
        'room_facilities_id',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
    public function roomFacilities()
    {
        return $this->belongsTo(RoomFacility::class);
    }
}
