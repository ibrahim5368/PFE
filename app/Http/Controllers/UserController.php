<?php
namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Validation\ValidationException;


    class UserController extends Controller
    {
        
        public function registerSave(Request $request)
        {
            // Validate the request data
            $request->validate([
                'fullname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);
//////////////////////////////////////////////////////////
///////////////// Create the new user////////////////////
            $user = new User();
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            // Redirect to wherever necessary after signup
            return redirect()->route('login');        
        }
//////////////////////////////////////////////////////////////
    public function loginAction(Request $request)
    {
        // Validate the login request
        $request->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);

        if(Auth::attempt($request->only('email','password'),$request->boolean('remember')))
        {
            $request->session()->regenerate();
            return redirect()->route('sqladd');
        }
        
        throw ValidationException::withMessages([
            'email'=>trans('auth.failed')
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
    public function profile()
    {
        return view('auth.profile');
    }
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.signup');
    }
    public function sqladd(){
        return view('layouts.sqladd');
    }
}
