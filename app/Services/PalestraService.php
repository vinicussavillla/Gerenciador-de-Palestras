<?php

namespace App\Services;

use App\Models\{User, Palestra};

class PalestraService
{
    public static function userInscricaoOnPalestra(User $user, Palestra $palestra)
    {
        return $user->palestras()->where('id', $palestra->id)->exists(); 
    }

    public static function palestraFinalDataPalestraHasPassed(Palestra $palestra)
    {
        return $palestra->final_data_palestra < now(); 
    }

    public static function palestraLimiteParticipantesHasReached(Palestra $palestra)
    {
        return $palestra->users->count() === $palestra->limite_participantes;
    }
}