<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerawatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perawat', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->enum('role', ['superadmin','admin']);
            $table->string('nama');
            $table->string('nik');
            $table->enum('status',['aktif','tidak_aktif'])->default('aktif');
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
        Schema::dropIfExists('perawat');
    }
}
