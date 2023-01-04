<?php

namespace App\Http\Controllers\Organizacao\Palestra;

use App\Http\Controllers\Controller;
use App\Models\{Palestra, User};
use App\Services\PalestraService; 
use Illuminate\Http\Request;

class PalestraInscricaoController extends Controller
{
    public function store(Palestra $palestra, Request $request)
    {
        $user = User::findOrFail($request->user_id);

        //Verificação service
        if(PalestraService::userInscricaoOnPalestra($user, $palestra)){
            return back()->with('warning', 'Este participante já está inscrito!'); 
        }

        if(PalestraService::palestraFinalDataPalestraHasPassed($palestra)) {
            return back()->with('warning', 'Operação inválida! A palestra já ocorreu!');
        }

        if(PalestraService::palestraLimiteParticipantesHasReached($palestra)) {
            return back()->with(
                'warning', 
                'não é possível inscrever o participante na palestra pois o limite de participante foi atingido');
        }
        //----------------

        $user->palestras()->attach($palestra->id);

        return back()->with('success', 'Inscrição realizada com sucesso!'); 
    }

    public function destroy(Palestra $palestra, User $user)
    {

        //Verificação service
        if(PalestraService::palestraFinalDataPalestraHasPassed($palestra)) {
            return back()->with('warning', 'Operação inválida! A palestra já ocorreu!');
        }

        if(!PalestraService::userInscricaoOnPalestra($user, $palestra)){
            return back()->with('warning', 'O participante não está inscrito na palestra!'); 
        }

        $user->palestras()->detach($palestra->id);

        return back()->with('success', 'Inscrição no evento removida com sucesso!');
        
    }
   
}
