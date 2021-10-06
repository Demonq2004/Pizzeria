<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = false)
    {
        if(!Auth::check() || !Auth::id())
        {
            abort(403, 'Brak dostępu');
        }else
        {
            if(! $request->user()->hasRole($role))
            {
                abort(403, 'Brak dostępu');
            }
        }
        return $next($request);
    }
}
