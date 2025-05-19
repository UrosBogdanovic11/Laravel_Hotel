<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 

return new class extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Додај UserID као nullable
            $table->unsignedBigInteger('UserID')->nullable()->after('ReservationID');
        });

        // Миграција података (ако постоји GuestID)
        if (Schema::hasColumn('reservations', 'GuestID')) {
            $reservations = DB::table('reservations')->get();
            foreach ($reservations as $reservation) {
                $guest = DB::table('guests')->where('GuestID', $reservation->GuestID)->first();
                if ($guest && $guest->UserID) {
                    DB::table('reservations')
                        ->where('ReservationID', $reservation->ReservationID)
                        ->update(['UserID' => $guest->UserID]);
                }
            }

            // Уклони GuestID
            Schema::table('reservations', function (Blueprint $table) {
                $table->dropForeign(['GuestID']);
                $table->dropColumn('GuestID');
            });
        }

        // Начини UserID обавезним и додај спољни кључ
        Schema::table('reservations', function (Blueprint $table) {
            $table->unsignedBigInteger('UserID')->nullable(false)->change();
            $table->foreign('UserID')->references('UserID')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['UserID']);
            $table->dropColumn('UserID');
            
            // Врати GuestID само ако guests табела постоји
            if (Schema::hasTable('guests')) {
                $table->unsignedBigInteger('GuestID');
                $table->foreign('GuestID')->references('GuestID')->on('guests')->onDelete('cascade');
            }
        });
    }
};