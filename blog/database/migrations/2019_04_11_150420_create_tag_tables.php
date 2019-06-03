<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTables extends Migration
{
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('type')->nullable();
            $table->integer('order_column')->nullable();
            $table->timestamp('created')->nullable();
            $table->timestamp('updated')->nullable();
        });

        Schema::create('post_tag', function (Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
         

            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('post_tag');
        Schema::drop('tags');
    }
}
