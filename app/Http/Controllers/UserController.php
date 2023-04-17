<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index() :JsonResponse
    {

        return response()->json([
            'usuarios' => User::all(),
        ], 200);
    }

    public function show(User $id) :JsonResponse
    {
        return response()->json($id, 200);
    }

    public function create()
    {
        //create = store
    }

    public function store(Request $request) :JsonResponse
    {
        $u = (object)$request->all();
        
        $usuario = new User;
        $usuario->name = $u->name;
        $usuario->email = $u->email;
        $usuario->password = Hash::make($u->password);
        $usuario->save();
        return response ()->json($usuario, 200);
    }

    // public function edit(User $user) :JsonResponse
    // {    
    //     return response()->json($user, 200);
    // }

    public function update(Request $request, User $user) :JsonResponse
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];
        $user->update($data);
        return response ()->json($user, 200);
    }

    public function delete(User $user) :JsonResponse
    {
        $user->delete();
        return response ()->json('Registro deletado', 200);
    }




}