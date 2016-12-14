<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remli extends Model
{
    protected  $table='remli';
    protected $fillable=[
        'pto',
        'pais',
        'nivel3',
        'zona_hidrologica',
        'red',
        'nro_red',
        'zona_hidrologica',
        'red',
        'nro_red',
        'nombre_hidrologica',
        'coor_este',
        'coor_oeste',
        'altura',
        'dpto',
        'estacion',
        'codigo'
    ];

    public function mediciones(){
        return $this->hasMany(MedicionRemli::class,'id_remli');
    }
}
