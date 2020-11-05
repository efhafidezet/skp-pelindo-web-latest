<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_answers', function (Blueprint $table) {
            $table->increments('question_answer_id');
            $table->integer('question_id');
            $table->text('answer');
            // $table->text('answer_1')->default(null);
            // $table->text('answer_2')->default(null);
            // $table->text('answer_3')->default(null);
            // $table->text('answer_4')->default(null);
            // $table->text('answer_5')->default(null);
            // $table->text('answer_6')->default(null);
            // $table->text('answer_7')->default(null);
            // $table->text('answer_8')->default(null);
            // $table->text('answer_9')->default(null);
            // $table->text('answer_10')->default(null);
            // $table->text('answer_11')->default(null);
            // $table->text('answer_12')->default(null);
            // $table->text('answer_13')->default(null);
            // $table->text('answer_14')->default(null);
            // $table->text('answer_15')->default(null);
            // $table->text('answer_16')->default(null);
            // $table->text('answer_17')->default(null);
            // $table->text('answer_18')->default(null);
            // $table->text('answer_19')->default(null);
            // $table->text('answer_20')->default(null);
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
        Schema::dropIfExists('question_answers');
    }
}
