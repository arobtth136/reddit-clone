<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('community_id')->constrained();
            $table->string('title');
            $table->text('picture');
            $table->text('body');
            $table->integer('likes')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('comments', function (Blueprint $table){
            $table->id();
            $table->string('text');
            $table->foreignId('post_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('comment_id')->nullable()->constrained();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('post_user', function (Blueprint $table){
            $table->foreignId('user_id')->constrained();
            $table->foreignId('post_id')->constrained();
            $table->boolean('like');
            $table->boolean('dislike');
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
        Schema::dropIfExists('posts');
    }
}
