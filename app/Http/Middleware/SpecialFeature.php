<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SpecialFeature
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
        if(!auth()->check() || !auth()->user()->special_feature){
            abort(403, 'Dilarang masuk sini coy!');
            // return redirect('/home')->with('janganMasuk', 'Hanya User lain yang bisa masuk ke link ini!');
        }
        return $next($request);
    }
}
