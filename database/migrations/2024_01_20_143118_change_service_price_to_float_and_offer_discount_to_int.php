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
        Schema::table('offers', function (Blueprint $table) {
            $table->integer("discount")->change();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->float("price", 10, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->text("discount")->change();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->integer("price")->change();
        });
    }
};
