<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitoreo extends Model
{
    protected $table='monitoreo';
    protected $fillable=[
        'codigo',
        'nombre',
        'tipo',
        'archivo',
        'archivo_remas',
        'archivo_remfc',
        'archivo_remli',
        'estado_remas',
        'estado_remfc',
        'estado_remli'


    ];
public function tdps(){
    return $this->belongsToMany(Tdps::class,'monitoreo_tdps','monitoreo_id','tdps_id');
}

public function puntos(){
    return $this->hasMany(MapaPunto::class,'monitoreo_id');
}

}
