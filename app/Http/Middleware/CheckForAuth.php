<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class CheckForAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
if($request->url('admin')) {
    if(isset(Auth::guard('admin')->user()->name)) {
        return redirect()->route('admins.dashboard');
    } else {
        return redirect()->route('admins.login');
    }
}
return $next($request);
    }
}