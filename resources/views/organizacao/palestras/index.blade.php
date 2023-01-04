@extends('layouts.panel')
@section('title', 'Palestras')
@section('content')

<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <form>
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-fill">
                <input type="text" name="search" class="form-control w-50 mr-2" value="{{ $search }}" placeholder="Pesquisar...">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
            <a href="{{ route('organizacao.palestras.create') }}" class="btn btn-primary">Nova palestra</a>
        </div>
    </form>
    <table class="table mt-4">
        <thead class="thead bg-white">
            <tr>
                <th>Nome</th>
                <th>Palestrante</th>
                <th>Início</th>
                <th>Fim</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- CONTEÚDO DA TABELA -->

            @foreach ($palestras as $palestra )
                <tr>
                    <td class="align-middle">{{ $palestra->name }}</td>
                    <td class="align-middle">{{ $palestra->name_palestrante }}</td>
                    <td class="align-middle">{{ $palestra->inicio_data_palestra_formatted }}</td>
                    <td class="align-middle">{{ $palestra->final_data_palestra_Formatted }}</td>
                    <td class="align-middle">
                        <div class="d-flex align-items-center"> 
                            <a href="{{ route('organizacao.palestras.show', $palestra->id) }}" class="btn btn-sm btn-info mr-2">
                                <i class="fa fa-eye"></i>
                             <a href="{{ route('organizacao.palestras.edit', $palestra->id) }}" class="btn btn-sm btn-primary mr-2">
                                <i class="fa fa-edit"></i>
                             </a>

                             <form
                                method="POST"
                                action="{{ route('organizacao.palestras.destroy', $palestra->id) }}"
                             > 
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="btn btn-sm btn-danger confirm-submit"> 
                                <i class=" fa fa-trash"> </i>
                             </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $palestras->withQueryString()->links() }}
@endsection

