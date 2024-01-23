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
        Schema::table('rooms_types', function (Blueprint $table) {
            $table->integer('rooms_number')->after('people_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms_types', function (Blueprint $table) {
            $table->dropColumn('rooms_number');
        });
    }
};
