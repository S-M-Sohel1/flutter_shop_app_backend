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
            $table->integer('type')->nullable();
            $table->string('open_id')->nullable();
            $table->string('avatar')->nullable(); // if avatar column is also missing
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('type');
            $table->dropColumn('open_id');
            $table->dropColumn('avatar');
        });
    }
};
