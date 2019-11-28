<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->Increments('id',true);
            $table->string('birth-month');
            $table->string('birth-day');
            $table->string('birth-year');
            $table->string('university');
            $table->string('university-country');
            $table->string('level1');
            $table->string('specialization');
            $table->string('education-from-month');
            $table->string('education-from-year');
            $table->string('education-to-month');
            $table->string('education-to-year');
            $table->string('education-language');
            $table->string('experience-company');
            $table->string('experience-position');
            $table->string('education-from-month-experience');
            $table->string('education-from-year-experience');
            $table->string('education-to-month-experience');
            $table->string('education-to-year-experience');
            $table->string('experience-description');
            $table->string('resume');
            $table->string('source');
            $table->string('availability');
            $table->string('additional-info');
            $table->string('email')->unique();
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
        Schema::dropIfExists('portfolio');
    }
}
