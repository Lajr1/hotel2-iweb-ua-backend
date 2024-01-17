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
        Schema::table('users', function (Blueprint $table) {
            $table->string("location", 100)->nullable()->change();
            $table->string("country", 100)->nullable()->change();

            $table->integer("zip_code")->nullable()->change();
            $table->string("address", 200)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string("location", 100)->change();
            $table->string("country", 100)->change();

            $table->integer("zip_code")->change();
            $table->string("address", 200)->change();
        });
    }
};
