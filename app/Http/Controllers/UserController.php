<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function accessDenied(): RedirectResponse
    {
        return redirect()->route('user.login');
    }

    public function login(): Factory|View|Application
    {
        return view('login');
    }

    public function formLogin(Request $request): string|RedirectResponse
    {
        try {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('user.dashboard');
            } else {
                return redirect()->back();
            }
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
