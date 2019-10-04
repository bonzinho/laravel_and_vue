<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Events\AfterInsertAndEditDestaqueEvent;
use App\Events\AfterInsertAndEditSecondDestaqueEvent;
use App\Events\CronTwitterEvent;
use App\Events\NewsletterCreatedEvent;
use App\Events\NoticiaStoredEvent;
use App\Listeners\NoticiaPhotoUpload;
use App\Listeners\NoticiaShareInTwitter;
use App\Listeners\SendNewsletter;
use App\Listeners\ShareInTwitter;
use App\Listeners\UploadIMG;
use App\Listeners\UploadSecondIMG;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NoticiaStoredEvent::class => [
            NoticiaPhotoUpload::class,
            NoticiaShareInTwitter::class,
        ],
        NewsletterCreatedEvent::class => [
            SendNewsletter::class,
        ],
        AfterInsertAndEditDestaqueEvent::class => [
            UploadIMG::class,
        ],
        AfterInsertAndEditSecondDestaqueEvent::class => [
            UploadSecondIMG::class,
        ],
        CronTwitterEvent::class => [
            ShareInTwitter::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
