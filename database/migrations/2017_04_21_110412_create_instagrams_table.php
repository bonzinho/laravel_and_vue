<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstagramsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instagrams', function(Blueprint $table) {
            $table->increments('id');
            $table->string('insta_id');
            $table->string('code');
            $table->string('image');
            $table->integer('likes');
            $table->string('date');
            $table->longText('text');
            $table->integer('week')->default(1);
            $table->integer('year')->default(1970);
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
		Schema::drop('instagrams');
	}

}
