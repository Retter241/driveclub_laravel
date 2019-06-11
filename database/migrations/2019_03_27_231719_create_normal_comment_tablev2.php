<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNormalCommentTablev2 extends Migration
{
    /**
     * Run the migrations.
     https://klisl.com/laravel_relationships.html
     *
     * @return void
     */
    public function up()
    {
       /* Schema::table('comments', function (Blueprint $table) {
               $table->foreign('user_id')->references('id')->on('users');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            //
        });
        
    }
}
