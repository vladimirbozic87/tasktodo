<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tasks', function(Blueprint $table){
          $table->increments('id');
          $table->integer('user_id');
          $table->integer('company_id');
          $table->integer('project_id');
          $table->string('task_name');
          $table->string('task_description');
          $table->text('task_file_url');
          $table->timestamp('task_end')->nullable();
          $table->string('remember_token')->nullable();
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
        Schema::drop('tasks');
    }
}
