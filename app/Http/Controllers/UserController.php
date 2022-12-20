<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('users.register');
    }

    public function register_action(Request $request)
    {
        $user_status = "peserta";

        $request->validate([
            'username' => 'required',
            'email' => 'required|unique:user',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->user_status = $user_status;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }


    public function login()
    {
        return view('users.login');
    }

    public function admin()
    {
        return view('admin.index');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            if (Auth::user()->user_status=='peserta') {
                return redirect()->intended('/');
            }else {
                return redirect()->intended('admin');
            }
        }

        return back()->withErrors([
            'password' => 'Wrong email or password',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
