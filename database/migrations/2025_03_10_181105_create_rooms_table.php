<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            // Примарни кључ (RoomID уместо подразумеваног id)
            $table->bigIncrements('RoomID');

            // Поља из модела
            $table->string('RoomNumber')->unique(); // Јединствени број собе
            $table->string('Type');                  // Тип собе (нпр. "Standard", "Deluxe")
            $table->decimal('Price', 10, 2);        // Цена (нпр. 100.00)
            $table->string('Status')->default('available'); // Статус (подразумевано "available")

           
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};