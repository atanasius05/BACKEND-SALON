<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->id('id_review');
            $table->unsignedBigInteger('id_barber');
            $table->integer('rating')->comment('Rating 1-5');
            $table->text('komentar')->nullable();
            $table->date('tanggal_review');
            $table->timestamps();

            // Foreign key for id_barber
            $table->foreign('id_barber')->references('id_barber')->on('barber')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('review');
    }
};
