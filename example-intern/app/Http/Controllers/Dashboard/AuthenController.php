<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenController extends Controller
{
    public function login()
    {
        return view('dashboard.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('super.login')->with([
            'messageLog' => 'Log Out Success'
        ]);
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)){
            // check account login delete
            Session::where('user_id', Auth::id())->delete();

            // created login account
            session()->put('user_id', Auth::id());

            $request->session()->regenerate();
            return redirect()->route('dashboard.statistic.index')->with([
                'messageLog' => 'Login Success'
            ]);
        }else{
            return redirect()->back()->with([
                'messageLog' => 'Login Fail'
            ]);
        }
    }
}
