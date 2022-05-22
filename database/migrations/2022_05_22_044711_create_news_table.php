<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('anons');
            $table->text('text');
            $table->bigInteger('rubric_news_id')->unsigned();
            $table->foreign('rubric_news_id')->references('id')->on('rubrics')->onDelete('cascade');
            $table->bigInteger('news_author_id')->unsigned();
            $table->foreign('news_author_id')->references('id')->on('authors')->onDelete('cascade');
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
        Schema::dropIfExists('news');
    }
}
