<?php

use Illuminate\Database\Migrations\Migration;

class DropMediumIdListArtobjs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//drop unecessary column genre id list from artobjs, replaced by pivot table
		Schema::table('artobjs', function($table)
		{
			$table->dropColumn('genre_id_list');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//add column medium id list to artobjs
		Schema::table('artobjs', function($table)
		{
			$table->string('genre_id_list',255);
		});
	}

}