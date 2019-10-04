<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeekEventsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('week_events', function(Blueprint $table) {
            $table->increments('id');
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');;
            $table->integer('evento_id')->unsigned();
            $table->integer('week')->notNull();
            $table->integer('year')->notNull()->default(\Carbon\Carbon::now()->format('Y'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('week_events');
	}

}
