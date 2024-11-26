<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register User
    public function register(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'phone_number' => ['required'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        // Register
        $user = User::create($fields);

        // Login
        Auth::login($user);

        event(new Registered($user));



        // Redirect
        return redirect()->route('dashboard');
    }

    // Verify Email Notice Handler
    public function verifyEmailNotice()
    {
        return view('auth.verify-email');
    }

    // Email Verification Handler
    public function verifyEmailHandler(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('dashboard');
    }

    // Resending the Verification Email Handler
    public function verifyEmailResend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

    // Login User
    public function login(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        // Try to login the user
        if (Auth::attempt($fields, $request->remember)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records.'
            ]);
        }
    }
    public function profil(Request $request)
    {
        // After Login
        //echo "<h1>Profile Method</h1>";
        if ($request->isMethod("post")) {

            $request->validate([
                "name" => "required|string",
                "phone_number" => "required"
            ]);

            $id = auth()->user()->id; // Logged In userID

            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->phone_number = $request->phone_number;
            $user->save();

            return to_route("profil")->with('success', 'User correctly updated');
        }

        return view("profil");
    }

    // Logout User
    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        // Invalidate user's session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect to home
        return redirect('/');
    }
    public function destroy_user(Request $request)
    {
        // After Login
        //echo "<h1>Profile Method</h1>";
        if ($request->isMethod("post")) {


            $id = auth()->user()->id; // Logged In userID

            $user = User::findOrFail($id);

            $user->delete();


            // Invalidate user's session
            $request->session()->invalidate();

            // Regenerate CSRF token
            $request->session()->regenerateToken();

            // Redirect to home
            return redirect('/')->with('success', 'The profile has been deleted.');
        }
    }
}
