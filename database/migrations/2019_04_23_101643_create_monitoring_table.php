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
            $table->integer('dpjp_id')->unsigned();
            $table->integer('dokterkonsultan_id')->unsigned();
            $table->integer('pasien_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('monitoring', function (Blueprint $table){

            $table->foreign('dpjp_id')
            ->references('id')->on('dokter')
            ->onDelete('cascade')->onUpdate('cascade');

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
