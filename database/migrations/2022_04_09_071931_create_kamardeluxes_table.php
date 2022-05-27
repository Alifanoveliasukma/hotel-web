<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamardeluxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamardeluxes', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kamar')->nullable();
            $table->string('no_kamar')->nullable();
            $table->string('foto_kamar')->nullable();
            $table->string('fasilitas_kamar')->nullable();
            $table->integer('stok_kamar')->nullable();
            $table->integer('harga_kamar')->nullable();
            $table->string('deskripsi_kamar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamardeluxes');
    }
}
