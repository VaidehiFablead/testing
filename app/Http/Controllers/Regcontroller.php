<?php

namespace App\Http\Controllers;

use App\Models\Reg;
use Illuminate\Http\Request;

class Regcontroller extends Controller
{
    // public function showForm()
    // {
    //     return view('reg'); // loads your reg.blade.php form
    // }

    public function register(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:reg,email',
            'password' => 'required|min:6',
        ]);

        // Save data to database
        Reg::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // secure hashing
        ]);

        return redirect('/login')->with('success', 'Registration Successful!');
    }
}
