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
            $table->unsignedBigInteger('class_id')->nullable(); // buat field yg namanya "class_id" dirujukkan ke tabel kotas
            $table->foreign('class_id')->references('id')->on('class'); // jadikan sebagai foreign key, ambil rujukanny dr tabel kotas (PK => id)
            $table->string('name_course');
            $table->string('image')->nullable();
            $table->integer('price');
            $table->string('description')->nullable();
            $table->enum('recommendation', ['Y','N']);
            $table->enum('status_publish', ['0','1'])->default('1');
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
