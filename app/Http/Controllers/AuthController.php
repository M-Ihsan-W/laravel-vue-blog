<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;


class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check())
        {
            return redirect('/admin/dashboard');
        }
        return view('Auth.login');
    }

    public function register()
    {
        return view('Auth.register');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => ['required', 'unique:users,email', 'email:dns'],
            'password' => ['required', 'min:3', 'max:255']
        ]);
        
        // $validate['password'] = bcrypt($validate['password']);

        // User::create($validate);
        // $request->session()->flash('success', 'Registration Successfull !! Please Login');

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('success', 'Registration Successfull !! Please Login');
    }

    public function attemptLogin(Request $request)
    {
        // $user = User::where('email', $request->email)->first();
        // $check = Hash::check($request->password, $user->password);
        // dd($request->all());
        // if($user && $check) {
        //     return view('admin.home');
        // }
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        $remember = filter_var($request->remember, FILTER_VALIDATE_BOOLEAN);
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
