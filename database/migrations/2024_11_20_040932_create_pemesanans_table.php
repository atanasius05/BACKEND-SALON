<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id('id_pemesanan');
            $table->unsignedBigInteger('id_layanan');
            $table->unsignedBigInteger('id_pengguna');
            $table->unsignedBigInteger('id_barber');
            $table->date('tanggal_pemesanan');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_layanan')->references('id_layanan')->on('layanan')->onDelete('cascade');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
            $table->foreign('id_barber')->references('id_barber')->on('barber')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
};