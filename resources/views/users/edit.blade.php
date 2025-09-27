@extends('layouts.default')
@section('page-title', 'Editar Usuário')
@section('content')
@session('status')
<div class="alert alert-success">{{$value }}</div>
@endSession

@include('users.parts.basic-defaults')
<br>
@include('users.parts.profile')
<br>
@include('users.parts.interests')
<br>
@include('users.parts.role')
@endsection