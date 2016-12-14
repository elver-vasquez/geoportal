<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapaPunto extends Model
{
   protected $table='mapas_puntos';
    protected $fillable=[
        'nombre',
        'descripcion',
        'monitoreo_id',
        'archivo',
        'tipo'
    ];

    public  function monitoreo(){

        return $this->belongsTo(Monitoreo::class,'monitoreo_id');
    }
//  public function getArchivoAttribute(){
//      $url=public_path().'/mapas/tdps/puntos/'.$this->attributes['archivo'];
//      return $url;
//  }

}
