<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->string('nama');
            $table->string('paket');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->unsignedBigInteger('id_user'); // Menambahkan kolom id_user
            $table->timestamps();

            // Menambahkan foreign key
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
