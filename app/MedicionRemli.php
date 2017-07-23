<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class MedicionRemli extends Model
{


    protected $table='mediciones_remli';
    protected $fillable=[

        'id_remli',
        'campania',
        'profundidad',
        'cod_campania',
        'laboratorio',
        'fecha',
        'hora',
        'prof',
        'ph',
        'ce',
        'temperatura',
        'turbiedad',
        'color',
        'sst',
        'sdt',
        'disco',
        'co',
        'od',
        'od_satu',
        'satu',
        'hs',
        'ca',
        'mg',
        'na',
        'k',
        'na_k',
        'co2',
        'co2h',
        'ci',
        'so4',
        'alcalinidad',
        'dureza',
        'sio3',
        'nno3',
        'nno2',
        'nnh4',
        'nt',
        'kjendall',
        'po4',
        'p',
        'pt',
        'si',
        'b',
        'dbo5',
        'dqo',
        'coli_feca',
        'coli_tot',
        'salmonella',
        'clorofilla',
        'cont_algas',
        'cont_plancton',
        'cont_bentos',
        'amonio',
        'cloruro',
        'nitrato',
        'nitrito',
        'cianuro'

    ];
    public function setFechaAttribute($fecha){

        $pos = strpos($fecha, '/');

        if ($pos === false) {

            $this->attributes['fecha']=Carbon::createFromFormat('Y-m-d',$fecha);
        } else {
            $this->attributes['fecha']=Carbon::createFromFormat('Y/m/d',$fecha);

        }
    }
}
