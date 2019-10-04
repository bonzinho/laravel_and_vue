<?php

namespace App\Listeners;

use App\Events\NoticiaStoredEvent;
use Illuminate\Support\Facades\File;
use Thujohn\Twitter\Facades\Twitter;


class NoticiaShareInTwitter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NoticiaStoredEvent  $event
     * @return void
     */
    public function handle(NoticiaStoredEvent $event)
    {
        $noticia = $event->getNoticia();
        $today = date("Y-m-d");
        if ($noticia->created_at == $noticia->updated_at && $noticia->active_date == $today && $noticia->tweet) {
            $numMaxCarateres = 280;
            $tags = $this->arrangeTags(str_replace(',', '', $noticia->tagList));

            $plainTextDescription = strip_tags($noticia->intro_text);
            $numCaracteresDescription = strlen($plainTextDescription);
            $numCaracteresTags = strlen($tags);

            if (($numCaracteresDescription + $numCaracteresTags) <= $numMaxCarateres) {
                $tweet = $noticia->intro_text . "\n" . $tags;
            } else {
                $descriptionMaxCaracteres = ($numCaracteresDescription + $numCaracteresTags) - $numMaxCarateres;
                $descriptionLimit = $numCaracteresDescription - $descriptionMaxCaracteres;
                $tweet = substr($plainTextDescription, 0, $descriptionLimit) . "\n" . $tags;
            }

            try {
                $uploaded_media = Twitter::uploadMedia([
                    'media' => file_get_contents('storage/noticias/images/'.$noticia->photo)
                ]);
                Twitter::postTweet([
                    'status' => $tweet,
                    'media_ids' => $uploaded_media->media_id_string,
                    'format' => 'json'
                ]);
            } catch (\Exception $e) {
                ///dd($e->getMessage());
            }
        }



    }


    private function arrangeTags($tags){
        $arrayTags = explode(" ", $tags);
        for ($x = 0; $x < count($arrayTags); $x++){
            $arrayTags[$x] = "#".$arrayTags[$x];
        }
        return implode(' ',$arrayTags);
    }
}
