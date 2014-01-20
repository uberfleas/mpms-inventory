<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtobjsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artobjs', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->string('name',255);
			$table->integer('medium_id');
			$table->string('genre_id_list',255);
			$table->integer('date_completed');
			$table->text('medium_values');
			$table->integer('commission_id');
			$table->string('tagline');
			
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
		Schema::drop('artobjs');
	}

}
