<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rema extends Model
{
    protected  $table='remas';
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
        return $this->hasMany(MedicionRema::class,'id_remas');
    }
    
}
