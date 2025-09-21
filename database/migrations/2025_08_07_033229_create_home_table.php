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
        Schema::create('home', function (Blueprint $table) {
            $table->id();
            $table->string('title_nav');
            $table->string('title_header');
            $table->text('visi');
            $table->text('misi');
            $table->text('sejarah');
            $table->text('batas_desa_utara');
            $table->text('batas_desa_timur');
            $table->text('batas_desa_selatan');
            $table->text('batas_desa_barat');
            // $table->string('jumlah_penduduk')->nullable();
            $table->text('maps')->nullable();
            $table->string('logo')->nullable();
            $table->text('sambutan_kepala_desa');
            $table->string('video_profile_title')->nullable();
            $table->string('video_profile_link')->nullable();
            $table->string('stok_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home');
    }
};
