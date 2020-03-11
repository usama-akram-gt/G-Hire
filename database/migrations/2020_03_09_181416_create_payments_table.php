<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id',true);
            $table->text('card_name');
            $table->string('card_email')->unique();
            $table->text('card_num')->unsigned()->nullable();
            $table->integer('card_cvv')->unsigned()->nullable();
            $table->integer('card_month')->unsigned()->nullable();
            $table->integer('card_year')->unsigned()->nullable();
            $table->integer('paid_amount')->unsigned()->nullable();
            $table->text('payment_status');            
            $table->integer('prodOid_fk')->unsigned()->nullable();
            $table->integer('dev_id')->unsigned()->nullable();
            $table->integer('proj_id')->unsigned()->nullable();
            $table->foreign('prodOid_fk')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dev_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('proj_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('payments');
    }
}
