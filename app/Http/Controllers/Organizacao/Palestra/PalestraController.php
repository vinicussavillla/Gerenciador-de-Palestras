<?php

namespace App\Http\Controllers\Organizacao\Palestra;

use App\Http\Controllers\Controller;
use App\Models\Palestra;
use App\Http\Requests\Organizacao\Palestra\PalestraRequest;
use Illuminate\Http\Request;

class PalestraController extends Controller
{
   public function index()
   {
        return view('organizacao.palestras.index'); 
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
               ->with('success', 'Evento cadastrado com sucesso!');
   }
}
