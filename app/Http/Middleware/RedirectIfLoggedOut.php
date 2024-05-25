<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfLoggedOut
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Si l'indicateur de déconnexion est présent dans la session, redirigez vers la page de connexion
        if ($request->session()->has('loggedOut')) {
            $request->session()->forget('loggedOut');
            return redirect('/');
        }

        return $next($request);
    }
}