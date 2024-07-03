<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => ['required' , 'string'],
            'password' => ['required','string'],
        ]);

        $credentials = $request->only('phone', 'password');

        // Determine the role based on the selected radio button
        $role = $request->input('role');

        if($role === 'مندوب شحن'){
            $guard = 'representative';
            $url = 'index?table=delivery&view=delivery.index';
        }else{
            $guard = 'web';
            $url = 'index?table=offers&view=offers.index';
        }

        if (Auth::guard($guard)->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended($url);
        }

        // Handling failed login attempt
        throw ValidationException::withMessages([
            'phone' => [trans('auth.failed')],
        ]);
    }
}
