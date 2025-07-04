<?php

namespace App\Http\Controllers;

use App\Models\Reg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    public function showProfile()
    {
        $name = Session::get('user');
        $email = Session::get('email');

        return view('profile', compact('name', 'email'));
    }


    // updateProfiledate
    public function updateProfile(Request $request)
    {
        $user = Reg::where('email', Session::get('email'))->first();

        if ($user) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();

            Session::put('user', $user->name);
            Session::put('email', $user->email);

            return redirect('/profile')->with('status', 'profile updated succefully');
        }
        return back()->with('error', 'user not found');
    }

    // display all data

    public function allUsers()
    {
        $users = Reg::all();
        // return view('users', compact('users'));
        return view('users', compact('users'));
    }

    // delete data

    public function deleteUser($id){
        $user =Reg::find($id);
        if($user){
            $user->delete();
        }
        return redirect()->route('users.list')->with('status','deleted');
    }
}
