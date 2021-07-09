<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*  NAMA : Fajar Agsa Hatmal
    NIM  : 1810530165
*/

class CreatePerjalanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perjalanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wisata_id')->constrained('wisatas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_perjalanan');
            $table->string('tujuan_perjalanan');
            $table->string('tanggal');
            $table->string('fasilitas');
            $table->text('keterangan');
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
        Schema::dropIfExists('perjalanans');
    }
}
