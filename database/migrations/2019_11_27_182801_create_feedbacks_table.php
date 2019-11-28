<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->Increments('id',true);
            $table->integer('stars');
            $table->text('responsetime');
            $table->text('communincation');
            $table->text('recommend');
            $table->text('remarks');
            $table->integer('prodOid_fk')->unsigned()->nullable();
            $table->integer('dev_id')->unsigned()->nullable();
            $table->foreign('prodOid_fk')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dev_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('feedbacks');
    }
}
