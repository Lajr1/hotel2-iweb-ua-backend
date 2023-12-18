<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offer_room_type_talbe', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_offer");
            $table->unsignedBigInteger("id_room_type");
            $table->dateTime("initial_date");
            $table->dateTime("end_date");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_room_type')->references('id')->on('rooms_types');
            $table->foreign('id_offer')->references('id')->on('offers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_room_type_talbe');
    }
};
