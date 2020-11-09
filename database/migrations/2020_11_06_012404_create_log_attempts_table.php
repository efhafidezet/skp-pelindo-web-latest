<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogAttemptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_attempts', function (Blueprint $table) {
            $table->increments('log_attempt_id');
            $table->integer('user_id');
            $table->integer('questionnaire_id');
            $table->integer('attempt');
            $table->dateTime('attempt_date');
            $table->text('long');
            $table->text('lat');
            $table->text('photo');
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
        Schema::dropIfExists('log_attempts');
    }
}
