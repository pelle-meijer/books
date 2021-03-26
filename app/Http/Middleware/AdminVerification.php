<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminVerification
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
        if(Gate::allows('admin') || $request->path() == "add/store"){
            return $next($request);
        }else{
            session(['auth-error' => 'You must be an admin to access this page.']);
            return redirect()->back();
        }
    }
}
