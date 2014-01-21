<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotGenreMediumTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('genre_medium', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('genre_id')->unsigned()->index();
			$table->integer('medium_id')->unsigned()->index();
			$table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
			$table->foreign('medium_id')->references('id')->on('mediums')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('genre_medium');
	}

}
