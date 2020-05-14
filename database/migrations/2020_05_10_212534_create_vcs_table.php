<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vcs', function (Blueprint $table) {
            $table->bigIncrements('id',true);
            $table->text('repo_name');
            $table->integer('project_id')->unsigned()->nullable();
            $table->integer('dev_id')->unsigned()->nullable();
            $table->integer('prodO_id')->unsigned()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dev_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('prodO_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('vcs');
    }
}
