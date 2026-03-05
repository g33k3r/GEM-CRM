<?php
namespace App\Http\Middleware;
use Closure;
class EnsureAdmin{
    public function handle($request, Closure $next){
        if(session()->has("adminAuth")) {

            return $next($request);
        }
        return redirect('/login');
    }
}
