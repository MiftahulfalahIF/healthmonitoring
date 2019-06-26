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
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('no_rekam');
            $table->enum('status',['aktif','tidak_aktif'])->default('aktif');
            $table->string('nama');
            $table->string('nik');
            $table->string('alamat');
            $table->enum('jk',['l','p']);
            $table->enum('wanita_subur',['hamil','tidak_hamil'])->nullable();
            $table->date('tgl_lahir');
            $table->decimal('bb', 8, 2);
            $table->decimal('tb', 8, 2);
            $table->string('telepon');
            $table->string('nama_pmo');
            $table->string('nik_pmo');
            $table->string('tlp_pmo');
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
        Schema::dropIfExists('pasien');
    }
}
