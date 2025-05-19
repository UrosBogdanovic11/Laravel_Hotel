<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('PaymentID'); // Примарни кључ

            // Страни кључ за резервацију
            $table->unsignedBigInteger('ReservationID');
            $table->foreign('ReservationID')
                  ->references('ReservationID') // Референца на примарни кључ у reservations табели
                  ->on('reservations')
                  ->onDelete('cascade'); // Опционално: бриши плаћања ако се обрише резервација

            // Остала поља
            $table->decimal('Amount', 10, 2); // Нпр. 100.50 (10 цифара, 2 децимале)
            $table->string('Status')->default('pending'); // Подразумевани статус

            
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};