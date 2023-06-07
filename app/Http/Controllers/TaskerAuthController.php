<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskerAuthController extends Controller
{
    //
    public function showLoginForm()
    {
// dd('ji');
        return view('tasker.login');
    }
    public function login(Request $request)
    {
        // dd($request->all());
        $credentials = $request->only('email', 'password');
        // dd($credentials);
dd(Auth::guard('tasker')->attempt($credentials));
        if (Auth::guard('tasker')->attempt($credentials)) {
            // Tasker login successful

            return redirect()->route('tasker.index'); // Redirect to Tasker dashboard or any other page
        } else {
            // Tasker login failed
            dd("kjjo");
            return redirect()->back()->withInput()->withErrors([
                'login_error' => 'Invalid email or password.',
            ]);
        }
    }
}
