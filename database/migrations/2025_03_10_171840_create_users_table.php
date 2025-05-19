<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // Примарни кључ (UserID уместо подразумеваног id)
            $table->bigIncrements('UserID'); 

            // Поља из модела
            $table->string('Name');
            $table->string('Surname');
            $table->string('Email')->unique(); // Е-пошта мора бити јединствена
            $table->string('password');
            $table->string('role'); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};