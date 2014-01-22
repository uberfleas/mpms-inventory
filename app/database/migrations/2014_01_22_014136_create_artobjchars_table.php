<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtobjcharsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artobjchars', function(Blueprint $table)
		{
			//
			$table->increments('id');

			$table->string('value');
			$table->integer('mediumchar_id');
			$table->integer('artobj_id');

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
		Schema::drop('artobjchars');
	}

}