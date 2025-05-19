<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Osoblje extends Model
{
    use HasFactory;

    protected $table = 'staffs';
    protected $primaryKey = 'StaffID';
    protected $fillable = ['Name', 'Surname', 'Position', 'eployment date'];
}