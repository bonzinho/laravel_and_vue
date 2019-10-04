<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecondNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('second_notificacaos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->notNull();
            $table->string('img')->notNull();
            $table->string('url')->notNull();
            $table->boolean('state')->notNull()->default(0);
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
        Schema::drop('second_notificacaos');
    }
}
