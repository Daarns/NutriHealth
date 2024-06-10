<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
        ]);

        $password = $request->password;
        $passwordRegex = '/^(?=.*[A-Z])(?=.*\d).{8,}$/';

        if (!preg_match($passwordRegex, $password)) {
            return redirect()->back()->withInput($request->except('password'))->with('passwordError', 'Password must be at least 8 characters long, contain at least one uppercase letter and one number.');
        }

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);

        return redirect()->route('login');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $input = $request->get('username');
        $field = filter_var($input, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $user = User::where($field, $input)->first();

        if ($user && Hash::check($request->get('password'), $user->password)) {
            auth()->login($user);

            $role = auth()->user()->role;
            if ($role == 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/');
            }
        } else {
            session()->flash('login_error', 'Username atau password salah.');
            return back()->withInput();
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $username = $user->getName();

        $user = User::firstOrCreate(
            ['email' => $user->getEmail()],
            ['name' => $user->getName(), 'username' => $username, 'password' => Hash::make(Str::random(24))]
        );

        Auth::login($user, true);

        $role = auth()->user()->role;
        if ($role == 'admin') {
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->intended('/');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function showForgotPasswordForm()
    {
        return view('forgot_password');
    }

    public function sendPasswordResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $token = Str::random(60);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.password_reset', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return back()->with('status', 'We have e-mailed your password reset link!');
    }
}
