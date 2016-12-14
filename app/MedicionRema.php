<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicionRema extends Model
{
   protected $table='mediciones_remas';

    protected $fillable=[
        'id_remas',
        'campania',
        'cod_campania',
        'laboratorio',
        'fecha',
        'hora',
        'caudal',
        'ph',
        'ce',
        'temperatura',
        'turbiedad',
        'sdt',
        'sst',
        'color',
        'co',
        'od',
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
        'se'

    ];
}
