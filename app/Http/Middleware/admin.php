<?php

namespace App\Http\Middleware;

use \Illuminate\Http\Request;
use Closure;

class admin
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
        if (session('role') == 1) {
            return back()->with('response', 'Anda tidak punya akses');
        }
        elseif (session('role') == 2) {
            return $next($request);
        }
        return redirect('admin/')->with('response', 'Anda harus login dahulu atau <div id="register" class="badge badge-danger"> Register </div>');
    }
}
