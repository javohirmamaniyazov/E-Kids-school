<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');

            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');

            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');

            } else if (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');

            }
        }


        // dd(Hash::make(12344321));
        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {

            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');

            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');

            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');

            } else if (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');

            }
        } else {
            return redirect()->back()->with('error', 'Please Enter Current email and password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }

    public function forgotpassword()
    {
        return view('auth.forgot');
    }

    public function PostForgotpassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);

        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            redirect()->back()->with('success', 'Please check your email and reset yoru password');

        } else {
            redirect()->back()->with('error', 'Email Not Found in the System');
        }
    }

    public function reset($remeber_token)
    {
        $user = User::getTokenSingle($remeber_token);

        if (!empty($user)) {
            $data['user'] = $user;
            return view('auth.reset', $data);
        } else {
            abort(404);
        }
    }

    public function PostReset($token, Request $request)
    {
        if ($request->password == $request->cpassword) {
            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect(url(''))->with('success', "Password successfully reset.");

        } else {
            return redirect()->back()->with('error', "Password and Confirm Password doesn't match");

        }
    }

}