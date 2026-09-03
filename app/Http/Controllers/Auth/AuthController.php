<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user
        if (auth()->attempt($credentials)) {
            // Authentication passed, regenerate session
            $request->session()->regenerate();
            return redirect()->route('dashboard'); // Redirect to the dashboard or any other page
            
        }

        // Authentication failed
        return redirect()->back()->withErrors(['email' => 'Email or password is incorrect.'])->onlyInput('email');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'province' => ['required', 'string', 'max:100'],
            'regency' => ['required', 'string', 'max:100'],
            'district' => ['required', 'string', 'max:100'],
            'village' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'referral_code' => ['required', 'size:10', 'unique:users'],
        ]);
        try {
            // Validate the request data
            

            // Create the user
            $user = User::create($validatedData);

            // Log the user in
            auth()->login($user);

            return redirect()->route('login'); // Redirect to the dashboard or any other page
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(['error' => 'Registration failed: ' . $e->getMessage()])->withInput();
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
