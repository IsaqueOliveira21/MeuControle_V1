<?php

namespace App\Http\Controllers;

use App\Models\Amigo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AmigoController extends Controller
{
    private $amigo;

    public function __construct(Amigo $amigo)
    {
        $this->amigo = $amigo;
    }

    public function index() {
        $amigos = $this->amigo->where('user_id', Auth::user()->id)->get();
        return view('usuario.amigos.index', compact('amigos'));
    }

    public function create() {
        return view('usuario.amigos.dados');
    }

    public function store(Request $request) {
        if($request->hasFile('foto')){
            $nomeFoto = $request->hasFile('foto') ? (new UserController)->uploadFoto($request->foto) : null;
            try {
                $this->amigo->create([
                    'user_id' => Auth::user()->id,
                    'nome' => $request->nome,
                    'telefone' => $request->telefone,
                    'limite_emprestimo' => $request->limite,
                    'foto' => $nomeFoto,
                ]);
            } catch(\Exception $e) {
                dd($e->getMessage());
            }
        } else {
            try {
                $this->amigo->create([
                    'user_id' => Auth::user()->id,
                    'nome' => $request->nome,
                    'telefone' => $request->telefone,
                    'limite_emprestimo' => $request->limite,
                    'foto' => null,
                ]);
            } catch(\Exception $e) {
                dd($e->getMessage());
            }
        }
        return redirect()->route('amigos.index');
    }

    public function edit(Request $request) {
        $amigo = $this->amigo->find($request->id);
        return view('usuario.amigos.dados', compact('amigo'));
    }

    public function update(Amigo $amigo, Request $request) {
        if ($request->hasFile('foto')) {
            File::delete(storage_path('app/public/fotos/'.$amigo->foto));
            $nomeFoto = (new UserController)->uploadFoto($request->foto);
        } else {
            $nomeFoto = $amigo->foto;
        }
        try{
            $amigo->update([
                'nome' => $request->nome,
                'telefone' => $request->telefone,
                'limite_emprestimo' => $request->limite,
                'foto' => $nomeFoto,
            ]);
            return redirect()->route('amigos.index');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
