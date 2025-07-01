<?php

namespace App\Http\Controllers;

use App\Models\Reg;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = Reg::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Save user to session
            Session::put('id', $user->id);
            Session::put('user', $user->name);
            Session::put('email',$user->email);
            return redirect('/profile');
        } else {
            return back()->with('error', 'Invalid email or password');
        }
    }
}
