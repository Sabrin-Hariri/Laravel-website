<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title');
        // ليقيل الربط مع جدول اليوزر 
        $table->integer('user_id')->unsigned();
        $table->string('photo');
        $table->string('slug');
        $table->longtext('content')->nullable();
        $table->softDeletes();   
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
