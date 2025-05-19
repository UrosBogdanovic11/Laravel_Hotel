<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->bigIncrements('maintenance_id'); 
            
          
            $table->unsignedBigInteger('RoomID');
            $table->foreign('RoomID')
                  ->references('RoomID')           
                  ->on('rooms')
                  ->onDelete('cascade');           
            
           
            $table->text('description');           
            $table->string('status')->default('pending'); 
            
          
        });
    }

    public function down()
    {
        Schema::dropIfExists('maintenances');
    }
};