<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontrolobatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrolobat', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('kontrol_id')->unsigned();
            $table->integer('obat_id')->unsigned();
            //contoh dosis 1 X 5 tablet perhari , dosis_jadwal untuk 1, dosis_jumlah untuk 5 
            $table->integer('dosis_jadwal');
            $table->integer('dosis_jumlah');
            $table->integer('jumlah_obat');
            $table->enum('aturan_pakai',['sesudah_makan','sebelum_makan']);;

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
        Schema::dropIfExists('kontrolobat');
    }
}
