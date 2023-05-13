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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable(); // buat field yg namanya "class_id" dirujukkan ke tabel kotas
            $table->foreign('company_id')->references('id')->on('companies'); // jadikan sebagai foreign key, ambil rujukanny dr tabel kotas (PK => id)
            $table->string('role');
            $table->integer('range_salary');
            $table->enum('level', ['intern','entry','associate','mid-senior','director','excutive']);
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
        Schema::dropIfExists('vacancies');
    }
};
