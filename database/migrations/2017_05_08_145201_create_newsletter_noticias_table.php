<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsletterNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletter_noticias', function(Blueprint $table) {
            $table->integer('noticia_id')->unsigned();
            $table->foreign('noticia_id')->references('id')->on('noticias')->onDelete('cascade');
            $table->integer('newsletter_id')->unsigned();
            $table->foreign('newsletter_id')->references('id')->on('newsletters')->onDelete('cascade'); // para ao apagar as relações
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('newsletter_noticias');
    }
}
