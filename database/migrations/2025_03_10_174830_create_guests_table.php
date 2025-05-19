<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            // Примарни кључ (GuestID уместо подразумеваног id)
            $table->bigIncrements('GuestID');

            // Поља из модела
            $table->string('JMBG')->unique(); // Јединствени JMBG
            $table->string('Name');
            $table->string('Surname');
            $table->string('Email')->unique(); // Јединствена е-пошта
            $table->string('Phone');

          
        });
    }

    public function down()
    {
        Schema::dropIfExists('guests');
    }
};