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
            $table->string('golongan');
            $table->string('kategori');
            $table->string('bentuk');
            $table->string('indikasi');
            $table->string('dosis');
            $table->string('produsen');
            $table->rememberToken();
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
        Schema::dropIfExists('obat');
    }
}
