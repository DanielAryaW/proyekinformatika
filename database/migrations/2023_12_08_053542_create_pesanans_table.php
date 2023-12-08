<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jasa_id');
            $table->unsignedBigInteger('client_id');
            $table->string('no_pesanan')->unique();
            $table->string('nama_jasa');
            $table->string('nama_pemesan');
            $table->integer('jumlah')->unsigned();
            $table->text('deskripsi');
            $table->string('foto_desain')->nullable();
            $table->integer('harga_total', 10, 2)->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();

            // Menambahkan foreign key constraints
            $table->foreign('jasa_id')->references('id')->on('jasas');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
