<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalKonsumsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_konsumsi', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('kontrol_obat_id')->unsigned();
            $table->datetime('jadwal_konsumsi');
            $table->enum('diminum', ['ya', 'tidak', 'belum'])->default('belum');
            $table->timestamps();
        });

        Schema::table('jadwal_konsumsi', function (Blueprint $table){
            $table->foreign('kontrol_obat_id')
             ->references('id')->on('kontrol_obat')
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
        Schema::dropIfExists('jadwal_konsumsi');
    }
}
