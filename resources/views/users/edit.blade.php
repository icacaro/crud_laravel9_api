@extends('layouts.app')

@section('title', "Editar o usuário{{$user->name}}")

@section('content')
<h1 class="ml-2">editar usuário {{$user->name}}</h1>

@include('includes.validations-form')

<form action="{{route('users.update', $user->id)}}" method="post">
    @method('PUT')
    @include('users._partials.form')
</form>

@endsection