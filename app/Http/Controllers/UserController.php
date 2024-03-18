<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Other methods...

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the new user
        $user = new User();
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Optionally, log in the user after signup
        Auth::login($user);

        // Redirect to wherever necessary after signup
        return redirect()->route('viewlogin')->with('success', 'Inscription réussie! Vous êtes maintenant connecté.');
    }
    public function login(Request $request){
        // Validate the login request
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('sqlform');
        }
        // Authentication failed...
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    
    
}
