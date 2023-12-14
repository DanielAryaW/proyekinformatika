<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use constGuards;
use constDefaults;
use App\Models\Pesanan; // Add this line for the Order model


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
            'alamat' => 'min:5|max:64',
            'phone' => 'min:5|max:20',
            'cpassword' => 'required|min:5|max:30|same:password'
        ]);

        $client = new Client();
        $client->name = $request->name;
        $client->username = $request->username;
        $client->email = $request->email;
        $client->alamat = $request->alamat;
        $client->phone = $request->phone;
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
            'email.exists' => 'Email tidak terdaftar dalam sistem'
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('client')->attempt($creds)) {
            return redirect()->route('client.home');
        } else {
            return redirect()->route('client.login')->with('fail', 'Password Salah');
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
            session()->flash('fail', 'Password Salah');
            return redirect()->route('client.login');
        }
    }

    public function logoutHandler(Request $request)
    {
        Auth::guard('client')->logout();
        session()->flash('success', 'Kamu sudah logged out!');
        return redirect()->route('client.login');
    }

    public function sendPasswordResetLink(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:clients,email'
        ], [
            'email.required' => 'The :attribute is required',
            'email.email' => 'Invalid email address',
            'email.exists' => 'The :attribute is not exists in system'
        ]);

        //Get client details
        $client = Client::where('email', $request->email)->first();

        //Generate token
        $token = base64_encode(Str::random(64));

        //Check if there is an existing reset password token
        $oldToken = DB::table('password_reset_tokens')
            ->where(['email' => $request->email, 'guard' => constGuards::CLIENT])
            ->first();

        if ($oldToken) {
            //Update token
            DB::table('password_reset_tokens')
                ->where(['email' => $request->email, 'guard' => constGuards::CLIENT])
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        } else {
            //Add new token
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'guard' => constGuards::CLIENT,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        }

        $actionLink = route('client.reset-password', ['token' => $token, 'email' => $request->email]);

        $data = array(
            'actionLink' => $actionLink,
            'client' => $client
        );

        $mail_body = view('email-templates.client-forgot-email-template', $data)->render();

        $mailConfig = array(
            'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
            'mail_from_name' => env('EMAIL_FROM_NAME'),
            'mail_recipient_email' => $client->email,
            'mail_recipient_name' => $client->name,
            'mail_subject' => 'Reset password',
            'mail_body' => $mail_body
        );

        if (sendEmail($mailConfig)) {
            session()->flash('success', 'We have e-mailed your password reset link');
            return redirect()->route('client.forgot-password');
        } else {
            session()->flash('fail', 'Something went wrong!');
            return redirect()->route('client.forgot-password');
        }
    }

    public function resetPassword(Request $request, $token = null)
    {
        $check_token = DB::table('password_reset_tokens')
            ->where(['token' => $token, 'guard' => constGuards::CLIENT])
            ->first();

        if ($check_token) {
            //Check if token is not expired
            $diffMins = Carbon::createFromFormat('Y-m-d H:i:s', $check_token->created_at)->diffInMinutes(Carbon::now());

            if ($diffMins > constDefaults::tokenExpiredMinutes) {
                //If token expired
                session()->flash('fail', 'Token expired, request another reset password link.');
                return redirect()->route('client.forgot-password', ['token' => $token]);
            } else {
                return view('back.pages.client.auth.reset-password')->with(['token' => $token]);
            }
        } else {
            session()->flash('fail', 'Invalid token!, request another reset password link');
            return redirect()->route('client.forgot-password', ['token' => $token]);
        }
    }

    public function resetPasswordHandler(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:5|max:45|required_with:new_password_confirmation|same:new_password_confirmation',
            'new_password_confirmation' => 'required'
        ]);

        $token = DB::table('password_reset_tokens')
            ->where(['token' => $request->token, 'guard' => constGuards::CLIENT])
            ->first();

        //Get client details
        $client = Client::where('email', $token->email)->first();

        //Update client password
        Client::where('email', $client->email)->update([
            'password' => Hash::make($request->new_password)
        ]);

        //Delete token record
        DB::table('password_reset_tokens')->where([
            'email' => $client->email,
            'token' => $request->token,
            'guard' => constGuards::CLIENT
        ])->delete();

        //Send email to notify client
        $data = array(
            'client' => $client,
            'new_password' => $request->new_password
        );

        $mail_body = view('email-templates.client-reset-email-template', $data)->render();

        $mailConfig = array(
            'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
            'mail_from_name' => env('EMAIL_FROM_NAME'),
            'mail_recipient_email' => $client->email,
            'mail_recipient_name' => $client->name,
            'mail_subject' => 'Password changed',
            'mail_body' => $mail_body
        );

        sendEmail($mailConfig);
        return redirect()->route('client.login')->with('success', 'Selesai!, Password kamu telah diganti. Gunakan password baru untuk login dalam sistem.');
    }
}