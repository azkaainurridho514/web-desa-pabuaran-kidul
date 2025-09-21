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
        Schema::create('home_information', function (Blueprint $table) {
            $table->id();
            $table->string('total_jiwa');
            $table->string('total_laki_laki');
            $table->string('total_perempuan');
            $table->string('total_anak_anak');
            $table->string('total_remaja');
            $table->string('total_dewasa');
            $table->string('total_orang_tua');
            $table->string('total_kepala_keluarga');
            $table->string('wilayah_administratif');
            // $table->string('luas_desa')->nullable();
            $table->string('jumlah_rt_rw')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_information');
    }
};
