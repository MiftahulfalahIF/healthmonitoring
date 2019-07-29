<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyperkembangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_perkembangan', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('kontrol_id')->unsigned();
            $table->integer('pasien_id')->unsigned();

            $table->enum('mual',['1','0'])->default('0');
            $table->enum('muntah',['1','0'])->default('0');
            $table->enum('pusing',['1','0'])->default('0');
            $table->enum('nyeri_kaki',['1','0'])->default('0');
            $table->enum('gatal',['1','0'])->default('0');
            $table->enum('kemerahan',['1','0'])->default('0');
            $table->enum('kuning',['1','0'])->default('0');
            $table->enum('lain_lain',['1','0'])->default('0');

            $table->timestamps();
        });

        Schema::table('survey_perkembangan', function (Blueprint $table){

           $table->foreign('pasien_id')
            ->references('id')->on('pasien')
            ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('kontrol');
    }
}
