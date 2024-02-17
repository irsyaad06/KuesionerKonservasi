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
            $table->string('role');
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
            $table->string('ket1');
            $table->string('ket2');
            $table->string('ket3');
            $table->string('ket4');
            $table->string('ket5');
            $table->string('ket6');
            $table->string('ket7');
            $table->string('ket8');
            $table->string('ket9');
            $table->string('ket10');
            $table->string('ket11');
            $table->string('ket12');
            $table->string('ket13');
            $table->string('ket14');
            $table->string('ket15');
            $table->string('ket16');
            $table->string('ket17');
            $table->string('ket18');
            $table->string('ket19');
            $table->string('ket20');
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
