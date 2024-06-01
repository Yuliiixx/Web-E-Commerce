<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriTable extends Migration
{
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id('id_kategori');  // Menggunakan metode id() untuk primary key
            $table->string('nama_kategori');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori');
    }
}
