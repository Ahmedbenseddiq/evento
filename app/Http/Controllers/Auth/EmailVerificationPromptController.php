<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
public function __invoke(Request $request): RedirectResponse|View
{
    switch ($request->user()->role) {
        case 'admin':
            return $request->user()->hasVerifiedEmail()
                ? redirect()->route('admin.home')
                : view('auth.verify-email');
            break;
        case 'organizer':
            return $request->user()->hasVerifiedEmail()
                ? redirect()->route('organizer.home')
                : view('auth.verify-email');
            break;
        case 'client':
            return $request->user()->hasVerifiedEmail()
                ? redirect()->route('client.home')
                : view('auth.verify-email');
            break;
    }
}

}
