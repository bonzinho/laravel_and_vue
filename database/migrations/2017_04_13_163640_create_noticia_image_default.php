<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiaImageDefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $photo = new \Illuminate\Http\UploadedFile(
            storage_path('app/files/noticias/default_image.png'), 'default_image.png');
        $name =  env('NOTICIA_PHOTO_DEFAULT');
        $destFile = \feupWorld\Models\Noticia::photoDir();
        \Storage::disk('public')->putFileAs($destFile, $photo, $name); // destino do arquivo | qual o arquivo | nome do arquivo
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
