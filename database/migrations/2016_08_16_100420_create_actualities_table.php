<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateActualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actualities', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->enum('category', ['general', 'athletics', 'badminton', 'basketball', 'football', 'gym', 'yoga_cestas', 'ball', 'soccer5', 'tennis', 'volleyball', 'yoga_chalgrin']);

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('actuality_id')->unsigned()->index()->nullable();
            $table->foreign('actuality_id')->references('id')->on('actualities')->onDelete('cascade')->onUpdate('cascade');

            $table->text('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('actualities');
    }
}
