<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserConnectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_connection', function(Blueprint $table){
          $table->increments('id');
          $table->integer('created_by');
          $table->integer('user_id');
          $table->integer('company_id');
          $table->integer('project_id');
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
        Schema::drop('user_connection');
    }
}
