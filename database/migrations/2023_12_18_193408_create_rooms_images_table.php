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
        Schema::create('rooms_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("room_type_id");
            $table->string("path", 300);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("room_type_id")->references("id")->on("rooms_types");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms_images');
    }
};
