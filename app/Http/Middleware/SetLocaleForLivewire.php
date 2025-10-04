<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleForLivewire
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Se é uma requisição do Livewire, definir locale da sessão
        if ($request->is('livewire/*')) {
            $locale = session('locale', config('app.fallback_locale', 'pt'));
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
