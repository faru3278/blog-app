<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService; // Assuming you have an AuthService for handling authentication logic

class AuthController extends Controller
{
    /**
     * Handle user registration.
     */

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function registerForm()
    {
        return view('components.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        // Check if the user already exists

        $exists = $this->authService->checkUserExists($validated['email']);
        if ($exists) {
            return redirect()->back()->withErrors(['email' => 'This email is already registered.']);
        }

        // Create the user
        $user = $this->authService->createUser($validated);

        $user->sendEmailVerificationNotification();

        Auth::login($user);

        return redirect()->route('verification.notice');
    }

    public function verifyNotice()
    {
        return view('components.auth.verify-notice');
    }

    /**
     * Handle user login.
     */
    public function login(Request $request)
    {
        // Login logic here
    }

    /**
     * Handle user login.
    **/

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        // Logout logic here
    }
}
