<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntriansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrians', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('jenisantrian_id');
            $table->integer('nomor_antrian');
            $table->date('tgl_antrian');
            $table->integer('periode');
            $table->integer('fiscal_year');
            $table->integer('status');

            $table->timestamps();

            $table->foreign('jenisantrian_id')->references('id')->on('jenisantrians')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antrians');
    }
}
