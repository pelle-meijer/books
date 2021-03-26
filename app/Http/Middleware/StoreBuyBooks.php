<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StoreBuyBooks
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
        if(Gate::allows('buy-books', $request->route('store'))){
            return $next($request);
        }else{
            //dd(session('auth-error'));
            session(['auth-error' => 'You must own this store to edit it.']);
            //dd(session('auth-error'));
            return redirect()->back();
        }
    }
}
/*
                                               _---__
                                              /    \  \_
                                                    | o \
                                                    |    |
                                                   /   _/  
                                             \____/ O_/
                                               -____/ 