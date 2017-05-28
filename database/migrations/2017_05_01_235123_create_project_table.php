<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('project', function(Blueprint $table){
          $table->increments('id');
          $table->integer('user_id');
          $table->integer('company_id');
          $table->string('project_name');
          $table->string('project_info');
          $table->integer('project_session');    
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
        Schema::drop('project');
    }
}
