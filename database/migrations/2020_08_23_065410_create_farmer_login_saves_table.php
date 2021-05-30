<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmerLoginSavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer_login_saves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('f_name');
            $table->string('email');
            $table->string('phone');
            $table->string('district');
            $table->string('zip_code');
            $table->string('gender');
            $table->string('password');
            $table->string('confirm_password');
            $table->string('Activity');
           //$table->foreign('email')->references('email')->on('users')->onDelete('cascade');
           // $table->primary(array('f_name', 'email'));
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
        Schema::dropIfExists('farmer_login_saves');
    }
}
