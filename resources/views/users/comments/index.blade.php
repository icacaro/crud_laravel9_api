@extends('layouts.app')

@section('title', "Comentarios do usuário {$user->name}")

@section('content')
<h1 class="text-2xl font-semibold leading-tigh py-2">
    Comentários do Usuário {{ $user->name }}
</h1>

<a href="{{ route('comments.create', $user->id)}}" class="bg-blue-900 rounded text-white px-4 text-sm">criar comentário +</a>

<table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
    <thead>
        <tr>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
          >
            Conteúdo
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
          >
            Visível
          </th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
          >
            Editar
          </th>
        </tr>
      </thead>
      <tbody>
    @foreach ($comments as $comment)
        <tr>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $comment->body }}</td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $comment->visible ? 'SIM' : 'NÃO' }}</td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a href="{{ route('comments.edit', ['user' => $user->id, 'id' => $comment->id]) }}" class="bg-green-200 rounded py-2 px-6">Editar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>







{{-- <table>
    <thead>
        <tr>
            <th>
                comentários |
            </th>

            <th>
                visível |
            </th>

        </tr>
    </thead>
</table>
<ul>
    @foreach ($comments as $comment)
        <li>
            {{$comment->body}} |
            {{$comment->visible ? 'sim' : 'não' }} |

            | <a href="{{ route('comments.edit', ['user' => $user->id, 'id' => $comment->id])}}">edit</a>
        </li>
    @endforeach

</ul> --}}

@endsection