@extends('layouts.panel')
@section('title', 'Nova palestras')
@section('content')
    <form action="{{route('organizacao.palestras.store')}}" method="POST" autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input
                        type="text"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                    >
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name_palestrante">Nome do palestrante</label>
                    <input
                        type="text"
                        class="form-control {{ $errors->has('name_palestrante') ? 'is-invalid' : '' }}"
                        id="name_palestrante"
                        name="name_palestrante"
                        value="{{ old('name_palestrante') }}"
                    >
                    <div class="invalid-feedback">{{ $errors->first('name_palestrante') }}</div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="inicio_data_palestra">Data de início</label>
                    <input
                        type="text"
                        class="form-control date {{ $errors->has('inicio_data_palestra') ? 'is-invalid' : '' }}"
                        id="inicio_data_palestra"
                        name="inicio_data_palestra"
                        value="{{ old('inicio_data_palestra') }}"
                        data-mask="00/00/0000 00:00"
                    >
                    <div class="invalid-feedback">{{ $errors->first('inicio_data_palestra') }}</div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="final_data_palestra">Data de fim</label>
                    <input
                        type="text"
                        class="form-control date {{ $errors->has('final_data_palestra') ? 'is-invalid' : '' }}"
                        id="final_data_palestra"
                        name="final_data_palestra"
                        value="{{ old('final_data_palestra') }}"
                        data-mask="00/00/0000 00:00"
                    >
                    <div class="invalid-feedback">{{ $errors->first('final_data_palestra') }}</div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="limite_participantes">Limite de participantes</label>
                    <input
                        type="number"
                        class="form-control {{ $errors->has('limite_participantes') ? 'is-invalid' : '' }}"
                        id="limite_participantes"
                        name="limite_participantes"
                        min="1"
                        value="{{ old('limite_participantes') }}"
                    >
                    <div class="invalid-feedback">{{ $errors->first('limite_participantes') }}</div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="publico_alvo">Público alvo</label>
                    <textarea
                        class="form-control {{ $errors->has('publico_alvo') ? 'is-invalid' : '' }}"
                        id="publico_alvo"
                        name="publico_alvo"
                        rows="3"
                    >{{ old('publico_alvo') }}</textarea>
                    <div class="invalid-feedback">{{ $errors->first('publico_alvo') }}</div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-2">Salvar</button>
    </form>
@endsection