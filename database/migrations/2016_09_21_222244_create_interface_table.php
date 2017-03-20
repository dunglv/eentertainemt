<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterfaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interface', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu')->default(1);
            $table->integer('search')->default(1);
            $table->integer('language')->defult(1);
            $table->integer('slider')->default(1);
            $table->integer('featured')->default(1);
            $table->integer('newest')->default(1);
            $table->integer('footer_logo')->default(1);
            $table->string('footer_logo_url');
            $table->text('footer_preface')->nullable();
            $table->integer('footer_menu')->default(1);
            $table->string('copyright')->default('{"type":"link","url":"link","text":"luongvietdung.com"}');
            $table->string('footer_social')->default('{"facebook":{"url":"url facebook","text":"facebook","icon":"icon facebook"},"youtube":{"url":"url utube","text":"utube","icon":"icon utube"},"twitter":{"url":"url twitter","text":"twitter","icon":"icon twitter"},"instagram":{"url":"url instagram","text":"instagram","icon":"icon instagram"},"pinterest":{"url":"url pinterest","text":"pinterest","icon":"icon pinterest"},"tumblr":{"url":"url tumblr","text":"tumblr","icon":"icon tumblr"}, }');
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
        Schema::drop('interface');
    }
}
