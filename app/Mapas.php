<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapas extends Model
{
    protected  $table='mapas';
    protected $fillable=[
        'nombre',
        'archivo',
        'tipo',
        'nivel',
        'mapa_id'
    ];

    public function mapa(){
        return $this->belongsTo(Mapas::class,'mapa_id');

    }
    public function mapas(){
        return $this->hasMany(Mapas::class,'mapa_id');
    }

}
