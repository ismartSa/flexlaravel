<?php

namespace App\Http\Middleware;

use Closure;

class checkSingUpDate
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
        $user = \Auth::user();

        $singUpDate = date_create ($user->create_at);
        $today = date_create ();
        $diff =date_diff ($singUpDate,$today);

        if ($diff->days > 3 ){
            return redirect ()->to ('/');
        }


        return $next($request);
    }
}
