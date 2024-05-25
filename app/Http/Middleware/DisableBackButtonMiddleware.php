<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DisableBackButtonMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($request->routeIs('previous.page.route')) { // The route's name. In the article's case, the checkout page
            if (str_contains($request->session()->previousUrl(), 'url/to/the/thank/you/page')) { // The URL of the starting page. In our case the thank you page
                return response()->redirectToRoute('route.to.thank.you.page'); // $request->property (You can pass your request data here)
            }
        }

        return $response->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
    }
}