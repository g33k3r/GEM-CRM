<?php
namespace App\Http\Middleware;
use Closure;
class EnsureMember{
    public function handle($request, Closure $next){
        if(session()->has("memberAuth")) {
            return $next($request);
        }
        return redirect('/login');
    }
}
