<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWeekYearToNotificacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notificacaos', function (Blueprint $table) {
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
        Schema::table('notificacaos', function (Blueprint $table) {
            $table->dropColumn('year');
            $table->dropColumn('week');
        });
    }
}
