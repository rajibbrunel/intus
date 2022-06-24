<?php
/* Middlewre that  check whether vue requesting from local host*/

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class spa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currentURL = url()->current();

        if (Str::contains($currentURL, 'localhost')) { // localhost  could be replaced by domain name later

            return $next($request);
        }
        return response()->json(["success" => 5, "message" =>"Your can only call from same host\n", "full_url" => $request->link, "short_url" => "", "alternative_short_url" => "","api_response" =>  null, "safe" => true])->setStatusCode(401);

    }
}
