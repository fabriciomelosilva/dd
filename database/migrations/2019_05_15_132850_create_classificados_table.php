<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classificados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ed_year');
            $table->integer('ed_month');
            $table->integer('ed_day');
            $table->timestamp('ed_date')->nullable(true);
            $table->integer('ed_status');
            $table->string('ed_file_name');
            $table->string('ed_capa');
            $table->string('url');
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
        Schema::dropIfExists('classificados');
    }
}
