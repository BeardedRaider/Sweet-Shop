<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form view.
     *
     * Returns the Blade template that contains the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Attempt to authenticate the user.
     *
     * Steps:
     * 1. Validate the incoming request to ensure `email` and `password` are present.
     * 2. Use `Auth::attempt` to try to log the user in with the provided credentials.
     * 3. On successful authentication:
     *    - Regenerate the session ID to protect against session fixation attacks.
     *    - Redirect the user based on role (admins to admin dashboard, others to products index).
     * 4. On failure, redirect back with a validation-style error message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Validate input - will automatically redirect back with errors if invalid
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate using the validated credentials
        if (Auth::attempt($credentials)) {
            // Regenerate session ID to prevent session fixation
            $request->session()->regenerate();

            // If the authenticated user has the 'admin' role, send them to the admin area
            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }

            // Default authenticated redirect for regular users
            return redirect()->route('products.index');
        }

        // Authentication failed — return back with an error bound to the email field
        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * Steps:
     * - Call `Auth::logout()` to clear the user's authentication state.
     * - Invalidate the session to remove all session data.
     * - Regenerate the CSRF token to avoid reuse of the previous token.
     * - Redirect the user (here, back to the login page) with a success flash message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // Clear the user's authentication credentials
        Auth::logout();

        // Invalidate the session and regenerate CSRF token for safety
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the login page and flash a success message to the session
        return redirect()
            ->route('login')
            ->with('success', 'You have been logged out successfully.');
    }
}
