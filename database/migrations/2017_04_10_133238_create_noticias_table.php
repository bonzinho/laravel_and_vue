<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('noticias', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description');
            $table->string('photo');
            $table->string('video');
            $table->tinyInteger('week');
            $table->string('link');
            $table->enum('state', ['0', '1'])->default('1');
            $table->enum('newsletter', ['0', '1'])->default('1');
            $table->date('active_date')->default(date('Y-m-d'));
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Schema::drop('noticias');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}

}
