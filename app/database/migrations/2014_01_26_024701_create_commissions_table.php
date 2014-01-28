<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commissions', function(Blueprint $table)
		{
			//
			$table->increments('id');

			$table->integer('customer_id');
			$table->string('start_date');
			$table->string('est_end_date');
			$table->string('estimate');
			$table->text('notes');
			$table->text('sources');
			$table->string('sale_status');

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
		Schema::drop('commissions');
	}

}