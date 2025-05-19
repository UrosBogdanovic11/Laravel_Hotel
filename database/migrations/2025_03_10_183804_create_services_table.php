<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('ServiceID'); // Примарни кључ
            
            $table->string('Name')->unique();   // Јединствено име услуге
            $table->decimal('Price', 10, 2);   // Цена (10 цифара, 2 децимале)
            $table->text('Description')->nullable(); // Опис (може бити NULL)
            
           
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
};