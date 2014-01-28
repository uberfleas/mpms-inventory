<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixCommissionsShowColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('commissions', function(Blueprint $table)
		{
			//
			$table->integer('show_id')->after('sources');
			$table->dropColumn('event_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('commissions', function(Blueprint $table)
		{
			//
			$table->dropColumn('show_id');
			$table->integer('event_id');
		});
	}

}