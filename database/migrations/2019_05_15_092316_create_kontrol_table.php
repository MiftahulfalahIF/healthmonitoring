<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontrolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrol', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('no_kontrol')->nullabale()->default("");
            $table->integer('monitoring_id')->unsigned();
            $table->integer('pasien_id')->unsigned();
            $table->integer('dpjp_id')->unsigned();
            $table->date("tgl_kontrol");
            $table->date("tgl_kembali");

            $table->timestamps();
        });

        Schema::table('kontrol', function (Blueprint $table){

           $table->foreign('monitoring_id')
            ->references('id')->on('monitoring')
            ->onDelete('cascade')->onUpdate('cascade');

           $table->foreign('pasien_id')
            ->references('id')->on('pasien')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('dpjp_id')
            ->references('id')->on('dokter')
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
        Schema::dropIfExists('kontrol');
    }
}
