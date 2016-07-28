<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categories_id');
            $table->integer('members_id');
            $table->string('title', 200);
            $table->string('url', 200);
            $table->string('type')->default('normal');
            $table->string('thumbnail', 100);
            $table->text('description');
            $table->text('content');
            $table->text('tag');
            $table->integer('viewcount')->default(0);
            $table->integer('likecount')->default(0);
            $table->integer('dislikecount')->default(0);
            $table->integer('status')->default(0);
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
        Schema::drop('articles');
    }
}
