@extends('layouts.panel')
@section('title', 'Editar palestra')
@section('content')
    <form action="{{route('organizacao.palestras.update', $palestra->id)}}" method="POST" autocomplete="off">
        @method('PUT')
        @include('organizacao.palestras._partials._form')
    </form>
@endsection