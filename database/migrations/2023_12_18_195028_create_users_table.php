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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger("user_type");
            $table->integer("phone_number");
            $table->string("location", 100);
            $table->string("country", 100);
            $table->integer("zip_code");
            $table->string("address", 200);
            $table->string("image_path", 300);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_type')->references('id')->on('users_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
