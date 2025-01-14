<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Arr;

class Authenticate extends Middleware
{

    protected $guards;


    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;

        return parent::handle($request, $next, ...$guards);
    }


    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }

        if (! $request->expectsJson()) {
            if (Arr::first($this->guards) === 'web') {
                return route('login');
            }

            return route('site.login');
        }
    }

//    protected function unauthenticated($request, array $guards)
//    {
//        abort(response()->json(['error' => 'Unauthenticated.'], 401));
//    }


}
