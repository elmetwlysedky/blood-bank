<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernoratesTable extends Migration {

	public function up()
	{
		Schema::create('governorates', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name_ar');
            $table->string('name_en');

		});
	}

	public function down()
	{
		Schema::drop('governorates');
	}
}
