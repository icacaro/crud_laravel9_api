@extends('layouts.app')

@section('title', 'Listagem dos Usuários')

@section('content')


<h2 class="text-2xl font-semibold leading-tigh py-2 ml-2">Listagem de usuários</h2>
<a href="{{ route('users.create')}}" class="bg-blue-900 rounded text-white px-4 text-sm ml-2">criar usuário +</a>

<form action="{{ route('users.index') }}" method="get" class="py-5">
    <div class="-space-y-px rounded-md shadow-sm">
        <input type="text" name="search" placeholder="Pesquisar" class="md:w-1/6 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
        <button class="shadow bg-blue-900 hover:bg-blue-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Pesquisar</button>
    </div>
</form>


<table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
    <thead>
        <tr>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
          >
            Nome
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
          >
            E-mail
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
          >
            Editar
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
          >
            Detalhes
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
          >
            Comentários
          </th>
        </tr>
      </thead>
      <tbody>
    @foreach ($users as $user)
        <tr>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                {{ $user->name }}
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $user->email }}</td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a href="{{ route('users.edit', $user->id) }}" class="bg-green-200 rounded py-2 px-6">Editar</a>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a href="{{ route('users.show', $user->id) }}" class="bg-orange-200 rounded py-2 px-6">Detalhes</a>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a href="{{ route('comments.index', $user->id) }}" class="bg-blue-200 rounded py-2 px-6">Anotações ({{ $user->comments->count() }})</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


{{-- <ul>
    @foreach ($users as $user)
        <li>
            {{$user->name}} -
            {{$user->email}} -
            | <a href="{{ route('users.show', $user->id)}}">ver detalhes</a>
            | <a href="{{ route('users.edit', $user->id)}}">editar</a>
            | <a href="{{ route('comments.index', $user->id)}}">anotações (0) </a>
        </li>
    @endforeach

</ul> --}}

@endsection


