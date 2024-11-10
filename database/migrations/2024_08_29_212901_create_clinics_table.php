<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClinicsTable extends Migration {

	public function up()
	{
		Schema::create('clinics', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('clinicName');
			$table->integer('dayNum');
			$table->integer('weekNum');
		});
	}

	public function down()
	{
		Schema::drop('clinics');
	}
}