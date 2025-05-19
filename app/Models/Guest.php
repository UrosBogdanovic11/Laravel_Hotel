<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $table = 'guests';
    protected $primaryKey = 'GuestID';
    protected $fillable = ['JMBG', 'Name', 'Surname', 'Email', 'Phone'];


    public function rezervacije()
    {
        return $this->hasMany(Reservation::class, 'GuestID');
    }
}