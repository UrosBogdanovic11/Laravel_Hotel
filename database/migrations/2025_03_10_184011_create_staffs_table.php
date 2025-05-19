<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->bigIncrements('StaffID'); 
            
            $table->string('Name');
            $table->string('Surname');
            $table->string('Position');       
            $table->date('EmploymentDate');   
            
           
        });
    }

    public function down()
    {
        Schema::dropIfExists('staffs');
    }
};