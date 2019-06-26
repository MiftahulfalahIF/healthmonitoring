<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitoringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('no_monitoring')->nullabale()->default("");
            $table->integer('pasien_id')->unsigned();
            $table->integer('dokterkonsultan_id')->unsigned();
            $table->string('klinik_awal');
            $table->date('tgl_mulai');
            $table->integer('tahap_pengobatan')->nullabale();

            /* Kontrol yg harus dilakukan */
            $table->integer ('jml_kontrol');

            $table->enum('status', ['belum','berjalan','selesai','do']);
            


            $table->timestamps();

        });

        Schema::table('monitoring', function (Blueprint $table){

           
            $table->foreign('dokterkonsultan_id')
            ->references('id')->on('dokter')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('pasien_id')
            ->references('id')->on('pasien')
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
        Schema::dropIfExists('monitoring');
    }
}
