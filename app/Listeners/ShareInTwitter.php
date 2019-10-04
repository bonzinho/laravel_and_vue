<?php

namespace App\Listeners;

use App\Events\CronTwitterEvent;
use Thujohn\Twitter\Facades\Twitter;

class ShareInTwitter
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
     * @param  CronTwitterEvent  $event
     * @return void
     */
    public function handle(CronTwitterEvent $event)
    {
        $noticia = $event->getNoticia();
        $today = date("Y-m-d");
        if ($noticia->active_date == $today && $noticia->tweet === true) {
            $numMaxCarateres = 280;
            $tags = $this->arrangeTags(str_replace(',', '', $noticia->tagList));
            $plainTextDescription = strip_tags($noticia->intro_text);

            $numCaracteresDescription = strlen($plainTextDescription);
            $numCaracteresTags = strlen($tags);

            if (($numCaracteresDescription + $numCaracteresTags) <= $numMaxCarateres) {
                $tweet_msg = $noticia->intro_text . "\n" . $tags;
            } else {
                $descriptionMaxCaracteres = ($numCaracteresDescription + $numCaracteresTags) - $numMaxCarateres;
                $descriptionLimit = $numCaracteresDescription - $descriptionMaxCaracteres;
                $tweet_msg = substr($plainTextDescription, 0, $descriptionLimit) . "\n" . $tags;
            }

            try {
                $upload_photo = Twitter::uploadMedia(['media' => asset("storage/noticias/images/{$noticia->photo}")]);
                $twitte = ['status' => $tweet_msg, 'format' => 'json'];
                $twitte['media_ids'] = $upload_photo->media_id_string;
                Twitter::postTweet($twitte);
            } catch (\Exception $e) {
                dd(Twitter::logs());
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
