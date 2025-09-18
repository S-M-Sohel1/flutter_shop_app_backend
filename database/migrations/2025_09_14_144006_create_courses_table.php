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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_token');
            $table->string('thumbnail');
            $table->text('description')->nullable();
            $table->smallInteger('type_id');
            $table->float('price');
            $table->float('lesson_num')->nullable();
            $table->float('video_length')->nullable();
            $table->float('follow')->nullable();
            $table->float('score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
