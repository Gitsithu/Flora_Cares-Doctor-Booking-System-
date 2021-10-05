<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_doctor_id');
            $table->integer('clinic_id');
            $table->time('from_time');
            $table->time('to_time');
            $table->string('day');
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinic_detail');
    }
}
