<?php

namespace App\Http\Controllers;

use App\MedicionRema;
use App\Rema;
use App\Remfc;
use App\Remli;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RemaController extends Controller
{


    public function buscarCampanias($codigo){




        $datos=Rema::where('codigo',$codigo)->first();

        if(!$datos){
            $datos=Remfc::where('codigo',$codigo)->first();
            if(!$datos){
                $datos=Remli::where('codigo',$codigo)->first();
                 if(!$datos){
                     return response()->json([
                         'status'=>false,
                         'datos'=>$datos,
                     ],422);
                 }
                 else{
                     $campanias=$datos->mediciones;
                     return response()->json([
                         'status'=>true,
                         'campanias'=>$campanias,
                         'datos'=>$datos,
                         'tipo'=>'remli'

                     ],200);
                 }
            }
            else{
                $campanias=$datos->mediciones;
                return response()->json([
                    'status'=>true,
                    'campanias'=>$campanias,
                    'datos'=>$datos,
                    'tipo'=>'remfc'

                ],200);
            }

        }
        else{
            $campanias=$datos->mediciones;
            return response()->json([
                'status'=>true,
                'campanias'=>$campanias,
                'datos'=>$datos,
                'tipo'=>'rema'

            ],200);
        }

    }
    public function importar()
    {
        $ruta = public_path() . '\medicion_remas.xls';
        Excel::load($ruta, function ($reader) {

//            return dd($reader->get()->toArray());

            foreach ($reader->get() as $book) {
                MedicionRema::create($book->toArray());
            }
        });
        return dd(MedicionRema::all());
    }


    public function index()
    {
        $remas = Rema::orderby('codigo', 'ASC')->get();
        return view('admin.remas', [
            'remas' => $remas
        ]);
    }

    public function campanias(Rema $rema)
    {

        $mediciones = $rema->mediciones()->get();

        return view('admin.medicionesrema', [
            'mediciones' => $mediciones,
            'rema_id'=>$rema->id
        ]);


    }

    public function exportar(){

//        $data=Rema::join('mediciones_remas','mediciones_remas.id_remas','=','remas.id')
//            ->orderBy('remas.id','ASC')
//            ->get();
//        return dd($data);
       Excel::create('Laravel Excel', function($excel) {

            $excel->sheet('Productos', function($sheet) {

                $data=Rema::join('mediciones_remas','mediciones_remas.id_remas','=','remas.id')
                            ->orderBy('remas.id','ASC')
                            ->get();

                $sheet->fromArray($data);

            });
        })->export('xls');
    }
public function medicionCreate(Rema $rema_id){

    return view('admin.createmedicion',['rema'=>$rema_id]);
}

    public function medicionstore(Request $request)
    {

        $medicion = new MedicionRema();
        $medicion->id_remas = $request->id_remas;
        $medicion->campania = $request->campania;
        $medicion->cod_campania = $request->cod_campania;
        $medicion->laboratorio = $request->laboratorio;
        $medicion->fecha = $request->fecha;
        $medicion->hora = $request->hora;


        $request->caudal != '' ? $medicion->caudal=$request->caudal: $medicion->caudal=null;
        $request->ph != '' ?  $medicion->ph =$request->ph :  $medicion->ph =null;
        $request->ce != '' ?  $medicion->ce =$request->ce :  $medicion->ce =null;
        $request->temperatura != '' ?  $medicion->temperatura =$request->temperatura :  $medicion->temperatura =null;
        $request->turbiedad != '' ?  $medicion->turbiedad =$request->turbiedad :  $medicion->turbiedad =null;
        $request->sdt != '' ?  $medicion->sdt =$request->sdt :  $medicion->sdt =null;
        $request->sst != '' ?  $medicion->sst =$request->sst :  $medicion->sst =null;
        $request->color != '' ?  $medicion->color =$request->color :  $medicion->color =null;
//        $request->co != '' ?  $medicion->co =$request->co :  $medicion->co =null;
        $request->od != '' ?  $medicion->od =$request->od :  $medicion->od =null;
        $request->hs != '' ?  $medicion->hs =$request->hs :  $medicion->hs =null;
        $request->ca != '' ?  $medicion->ca =$request->ca :  $medicion->ca =null;
        $request->mg != '' ?  $medicion->mg =$request->mg :  $medicion->mg =null;
        $request->na != '' ?  $medicion->na =$request->na :  $medicion->na =null;
        $request->k != '' ?  $medicion->k =$request->k :  $medicion->k =null;
        $request->amonio!= '' ?  $medicion->amonio =$request->amonio :  $medicion->amonio =null;
        $request->cloruro!= '' ?  $medicion->cloruro =$request->cloruro :  $medicion->cloruro =null;
        $request->nitrato!= '' ?  $medicion->nitrato =$request->nitrato :  $medicion->nitrato =null;
        $request->nitrito!= '' ?  $medicion->nitrito =$request->nitrito :  $medicion->nitrito =null;
        $request->cianuro!= '' ?  $medicion->cianuro =$request->cianuro :  $medicion->cianuro =null;
//        $request->na_k != '' ?  $medicion->na_k =$request->na_k :  $medicion->na_k =null;
//        $request->co2 != '' ?  $medicion->co2 =$request->co2 :  $medicion->co2 =null;
//        $request->co2h != '' ?  $medicion->co2h =$request->co2h :  $medicion->co2h =null;
//        $request->ci != '' ?  $medicion->ci =$request->ci :  $medicion->ci =null;
//        $request->so4 != '' ?  $medicion->so4 =$request->so4 :  $medicion->so4 =null;
//        $request->alcalinidad != '' ?  $medicion->alcalinidad =$request->alcalinidad :  $medicion->alcalinidad =null;
//        $request->dureza != '' ?  $medicion->dureza =$request->dureza :  $medicion->dureza =null;
//        $request->sio3 != '' ?  $medicion->sio3 =$request->sio3 :  $medicion->sio3 =null;
//        $request->nno3 != '' ?  $medicion->nno3 =$request->nno3 :  $medicion->nno3 =null;
//        $request->nno2 != '' ?  $medicion->nno2 =$request->nno2 :  $medicion->nno2 =null;
//        $request->nnh4 != '' ?  $medicion->nnh4 =$request->nnh4 :  $medicion->nnh4 =null;
        $request->nt != '' ?  $medicion->nt =$request->nt :  $medicion->nt =null;
//        $request->kjendall != '' ?  $medicion->kjendall =$request->kjendall :  $medicion->kjendall =null;
//        $request->po4 != '' ?  $medicion->po4 =$request->po4 :  $medicion->po4 =null;
        $request->p != '' ?  $medicion->p =$request->p :  $medicion->p =null;
//        $request->pt != '' ?  $medicion->pt =$request->pt :  $medicion->pt =null;
//        $request->si != '' ?  $medicion->si =$request->si :  $medicion->si =null;
        $request->b != '' ?  $medicion->b =$request->b :  $medicion->b =null;
        $request->dbo5 != '' ?  $medicion->dbo5 =$request->dbo5 :  $medicion->dbo5 =null;
        $request->dqo != '' ?  $medicion->dqo =$request->dqo :  $medicion->dqo =null;
        $request->coli_feca != '' ?  $medicion->coli_feca =$request->coli_feca :  $medicion->coli_feca =null;
        $request->coli_tot != '' ?  $medicion->coli_tot =$request->coli_tot :  $medicion->coli_tot =null;
//        $request->salmonella != '' ?  $medicion->salmonella =$request->salmonella :  $medicion->salmonella =null;
        $request->zn != '' ?  $medicion->zn =$request->zn :  $medicion->zn =null;
        $request->cd != '' ?  $medicion->cd =$request->cd :  $medicion->cd =null;
        $request->pb != '' ?  $medicion->pb =$request->pb :  $medicion->pb =null;
        $request->fe != '' ?  $medicion->fe =$request->fe :  $medicion->fe =null;
        $request->mn != '' ?  $medicion->mn =$request->mn :  $medicion->mn =null;
        $request->cu != '' ?  $medicion->cu =$request->cu :  $medicion->cu =null;
        $request->hg != '' ?  $medicion->hg =$request->hg :  $medicion->hg =null;
        $request->as != '' ?  $medicion->as =$request->as :  $medicion->as =null;
        $request->cr != '' ?  $medicion->cr =$request->cr :  $medicion->cr =null;
        $request->ni != '' ?  $medicion->ni =$request->ni :  $medicion->ni =null;
        $request->sb != '' ?  $medicion->sb =$request->sb :  $medicion->sb =null;
        $request->se != '' ?  $medicion->se =$request->se :  $medicion->se =null;

        $medicion->save();
        return redirect('admin/campaniasrema/' . $medicion->id_remas);
    }

    public function medicionupdate(Request $request)
    {

//        return dd($request->all());

        $this->validate($request,['fecha'=>'required']);
        $medicion = MedicionRema::find($request->medicion_id);
        $medicion->id_remas = $request->remas_id;
        $medicion->campania = $request->campania;
        $medicion->cod_campania = $request->cod_campania;
        $medicion->laboratorio = $request->laboratorio;
        $medicion->fecha = $request->fecha;
        $medicion->hora = $request->hora;

        $request->caudal != '' ? $medicion->caudal=$request->caudal: $medicion->caudal=null;
        $request->ph != '' ?  $medicion->ph =$request->ph :  $medicion->ph =null;
        $request->ce != '' ?  $medicion->ce =$request->ce :  $medicion->ce =null;
        $request->temperatura != '' ?  $medicion->temperatura =$request->temperatura :  $medicion->temperatura =null;
        $request->turbiedad != '' ?  $medicion->turbiedad =$request->turbiedad :  $medicion->turbiedad =null;
        $request->sdt != '' ?  $medicion->sdt =$request->sdt :  $medicion->sdt =null;
        $request->sst != '' ?  $medicion->sst =$request->sst :  $medicion->sst =null;
        $request->color != '' ?  $medicion->color =$request->color :  $medicion->color =null;
//        $request->co != '' ?  $medicion->co =$request->co :  $medicion->co =null;
        $request->od != '' ?  $medicion->od =$request->od :  $medicion->od =null;
        $request->hs != '' ?  $medicion->hs =$request->hs :  $medicion->hs =null;
        $request->ca != '' ?  $medicion->ca =$request->ca :  $medicion->ca =null;
        $request->mg != '' ?  $medicion->mg =$request->mg :  $medicion->mg =null;
        $request->na != '' ?  $medicion->na =$request->na :  $medicion->na =null;
        $request->k != '' ?  $medicion->k =$request->k :  $medicion->k =null;
        $request->amonio!= '' ?  $medicion->amonio =$request->amonio :  $medicion->amonio =null;
        $request->cloruro!= '' ?  $medicion->cloruro =$request->cloruro :  $medicion->cloruro =null;
        $request->nitrato!= '' ?  $medicion->nitrato =$request->nitrato :  $medicion->nitrato =null;
        $request->nitrito!= '' ?  $medicion->nitrito =$request->nitrito :  $medicion->nitrito =null;
        $request->cianuro!= '' ?  $medicion->cianuro =$request->cianuro :  $medicion->cianuro =null;
//        $request->na_k != '' ?  $medicion->na_k =$request->na_k :  $medicion->na_k =null;
//        $request->co2 != '' ?  $medicion->co2 =$request->co2 :  $medicion->co2 =null;
//        $request->co2h != '' ?  $medicion->co2h =$request->co2h :  $medicion->co2h =null;
//        $request->ci != '' ?  $medicion->ci =$request->ci :  $medicion->ci =null;
//        $request->so4 != '' ?  $medicion->so4 =$request->so4 :  $medicion->so4 =null;
//        $request->alcalinidad != '' ?  $medicion->alcalinidad =$request->alcalinidad :  $medicion->alcalinidad =null;
//        $request->dureza != '' ?  $medicion->dureza =$request->dureza :  $medicion->dureza =null;
//        $request->sio3 != '' ?  $medicion->sio3 =$request->sio3 :  $medicion->sio3 =null;
//        $request->nno3 != '' ?  $medicion->nno3 =$request->nno3 :  $medicion->nno3 =null;
//        $request->nno2 != '' ?  $medicion->nno2 =$request->nno2 :  $medicion->nno2 =null;
//        $request->nnh4 != '' ?  $medicion->nnh4 =$request->nnh4 :  $medicion->nnh4 =null;
        $request->nt != '' ?  $medicion->nt =$request->nt :  $medicion->nt =null;
//        $request->kjendall != '' ?  $medicion->kjendall =$request->kjendall :  $medicion->kjendall =null;
//        $request->po4 != '' ?  $medicion->po4 =$request->po4 :  $medicion->po4 =null;
        $request->p != '' ?  $medicion->p =$request->p :  $medicion->p =null;
//        $request->pt != '' ?  $medicion->pt =$request->pt :  $medicion->pt =null;
//        $request->si != '' ?  $medicion->si =$request->si :  $medicion->si =null;
        $request->b != '' ?  $medicion->b =$request->b :  $medicion->b =null;

        $request->dbo5 != '' ?  $medicion->dbo5 =$request->dbo5 :  $medicion->dbo5 =null;
        $request->dqo != '' ?  $medicion->dqo =$request->dqo :  $medicion->dqo =null;
        $request->coli_feca != '' ?  $medicion->coli_feca =$request->coli_feca :  $medicion->coli_feca =null;
        $request->coli_tot != '' ?  $medicion->coli_tot =$request->coli_tot :  $medicion->coli_tot =null;
//        $request->salmonella != '' ?  $medicion->salmonella =$request->salmonella :  $medicion->salmonella =null;
        $request->zn != '' ?  $medicion->zn =$request->zn :  $medicion->zn =null;
        $request->cd != '' ?  $medicion->cd =$request->cd :  $medicion->cd =null;
        $request->pb != '' ?  $medicion->pb =$request->pb :  $medicion->pb =null;
        $request->fe != '' ?  $medicion->fe =$request->fe :  $medicion->fe =null;
        $request->mn != '' ?  $medicion->mn =$request->mn :  $medicion->mn =null;
        $request->cu != '' ?  $medicion->cu =$request->cu :  $medicion->cu =null;
        $request->hg != '' ?  $medicion->hg =$request->hg :  $medicion->hg =null;
        $request->as != '' ?  $medicion->as =$request->as :  $medicion->as =null;
        $request->cr != '' ?  $medicion->cr =$request->cr :  $medicion->cr =null;
        $request->ni != '' ?  $medicion->ni =$request->ni :  $medicion->ni =null;
        $request->sb != '' ?  $medicion->sb =$request->sb :  $medicion->sb =null;
        $request->se != '' ?  $medicion->se =$request->se :  $medicion->se =null;

        $medicion->save();
        return redirect('admin/campaniasrema/' . $medicion->id_remas);
    }

}
