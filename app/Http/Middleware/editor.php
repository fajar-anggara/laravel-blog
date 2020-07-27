<?php

namespace App\Http\Middleware;

use Closure;

class editor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session('role') == null) {
            return redirect('admin/')->with('response', 'Anda harus login dahulu atau <div id="register" class="badge badge-danger"> Register </div>');
        }
        return $next($request);
    }
}
