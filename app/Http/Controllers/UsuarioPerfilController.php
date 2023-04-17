<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perfil;
use App\Models\UsuarioPerfil;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsuarioPerfilController extends Controller
{
    public function index() :JsonResponse
    {
        return response()->json([
            'usuarios_perfis' => UsuarioPerfil::all(),
        ], 200);
    }

    public function show(UsuarioPerfil $usuarioperfil) :JsonResponse
    {
        return response()->json($usuarioperfil, 200);
    }

    public function store(Request $request) :JsonResponse
    {
        $p = (object)$request->all();

        $usuarioperfil = new UsuarioPerfil;
        $usuarioperfil->user_id = $p->user_id;
        $usuarioperfil->perfil_id = $p->perfil_id;
        $usuarioperfil->save();

        return response ()->json($usuarioperfil, 200);
    }
    
    public function edit(UsuarioPerfil $usuarioperfil) :JsonResponse
    {   
        $retorno = [];
        
        $retorno['usuario_nome'] = User::find($usuarioperfil->user_id)->name;
        $retorno['combo_perfil'] = Perfil::all(['id as value', 'nome as text']);
        $retorno['usuario_perfil'] = $usuarioperfil;
        
        return response ()->json($retorno, 200);
    }

    public function update(UsuarioPerfil $usuarioperfil, Request $request) :JsonResponse
    {   
        $data =[
            'perfil_id' => $request->perfil_id
        ];
        
        $usuarioperfil->update($data);
        return response ()->json($usuarioperfil, 200);
    }

    public function delete(UsuarioPerfil $usuarioperfil) :JsonResponse
    {
        $usuarioperfil->delete();
        return response ()->json('Registro deletado', 200);
    }
}