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
        Schema::create('course_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade')->onDelete('cascade');
            $table->foreignId('vedio_id')->constrained('course_vedios')->onDelete('cascade')->onDelete('cascade');
            $table->tinyInteger('status')->default(0)->comment('0 pending, 1 progress, 2 completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_histories');
    }
};
