<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
    public function roomFacilities()
    {
        return $this->belongsTo(RoomFacility::class);
    }
}
