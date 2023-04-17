<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function index() :JsonResponse
    {
        $comentarios = Comment::all();
        return response()->json([
            'comentarios' => $comentarios,
        ], 200);
    }
    
    public function show (Comment $comment) :JsonResponse
    {
        return response()->json($comment, 200);
        
    }

    public function create($userId)
    {
          
        
    }

    public function store(Request $request, $userId) :JsonResponse
    {
        $user = User::find($userId);
        $comment = new Comment([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);
        $user->comments()->save($comment);
        return response()->json($user, 200);
        
    }

    public function edit($userId, $id)
    {
        
        
    }

    public function update(Request $request, Comment $comment) :JsonResponse
    {
        $data = [
            'body' => $request->body,
            'visible' =>isset($request->visible)
        ];
        
        $comment->update($data);
        return response()->json($comment, 200);
        
    }

    public function delete(Comment $comment) :JsonResponse
    {
        $comment->delete();
        return response()->json('registro deletado', 200);
    }


}