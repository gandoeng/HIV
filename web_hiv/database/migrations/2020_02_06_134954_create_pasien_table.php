<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('idPasien');
            $table->string('namaPasien',32)->nullable();
            $table->integer('umur')->nullable();
            $table->string('sandi',8)->nullable();
            $table->enum('kelamin',['L','P'])->nullable();
            $table->integer('level')->nullable();
            $table->enum('sudahTest',['S','B'])->nullable();
            $table->string('idHasil',5)->nullable();
            $table->foreign('idHasil')->references('idHasil')->on('hasil')->onUpdate('cascade')->onDelete('restrict');
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
