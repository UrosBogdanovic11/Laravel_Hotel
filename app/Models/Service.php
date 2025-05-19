<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $primaryKey = 'ServiceID';
    protected $fillable = ['Name', 'Price', 'Description'];

    public function reservation()
    {
        return $this->belongsToMany(Reservation::class, 'reservation_service', 'ServiceID', 'ReservationID')
                   ->withPivot('Amount');
    }
}