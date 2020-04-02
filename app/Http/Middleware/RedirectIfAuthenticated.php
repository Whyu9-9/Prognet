<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin' :
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.dashboard') ;
                }
                break;

                default:
                if (Auth::guard($guard)->check()){
                    return redirect('/home');
                }
                break;
            
            case 'web' :
                if (Auth::guard($guard)->redirect()->route('admin.login')) {
                    return redirect()->route('/home') ;
                }

                if (Auth::guard($guard)->redirect()->route('/admin/products')) {
                    return redirect()->route('/home') ;
                }
                break;
        }
        /*if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);*/
        return $next($request);
    }
}
