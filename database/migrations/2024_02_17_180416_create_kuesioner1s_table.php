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
        Schema::create('kuesioner1', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('daerah_id');
            $table->foreignId('role_id');
            $table->string('q1');
            $table->string('q2');
            $table->string('q3');
            $table->string('q4');
            $table->string('q5');
            $table->string('q6');
            $table->string('q7');
            $table->string('q8');
            $table->string('q9');
            $table->string('q10');
            $table->string('q11');
            $table->string('q12');
            $table->string('q13');
            $table->string('q14');
            $table->string('q15');
            $table->string('q16');
            $table->string('q17');
            $table->string('q18');
            $table->string('q19');
            $table->string('q20');
            $table->string('ket1')->nullable();
            $table->string('ket2')->nullable();
            $table->string('ket3')->nullable();
            $table->string('ket4')->nullable();
            $table->string('ket5')->nullable();
            $table->string('ket6')->nullable();
            $table->string('ket7')->nullable();
            $table->string('ket8')->nullable();
            $table->string('ket9')->nullable();
            $table->string('ket10')->nullable();
            $table->string('ket11')->nullable();
            $table->string('ket12')->nullable();
            $table->string('ket13')->nullable();
            $table->string('ket14')->nullable();
            $table->string('ket15')->nullable();
            $table->string('ket16')->nullable();
            $table->string('ket17')->nullable();
            $table->string('ket18')->nullable();
            $table->string('ket19')->nullable();
            $table->string('ket20')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuesioner1');
    }
};
