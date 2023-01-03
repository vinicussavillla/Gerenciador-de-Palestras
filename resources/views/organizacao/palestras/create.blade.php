@extends('layouts.panel')
@section('title', 'Nova palestras')
@section('content')
    <form action="{{route('organizacao.palestras.store')}}" method="POST" autocomplete="off">
       @include('organizacao.palestras._partials._form')
    </form>
@endsection