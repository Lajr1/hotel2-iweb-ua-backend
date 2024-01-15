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
        Schema::table('users_type', function (Blueprint $table) {
            $table->dropColumn("price");
        });

        Schema::table('rooms_types', function (Blueprint $table) {
            $table->integer("price");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_type', function (Blueprint $table) {
            $table->integer("price");
        });

        Schema::table('rooms_types', function (Blueprint $table) {
            $table->dropColumn("price");
        });
    }
};
