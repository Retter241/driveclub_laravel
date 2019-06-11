<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNormalCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         /*Schema::create('comments', function (Blueprint $table) {
           $table->increments('id');
       $table->integer('user_id')->unsigned()->default(1);
       $table->foreign('user_id')->references('id')->on('users');

       $table->integer('parent_id')->unsigned();

       $table->text('body');
       $table->integer('commentable_id')->unsigned();
       $table->string('commentable_type');
       $table->timestamps();
        });*/
    }

       /* //создание поля для связывания с таблицей user
        $table->integer('user_id')->unsigned()->default(1);
        //создание внешнего ключа для поля 'user_id', который связан с полем id таблицы 'users'
        $table->foreign('user_id')->references('id')->on('users');*/
   
  
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
