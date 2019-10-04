<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('eventos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('link');
            $table->string('data')->notNull();
            $table->date('init')->notNull();
            $table->date('end')->notNull();
            $table->integer('week')->notNull();
            $table->integer('year')->notNull();
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
		Schema::drop('eventos');
	}

}
