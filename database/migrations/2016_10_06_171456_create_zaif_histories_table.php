<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZaifHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zaif_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->char('currency_type', 22);
            $table->double('last_zaif', 15, 8);
            $table->double('high_zaif', 15, 8);
            $table->double('low_zaif', 15, 8);
            $table->double('vwap_zaif', 15, 8);
            $table->double('volume_zaif', 15, 8);
            $table->double('ask_zaif', 15, 8);
            $table->double('bid_zaif', 15, 8);
            $table->double('ttb_zaif', 15, 8);
            $table->double('tts_zaif', 15, 8);
            $table->string('column_first', 255);
            $table->string('column_second', 255);
            // $table->timestamps('created');
            // $table->timestamps('modified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('zaif_histories');
    }
}
