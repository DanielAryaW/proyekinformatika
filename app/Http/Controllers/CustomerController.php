<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginHandler(Request $request)
    {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:admins,email',
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' => 'Email atau Username dibutuhkan',
                'login_id.email' => 'Alamat email Invalid',
                'login_id.exists' => 'Email tidak terdaftar di sistem',
                'password.required' => 'Password dibutuhkan'
            ]);
        } else {
            $request->validate([
                'login.id' => 'required|exists:admins,username',
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' => 'Email atau Username dibutuhkan',
                'login_id.exists' => 'Username tidak terdaftar di sistem',
                'password.required' => 'Password dibutuhkan'
            ]);
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password
        );

        if (Auth::guard('client')->attempt($creds)) {
            return redirect()->route('client.home');
        } else {
            session()->flash('fail', 'Incorrect credentials');
            return redirect()->route('client.login');
        }
    }

    public function logoutHandler(Request $request)
    {
        Auth::guard('client')->logout();
        session()->flash('fail', 'Kamu sudah logged out!');
        return redirect()->route('client.login');
    }
}