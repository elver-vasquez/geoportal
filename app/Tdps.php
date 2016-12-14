<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tdps extends Model
{
    protected  $table='tdps';
    protected  $fillable=[
        'nombre',
        'archivo',
        'descipcion',
        'tipo',
    ];

    public function puntos_monitoreo(){
        return $this->hasMany(Monitoreo::class,'tdps_id');
    }


}
