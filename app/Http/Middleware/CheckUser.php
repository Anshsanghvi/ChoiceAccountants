<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser
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
        $placeholderImage = 'assets/media/blank.png';
        config(['placeholderImage' => $placeholderImage]);

        $placeholderblankImage = 'assets/media/blankimg.svg';
        config(['placeholderblankImage' => $placeholderblankImage]);
        
        if (Auth::check()) {
            if (Auth::User()->status == 1 && Auth::User()->deleteId == 0) {
            } else {
                Auth::logout();
                Session()->flash('alert-danger', "You have been deactivated from the ADMIN PANEL\nPlease contact the Admin to reinstate your privilages");
                return redirect('login');
            }
        } else {
            // Session()->flash('alert-danger', "Please Login in First");
            return redirect('login');
        }

        return $next($request);
    }
}
