<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipient');
            $table->unsignedBigInteger('sender');
            $table->longText('content');
            $table->unsignedBigInteger('post_id');

            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('recipient')->references('id')->on('users');
            $table->foreign('sender')->references('id')->on('users');
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
        Schema::dropIfExists('messages');
    }
}