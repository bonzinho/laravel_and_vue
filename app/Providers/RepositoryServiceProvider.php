<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\NoticiaRepository::class, \App\Repositories\NoticiaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\EventoRepository::class, \App\Repositories\EventoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TagRepository::class, \App\Repositories\TagRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\InstagramRepository::class, \App\Repositories\InstagramRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NewsletterRepository::class, \App\Repositories\NewsletterRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NotificacaoRepository::class, \App\Repositories\NotificacaoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SecondNotificacaoRepository::class, \App\Repositories\SecondNotificacaoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\WeekEventRepository::class, \App\Repositories\WeekEventRepositoryEloquent::class);
        //:end-bindings:
    }
}
