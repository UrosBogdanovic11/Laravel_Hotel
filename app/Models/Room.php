<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $primaryKey = 'RoomID';
    protected $fillable = ['RoomNumber', 'Type', 'Price', 'Status'];

    public $timestamps = false;

    public function reservation()
    {
        return $this->hasMany(Reservation::class, 'RoomID');
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class, 'RoomID');
    }
}