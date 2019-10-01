<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntrianpolisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrianpolis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('jenisantrian_id');
            $table->integer('nomor_antrian');
            $table->date('tgl_antrian');
            $table->integer('periode');
            $table->integer('fiscal_year');
            $table->integer('status');
            $table->unsignedInteger('countertpp_id');
            $table->unsignedInteger('user_id');

            $table->timestamps();
            $table->foreign('countertpp_id')->references('id')->on('countertpps')->onDelete('restrict');
            $table->foreign('jenisantrian_id')->references('id')->on('jenisantrians')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antrianpolis');
    }
}
