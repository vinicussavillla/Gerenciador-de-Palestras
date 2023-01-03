<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon; 

class Palestra extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'name_palestrante' ,
        'inicio_data_palestra',
        'final_data_palestra',
        'limite_participantes',
        'publico_alvo',
    ];

    //Mutators 
    public function setInicioDataPalestraAttribute($value)
    {
        $this->attributes['inicio_data_palestra'] = Carbon::createFromFormat('d/m/Y H:i', $value)
            ->format('Y-m-d H:i:s');
    }

    public function setFinalDataPalestraAttribute($value)
    {
        $this->attributes['final_data_palestra'] = Carbon::createFromFormat('d/m/Y H:i', $value)
            ->format('Y-m-d H:i:s');                       
    }

   //accessors 
   public function getInicioDataPalestraFormattedAttribute()
   {
      return Carbon::parse($this->inicio_data_palestra)->format('d/m/Y H:i');
   }

   public function getFinalDataPalestraFormattedAttribute()
   {
      return Carbon::parse($this->inicio_data_palestra)->format('d/m/Y H:i');
   }

}
