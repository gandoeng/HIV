<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil', function (Blueprint $table) {
            $table->String('idHasil',5)->primary();
            $table->string('idGejalaPenyakit',5)->nullable();
            $table->string('idEksternal',5)->nullable();
            $table->decimal('persenPenyakit',4,2)->nullable();
            $table->decimal('persenHIV',4,2)->nullable();
            $table->string('ketHasil')->nullable();
            $table->enum('ketStatus',['positive','negative'])->nullable();
            $table->enum('verifikasi',['ya','tidak'])->nullable();
            $table->string('lab')->nullable();
            $table->foreign('idGejalaPenyakit')->references('idGejalaPenyakit')->on('gejalaPenyakit')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('idEksternal')->references('idEksternal')->on('eksternal')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('hasil');
    }
}
