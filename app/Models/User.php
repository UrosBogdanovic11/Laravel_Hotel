<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'UserID';
    protected $fillable = [
        'Name', 'Surname', 'JMBG', 'Phone', 'Email', 'password', 'role'
    ];
    public $timestamps = false;

    protected $hidden = [
        'password'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'UserID');
    }


    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ($model->password) {
                $model->password = Hash::make($model->password);
            }
        });
    }
}