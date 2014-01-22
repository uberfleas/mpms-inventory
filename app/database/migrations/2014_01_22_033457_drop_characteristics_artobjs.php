<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCharacteristicsArtobjs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('artobjs', function(Blueprint $table)
		{
			//remove medium values, replaced by artobjchars table
			$table->dropColumn('medium_values');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('artobjs', function(Blueprint $table)
		{
			//
			$table->string('medium_values');
		});
	}

}