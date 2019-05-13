<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateTableEdicaos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('edicaos', function (Blueprint $table) {
            $table->renameColumn('ed_mounth', 'ed_month');
            $table->timestamp('ed_date')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('edicaos', function (Blueprint $table) {
            $table->renameColumn('ed_mounth', 'ed_month');
            $table->timestamp('ed_date')->nullable(true);
        });
    }
}
