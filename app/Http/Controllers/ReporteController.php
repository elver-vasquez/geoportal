<?php

namespace App\Http\Controllers;

use App\Rema;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{
    public function remas(Request $request){
                 if(!isset($request->reporte))
                     return redirect()->back();

        $a=[];
        foreach($request->reporte as $r){
            $a[]=$r;
        }
        array_unshift($a,
            "remas.red as Red",
            "remas.nro_red as Nro_Red",
            "remas.nombre_hidrologica as Nombre_de_la_Zona_Hidrológica_TDPS",
            "remas.coor_este as Coordenada_Este",
            "remas.coor_oeste as Coordenada_Oeste",
            "remas.altura as Altura_(msnm)",
            "remas.dpto as Departamento",
            "remas.estacion as Nombre_de_la_Estacion",
            "remas.codigo as Codigo",
            "mediciones_remas.campania as Campania",
            "mediciones_remas.cod_campania as Cod-Cam"
        );
        $remas=Rema::join('mediciones_remas','mediciones_remas.id_remas','remas.id')
                     ->where('remas.codigo',$request->codigo_rema)
                     ->select($a)
//                      ->select('remas.*')
                     ->get();


       Excel::create('remas',function($excel) use ($remas){

         $excel->sheet('reporte',function($sheet) use($remas){
             $data=$remas->toArray();
             $sheet->fromArray($data);
         });


       })->download('xlsx');
    }
}
