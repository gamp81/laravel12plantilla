@extends('layouts.default')

@section('page-title', 'Usuários')
@section('page-actions')
<a href="{{ route('users.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Novo Usuário</a>
@endsection

@section('content')
@session('status')
<div class="alert alert-success" role="alert">
    {{ $value }}
</div>
@endsession

  
<form action="{{ route('users.index') }}" method="GET" style="width: 300px;">
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="keyword" placeholder="Buscar usuários..."
            value="{{ request()->keyword }}">
        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @can('edit', $user)
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil">
                    </i></a>
                @endcan

                @can('destroy', $user)
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                </form>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links('pagination::bootstrap-5') }}
<!-- Paginação -->

@endsection