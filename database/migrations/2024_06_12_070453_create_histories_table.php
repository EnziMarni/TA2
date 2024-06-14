<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dokumen_id');
            $table->string('judul_dokumen');
            $table->text('deskripsi_dokumen')->nullable();
            $table->string('kategori_dokumen');
            $table->string('validasi_dokumen');
            $table->year('tahun_dokumen');
            $table->string('dokumen_file');
            $table->string('tags')->nullable();
            $table->timestamps();

            $table->foreign('dokumen_id')->references('id')->on('dokumens')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
