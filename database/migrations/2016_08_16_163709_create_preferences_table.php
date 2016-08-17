<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->boolean('general')->default(false);
            $table->boolean('athletics')->default(false);
            $table->boolean('badminton')->default(false);
            $table->boolean('basketball')->default(false);
            $table->boolean('football')->default(false);
            $table->boolean('gym')->default(false);
            $table->boolean('yoga_cestas')->default(false);
            $table->boolean('ball')->default(false);
            $table->boolean('soccer5')->default(false);
            $table->boolean('tennis')->default(false);
            $table->boolean('volleyball')->default(false);
            $table->boolean('yoga_chalgrin')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('preferences');
    }
}
