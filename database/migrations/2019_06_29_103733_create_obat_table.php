<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('kode', 100)->unique();
            $table->string('nama');
            $table->integer('golongan_id')->unsigned();
            $table->integer('kategori_id')->unsigned();
            $table->string('bentuk');
            $table->string('indikasi');
            $table->string('dosis');
            $table->string('produsen');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('obat', function (Blueprint $table){

            $table->foreign('golongan_id')
            ->references('id')->on('golongan_obat')
            ->onDelete('cascade')->onUpdate('cascade');


            $table->foreign('kategori_id')
            ->references('id')->on('kategori_obat')
            ->onDelete('cascade')->onUpdate('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obat');
    }
}
