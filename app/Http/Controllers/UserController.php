<?php

namespace App\Http\Controllers;

use App\Models\Amigo;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

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

    public function logout() {
        Auth::logout();
        return redirect()->route('user.login');
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

    public function perfil() {
        $usuario = Auth::user();
        return view('usuario.perfil', compact('usuario'));
    }

    public function updatePerfil(Request $request) {
        if($request->hasFile('foto')){
            File::delete(storage_path('app/public/fotos/'.Auth::user()->photo));
            $nomeFoto = (new UserController)->uploadFoto($request->foto);
        } else {
            $nomeFoto = Auth::user()->photo;
        }
        try {
            Auth::user()->update([
                'name' => $request->name,
                'photo' => $nomeFoto,
            ]);
            return redirect()->back();
        } catch (Exception $e) {
            dd($e->getMessage());
        }

    }

    public function uploadFoto($foto) {
        $nome = uniqid(time()).'.'.$foto->getClientOriginalExtension();
        $caminho = storage_path('app/public/fotos/'.$nome);
        Image::make($foto->getRealPath())->resize(250, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($caminho);
        return $nome;
    }
}
