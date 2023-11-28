<?php

// database/migrations/xxxx_xx_xx_create_jasas_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJasasTable extends Migration
{
    public function up()
    {
        Schema::create('jasas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jasa');
            $table->integer('harga_jasa', 8, 2);
            $table->text('deskripsi');
            $table->string('foto_desain')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jasas');
    }
}