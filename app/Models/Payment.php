<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'payments';
    protected $primaryKey = 'PaymentID';
    protected $fillable = ['ReservationID', 'Amount', 'Status'];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'ReservationID');
    }
}