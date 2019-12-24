<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\Facades\JWTAuth;
use Closure;

class jwt
{
  public function handle($request, Closure $next)
  {
    JWTAuth::parseToken()->authenticate();
    return $next($request);
  }
}
