<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotArtobjGenreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artobj_genre', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('artobj_id')->unsigned()->index();
			$table->integer('genre_id')->unsigned()->index();
			$table->foreign('artobj_id')->references('id')->on('artobjs')->onDelete('cascade');
			$table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('artobj_genre');
	}

}
