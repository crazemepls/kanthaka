<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\Facades\JWTAuth;
use Closure;
use Illuminate\Support\Facades\Auth;


class AuthenticateAPI
{
  /**
   * Get the path the user should be redirected to when they are not authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return string
   */
    public function handle($request, Closure $next) {
      try {
        $jwt = JWTAuth::parseToken()->authenticate();
      } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
        $jwt = false;
      }
      if (Auth::check() || $jwt) {
        return $next($request);
      } else {
        return response('Unauthorized.', 401);
      }
    }
}
