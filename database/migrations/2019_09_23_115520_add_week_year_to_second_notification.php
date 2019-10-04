<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWeekYearToSecondNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('second_notificacaos', function (Blueprint $table) {
            $table->integer('year')->notNull()->default(2018);
            $table->integer('week')->notNull()->default(5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('second_notificacaos', function (Blueprint $table) {
            $table->dropColumn('year');
            $table->dropColumn('week');
        });
    }
}
