<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyperkembanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveyperkembangan', function (Blueprint $table) {
            $table->enum('mual',['1','2'])->default('1');
            $table->enum('muntah',['1','2'])->default('1');
            $table->enum('pusing',['1','2'])->default('1');
            $table->enum('nyeri_kaki',['1','2'])->default('1');
            $table->enum('gatal',['1','2'])->default('1');
            $table->enum('kemerahan',['1','2'])->default('1');
            $table->enum('kuning',['1','2'])->default('1');
            $table->string('lain_lain');
            $table->bigIncrements('id');
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
        Schema::dropIfExists('surveyperkembangan');
    }
}
