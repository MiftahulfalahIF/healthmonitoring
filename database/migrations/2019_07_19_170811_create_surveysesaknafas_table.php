<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysesaknafasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveysesaknafas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kontrol_id')->unsigned();
            $table->integer('pasien_id')->unsigned();
            $table->integer('tingkat_sesak_nafas');
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
        Schema::dropIfExists('surveysesaknafas');
    }
}
