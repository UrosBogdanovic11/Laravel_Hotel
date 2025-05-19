<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            // Примарни кључ
            $table->bigIncrements('ReservationID');

            // Страни кључеви (провери да ли је GuestID исправно име у табели guests!)
            $table->unsignedBigInteger('UserID'); // 👈 **Напомена: Овде је вероватно грешка у имену (треба GuestID?)**
            $table->unsignedBigInteger('RoomID');

            // Поља
            $table->dateTime('CheckIn');
            $table->dateTime('CheckOut');
            $table->string('Status')->default('active'); // нпр. "active", "cancelled", "completed"


            // Спољни кључеви
            $table->foreign('UserID')
                  ->references('UserID') // Провери да ли је GuestID примарни кључ у guests табели
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('RoomID')
                  ->references('RoomID')
                  ->on('rooms')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};