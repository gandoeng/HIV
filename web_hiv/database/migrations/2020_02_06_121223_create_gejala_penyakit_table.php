<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGejalaPenyakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gejalaPenyakit', function (Blueprint $table) {
            $table->string('idGejalaPenyakit',5)->primary();
            $table->string('idPenyakit',5)->nullable();
            $table->string('idGejala',5)->nullable();
            $table->foreign('idPenyakit')->references('idPenyakit')->on('penyakit')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('idGejala')->references('idGejala')->on('gejala')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('gejalaPenyakit');
    }
}
