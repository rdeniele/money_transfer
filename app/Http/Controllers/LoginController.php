<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 


class LoginController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Authentication successful
            $request->session()->regenerate(); // Regenerate session for security
            return redirect()->intended('UserManagement.users'); // Redirect to intended route (replace with your desired route)
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
