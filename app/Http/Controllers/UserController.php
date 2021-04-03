<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request, Response $response)
    {
        $post = $request->only('email', 'password', 'remember');

        if (Auth::attempt($post, key_exists('remember', $post))) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'The password is not true',
        ]);
    }

    public function register(Request $request, Response $response)
    {
        $post = $request->except('_token');
        dd($post);
    }
}
