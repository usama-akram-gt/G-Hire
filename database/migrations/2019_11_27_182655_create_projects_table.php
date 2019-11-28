<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->Increments('id',true);
            $table->text('title');
            $table->text('description');
            $table->text('file');
            $table->text('catagory');
            $table->text('deliverytime');
            $table->text('budget');
            $table->text('tags');
            $table->integer('userid_fk')->unsigned()->nullable();
            $table->foreign('userid_fk')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
