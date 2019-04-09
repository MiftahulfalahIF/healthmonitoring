<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->enum('type', ['dokter_konsultan', 'dpjp']);
            $table->string('nama');
            $table->string('nik');
            $table->enum('unit',['bedah','paru','internis','syaraf'])->nullable();
            $table->enum('sub_unit', ['umum','orthopedi'])->nullable();
            $table->string('telepon');
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
        Schema::dropIfExists('dokter');
    }
}
