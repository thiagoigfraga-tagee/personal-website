<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Força HTTPS em produção
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Configura locale do Carbon baseado no idioma da aplicação
        $locale = app()->getLocale();
        $carbonLocale = $locale === 'pt' ? 'pt_BR' : 'en';
        Carbon::setLocale($carbonLocale);

    }
}
