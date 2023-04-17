<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perfil;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index() :JsonResponse
    {
        return response()->json([
            'perfis' => Perfil::all(),
        ], 200);
    }

    public function show(Perfil $perfil) :JsonResponse
    {
        return response()->json($perfil, 200);

    }

    public function store(Request $request) :JsonResponse
    {
        $perfil = new Perfil;
        $perfil->id = $request->id;
        $perfil->nome = $request->nome;
        $perfil->save();
        return response ()->json($perfil, 200);
    }
/*
    public function edit(Perfil $perfil) :JsonResponse
    {   //$perfil = Perfil::find($perfil);
        return response ()->json($perfil, 200);
    }
*/
    public function update(Perfil $perfil, Request $request) :JsonResponse
    {
        $data = [
            'id' => $request->id,
            'nome' => $request->nome
        ];
        
        $perfil->update($data);
        return response ()->json($perfil, 200);
    }

    public function delete(Perfil $perfil) :JsonResponse
    {
        // dd($perfil);
        $perfil->delete();
        return response ()->json('Registro deletado', 200);
    }
}