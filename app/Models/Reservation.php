<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reservation extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'reservations';
    protected $primaryKey = 'ReservationID';
    protected $fillable = ['UserID', 'RoomID', 'CheckIn', 'CheckOut', 'Status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'RoomID');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'ReservationID');
    }

    
}
