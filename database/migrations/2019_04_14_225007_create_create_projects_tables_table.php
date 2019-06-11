<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateProjectsTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->text('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->string('title',255);
            $table->text('content')->nullable();
            $table->text('desc')->nullable();
            $table->string('alias',150)->unique();
            $table->string('img')->nullable();
            $table->string('author');
            $table->string('userlikeids')->nullable();
            $table->string('view_count')->nullable();
            $table->string('category_id')->nullable();
            $table->string('slider_photo')->nullable();

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
        Schema::dropIfExists('projects');
    }
}
