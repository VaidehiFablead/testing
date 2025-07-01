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
        // You can add validation here if needed

        // Save data to database
        Reg::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // secure hashing
        ]);

        return redirect('/login')->with('success', 'Registration Successful!');
    }
}
