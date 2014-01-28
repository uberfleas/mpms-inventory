<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEventFieldToCommissions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('commissions', function(Blueprint $table)
		{
			//add event_id field to commissions
			$table->integer('event_id');
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
			//drop event_id from commissions
			$table->dropColumn('event_id');
		});
	}

}