<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuditAuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.audit-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('audit')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/audit/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegistrationForm(): View
    {
        return view('auth.audit-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:audits',
            'password' => 'required|string|min:8|confirmed',
            'department' => 'required|string|max:255',
        ]);

        $audit = Audit::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'department' => $request->department,
        ]);

        Auth::guard('audit')->login($audit);

        return redirect('/audit/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('audit')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/audit/login');
    }
}
