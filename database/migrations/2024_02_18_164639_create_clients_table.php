<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{

    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->bigInteger('phone')->unique();
            $table->string('password');
            $table->date('last_donation')->nullable();
            $table->integer('city_id')->unsigned();
            $table->integer('blood_type_id')->unsigned();
            $table->string('pin_code')->nullable();
        });
    }

    public function down()
    {
        Schema::drop('clients');
    }
}
