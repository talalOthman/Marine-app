<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_time');
            $table->string('MMSI');
            $table->integer('rot');
            $table->float('sog');
            $table->double('lat', 12, 7);
            $table->double('long', 12, 7);
            $table->float('cog');
            $table->integer('true_heading');
            $table->integer('timestamp');
            $table->string('ais_channel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report');
    }
}
