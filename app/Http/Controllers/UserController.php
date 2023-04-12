<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
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
    public function create() {
        return view('register');
    }

    public function store(Request $request) {
        if($request->password === $request->passwordConfirm){
            try {
                User::create([
                    'name' => $request->nome,
                    'email' => $request->email,
                    'birthday' => Carbon::createFromFormat('Y-m-d', $request->birthday),
                    'password' => bcrypt($request->password),
                ]);
                return redirect()->route('user.login');
            } catch(Exception $e) {
                dd($e->getMessage());
            }
        } else {
            return view('register', ['mensagem' => 'As senhas precisam ser iguais!']);
        }
    }
}
