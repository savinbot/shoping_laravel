<?php

namespace App\Http\Middleware;

use Closure;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);
        if(! array_key_exists($locale , config('app.locales'))) {
            $segments = $request->segments();
            $segments[0] = config('app.fallback_locale');

            return redirect(implode('/', $segments));
        }

        app()->setLocale($locale);
        return $next($request);
    }
}
