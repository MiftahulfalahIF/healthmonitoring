<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_dpjp')->unsigned();
            $table->integer('id_dokterkonsultan')->unsigned();
            $table->string('no_rekam');
            $table->timestamps();
            $table->string('nama');
            $table->string('nik');
            $table->string('alamat');
            $table->enum('jk',['l','p']);
            $table->enum('wanita_subur',['hamil','tidak_hamil']);
            $table->date('tgl_lahir');
            $table->decimal('bb', 3, 2);
            $table->decimal('tb', 3, 2);
            $table->enum('bentuk_oat',['kdt','kombipak']);
            $table->string('telepon');
            $table->string('nama_pmo');
            $table->string('nik_pmo');
            $table->string('tlp_pmo');

            $table->foreign('id_dpjp')
            ->references('id')->on('dokter')
            ->onDelete('cascade');

            $table->foreign('id_dokterkonsultan')
            ->references('id')->on('dokter')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
    }
}
