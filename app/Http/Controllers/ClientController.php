<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    function create(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password'
        ]);

        $client = new Client();
        $client->name = $request->name;
        $client->username = $request->username;
        $client->email = $request->email;
        $client->password = \Hash::make($request->password);
        $save = $client->save();

        if ($save) {
            return redirect()->back()->with('success', 'You are now registered successfully');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register');
        }
    }

    function check(Request $request)
    {
        //Validate inputs
        $request->validate([
            'email' => 'required|email|exists:clients,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists on clients table'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('client')->attempt($creds)) {
            return redirect()->route('client.home');
        } else {
            return redirect()->route('client.login')->with('fail', 'Incorrect credentials');
        }
    }

    public function loginHandler(Request $request)
    {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:clients,email',
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' => 'Email atau Username dibutuhkan',
                'login_id.email' => 'Alamat email Invalid',
                'login_id.exists' => 'Email tidak terdaftar di sistem',
                'password.required' => 'Password dibutuhkan'
            ]);
        } else {
            $request->validate([
                'login.id' => 'required|exists:clients,username',
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
        session()->flash('success', 'Kamu sudah logged out!');
        return redirect()->route('client.login');
    }
}