<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class MedicionRemfc extends Model
{
    protected $table='mediciones_remfc';

    protected $fillable=[
        'id_remfc',
        'campania',
        'cod_campania',
        'laboratorio',
        'fecha',
        'hora',
        'caudal',
        'ph',
        'ce',
        'temperatura',
        'aceites',
        'turbiedad',
        'sdt',
        'sst',
        'color',
        'co',
        'od',
        'od_satu',
        'saturacion',
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
        'bact_coli',
        'zn',
        'cd',
        'pb',
        'fe',
        'mn',
        'cu',
        'hg',
        'as',
        'cr',
        'ni',
        'sb',
        'se',
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
