<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()){
            if (Auth::user()->role == 1){
                return $next($request);
            }else{
                return redirect()->back()->with([
                    'messageLog' => 'You Are Not A Super Admin'
                ]);
            }
        }
        return redirect()->route('super.login')->with([
            'messageLog' => 'Bạn không đủ quyền để truy cập',
        ]);
    }
}
