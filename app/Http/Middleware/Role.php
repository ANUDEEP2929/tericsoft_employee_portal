<?php

namespace App\Http\Middleware;
use App\Article;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;


class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $allow_role)
    {

        try {
            $user = Auth::user();
            if (!$user) {
                return redirect('error')->with('message','Cannot get user from token');
            }
            if ($user->role != $allow_role) {
                return redirect('error')->with('message','Permission denied');
            }
        } catch (\Exception $e) {
            return redirect('error')->with('message','Invalid Token');
        }
        return $next($request);
    }
}
