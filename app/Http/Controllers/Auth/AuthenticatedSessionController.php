<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        switch ($request->user()->role) {
            case 'Admin':
                return redirect()->intended(RouteServiceProvider::ADMIN);
            case 'User':
                return redirect()->intended(RouteServiceProvider::USER);
            case 'Electrical':
                return redirect()->intended(RouteServiceProvider::ELECTRICAL);
            case 'Civil':
                return redirect()->intended(RouteServiceProvider::CIVIL);
            case 'Engineer':
                return redirect()->intended(RouteServiceProvider::ENGINEER);
                case 'Recommender':
                    return redirect()->intended(RouteServiceProvider::RECOMMENDER);
            default:
                return redirect()->intended(RouteServiceProvider::HOME); // or any default page
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
