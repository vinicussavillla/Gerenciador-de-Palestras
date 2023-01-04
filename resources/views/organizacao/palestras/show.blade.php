@extends('layouts.panel')
@section('title', $palestra->name)

@section('content')
<h1 class="h3 mb-4 text-gray-800">{{$palestra->name}}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Informações gerais</div>
                <div class="card-body">
                    <ul class="list-group text-center">
                        <li class="list-group-item">
                            <span class="font-weight-bold mb-1">Palestrante: </span>
                            <span>{{ $palestra->name_palestrante }}</span>
                        </li>
                        <li class="list-group-item">
                            <span class="font-weight-bold mb-1">Início: </span>
                            {{ $palestra->inicio_data_palestra }}
                        </li>
                        <li class="list-group-item">
                            <span class="font-weight-bold mb-1">Fim: </span>
                            {{ $palestra->final_data_palestra }}
                        </li>
                        <li class="list-group-item">
                            <span class="font-weight-bold mb-1">Público-alvo: </span>
                            <span>{{ $palestra->publico_alvo }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header bg-primary text-white">Participantes</div>
        <div class="card-body">
            <form method="POST" action="{{ route('organizacao.palestras.inscricao.store', $palestra->id) }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <select class="form-control" name="user_id">
                            <option value="">Selecione</option>
                            @foreach ($allParticipantesUsers as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-2">
                        <button type="submit" class="btn btn-success">Incluir</button>
                    </div>
                </div>
            </form>
            <table class="table bg-white mt-3">
                <thead>
                    <th>Nome</th>
                    <th class="text-right">Ações</th>
                </thead>
                <tbody>
                    @foreach($palestra->users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td class="text-right">
                                <div class="d-flex align-items-center justify-content-end">
                                @if (!$palestraFinalDataPalestraHasPassed)
                                    <form method="POST" action="{{route('organizacao.palestras.inscricao.destroy', [
                                        'palestra' => $palestra->id, 
                                        'user' => $user->id
                                     ]) }}"> 
                                     @csrf
                                     @method('DELETE')
                                     <button class="btn btn-sm btn-danger">Remover inscrição</button>
                                    </form>
                                @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection