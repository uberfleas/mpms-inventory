<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCharacteristicsMediums extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mediums', function(Blueprint $table)
		{
			//dropped the characteristics column, replaced by table mediumchars
			$table->dropColumn('characteristics');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mediums', function(Blueprint $table)
		{
			//
			$table->text('characteristics');
		});
	}

}