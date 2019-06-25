<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontrolObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrol_obat', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('kontrol_id')->unsigned();
            $table->integer('obat_id')->unsigned();
            $table->integer('dosis_konsumsi');
            $table->string('jadwal_konsumsi')->nullable();
            $table->enum('aturan_pakai',['sesudah_makan','sebelum_makan']);
            $table->integer('total_obat');

            $table->timestamps();
        });

        Schema::table('kontrol_obat', function (Blueprint $table){
            $table->foreign('kontrol_id')
             ->references('id')->on('kontrol')
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
        Schema::dropIfExists('kontrol_obat');
    }
}
