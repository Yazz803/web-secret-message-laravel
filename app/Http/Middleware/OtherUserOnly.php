<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;

class OtherUserOnly
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
        // mengambil string di url setelah /
        $url = url()->current();
        $findurl = substr($url, strrpos($url, '/') + 1);
        if(!auth()->check() || auth()->user()->username == $findurl){
            // abort(403, 'Kamu tidak bisa masuk ke postingan kamu sendiri');
            Alert::toast('Hanya user lain yang bisa masuk ke postingan kamu', 'error');
            return redirect('/home')->with('janganMasuk', 'Hanya User lain yang bisa masuk ke link ini!');
        }
        return $next($request);
    }
}
