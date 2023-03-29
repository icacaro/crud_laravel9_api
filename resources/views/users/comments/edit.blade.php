@extends('layouts.app')

@section('title', "Editar o Comentário do Usuário{{$user->name}}")

@section('content')
<h1 class="text-2xl font-semibold leading-tigh py-2">editar o comentário do usuário {{$user->name}}</h1>

@include('includes.validations-form')

<form action="{{route('comments.update', $comment->id)}}" method="post">
    @method('PUT')
    @include('users.comments._partials.form')
</form>

<form action="{{route('comments.delete',$comment->id)}}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="shadow bg-blue-900 hover:bg-blue-500 focus:shadow-outline focus:outline-none text-white font-bold py-0 px-2 rounded ml-2">Deletar</button>
</form>


@endsection