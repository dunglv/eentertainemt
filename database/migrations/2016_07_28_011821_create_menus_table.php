<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->string('url', 100);
            $table->string('type', 20);
            $table->string('link', 200)->nullable();
            $table->string('category', 200)->nullable();
            $table->string('article', 200)->nullable();
            $table->integer('parent')->default(0);
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
        Schema::drop('menus');
    }
}
