<?php

namespace App\Http\Controllers\Organizacao\Palestra;

use App\Http\Controllers\Controller;
use App\Models\{Palestra, User};
use App\Services\PalestraService;
use App\Http\Requests\Organizacao\Palestra\PalestraRequest;
use Illuminate\Http\Request;

class PalestraController extends Controller
{
   public function index(Request $request)
   {
     $palestras = Palestra::query();

     if (isset($request->search) && $request->search !== '') {
          $palestras->where('name', 'like', '%'.$request->search.'%');
     }

     return view('organizacao.palestras.index', [
          'palestras' => $palestras->paginate(5), 
          'search' => isset($request->search)? $request->search : ''
     ]); 
   }

   public function create()
   {
        return view('organizacao.palestras.create'); 
   }
   
   public function store(PalestraRequest $request)
   {
          Palestra::create($request->validated());

          return redirect()
               ->route('organizacao.palestras.index')
               ->with('success', 'Palestra cadastrada com sucesso!');
   }

   public function show(Palestra $palestra)
    {
          return view('organizacao.palestras.show', [
               'palestra' => $palestra,
               'palestraFinalDataPalestraHasPassed' => PalestraService::palestraFinalDataPalestraHasPassed($palestra),
               'allParticipantesUsers' => User::query()
                    ->where('role', 'participante')
                    ->when('palestras', function ($query) use ($palestra) {
                         $query->where('id', $palestra->id);
              })
              ->get()
          ]);
     }

   public function edit($id)
   {
     $palestra = Palestra::findOrFail($id);

          return view('organizacao.palestras.edit', [
               'palestra' => $palestra
     ]);
   }

   public function update($id, PalestraRequest $request)
   {
    $palestra = Palestra::findOrFail($id);

    $palestra->update($request->validated()); 
     
    return redirect()
       ->route('organizacao.palestras.index')
       ->with('success', 'Palestra criado com sucesso!'); 
     }


   public function destroy(Palestra $palestra )
   {

    $palestra->delete(); 
     
    return redirect()
       ->route('organizacao.palestras.index')
       ->with('success', 'Palestra deletada com sucesso!'); 
     }
}
