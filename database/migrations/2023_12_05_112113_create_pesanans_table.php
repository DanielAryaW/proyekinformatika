<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id(); // Ini secara otomatis diatur sebagai auto_increment dan primary key
            $table->integer('jumlah')->unsigned(); // Kolom integer tanpa auto_increment
            $table->text('deskripsi');
            $table->string('foto_desain')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
