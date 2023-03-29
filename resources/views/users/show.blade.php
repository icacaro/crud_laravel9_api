@extends('layouts.app')

@section('title', 'Listagem do Usuário')

@section('content')
{{-- <h1 class="ml-2">Listagem do usuário {{$user->name}}</h1> --}}

<ul class="ml-2">
    <li>{{$user->name}}</li>
    <li>{{$user->email}}</li>
</ul>

<form action="{{route('users.delete',$user->id)}}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="shadow bg-blue-900 hover:bg-blue-500 focus:shadow-outline focus:outline-none text-white font-bold py-0 px-2 rounded ml-2">Deletar</button>
    <a href="{{ route('comments.index', $user->id) }}" class="shadow bg-blue-900 hover:bg-blue-500 focus:shadow-outline focus:outline-none text-white font-bold py-0.5 px-2 rounded ml-2">Anotações ({{ $user->comments->count() }})</a>
</form>

@endsection

