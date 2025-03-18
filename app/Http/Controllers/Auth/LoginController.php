<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('societe')) {
            return redirect()->route('societe.dashboard');
        } elseif ($user->hasRole('user')) {
            return redirect()->route('user.dashboard');
        }

        return redirect('/dashboard');
    }
}
