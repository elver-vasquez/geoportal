<?php

namespace App;

use Carbon\Carbon;
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

    public function getLaboratorioAttribute(){
        if(is_null($this->attributes['laboratorio'])){
            return 'S/L';
        }
        else{
            return $this->attributes['laboratorio'];
        }
    }

    public function getTurbiedadAttribute(){
        if(is_null($this->attributes['turbiedad'])){
            return 0;
        }
        else{
            return round($this->attributes['turbiedad'],3);
        }
    }
    public function getColorAttribute(){
        if(is_null($this->attributes['color'])){
            return 0;
        }
        else{
            return round($this->attributes['color'],3);
        }
    }

    public function getSstAttribute(){
        if(is_null($this->attributes['sst'])){
            return '-';
        }
        else{
            return round($this->attributes['sst'],3);
        }
    }
    public function getOdAttribute(){
        if(is_null($this->attributes['od'])){
            return 0;
        }
        else{
            return round($this->attributes['od'],3);
        }
    }
    public function getHsAttribute(){
        if(is_null($this->attributes['hs'])){
            return '-';
        }
        else{
            return round($this->attributes['hs'],3);
        }
    }


}
