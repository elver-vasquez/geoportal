<?php

namespace App\Http\Controllers;

use App\MedicionRemfc;
use App\Remfc;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class RemfcController extends Controller
{


    public function importar()
    {
        $ruta = public_path() . '\medicion_remfc.xls';
        \Excel::load($ruta, function ($reader) {

//            return dd($reader->get()->toArray());

            foreach ($reader->get() as $book) {
                MedicionRemfc::create($book->toArray());
            }
        });
//        return dd(MedicionRema::all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remas = Remfc::orderby('codigo', 'ASC')->get();
        return view('admin.remfc', [
            'remas' => $remas
        ]);
    }

    public function campanias(Remfc $remfc)
    {

        $mediciones = $remfc->mediciones()->get();

        return view('admin.medicionesremfc', [
            'mediciones' => $mediciones,
            'rema_id'=>$remfc->id
        ]);


    }

    public function medicionCreate(Remfc $remfc_id){

        return view('admin.createmedicion_remfc',['rema'=>$remfc_id]);
    }

    public function medicionstore(Request $request)
    {
        $medicion =new MedicionRemfc();
        $medicion->id_remfc = $request->id_remfc;
        $medicion->campania = $request->campania;
        $medicion->cod_campania = $request->cod_campania;
        $medicion->laboratorio = $request->laboratorio;
        $medicion->fecha = $request->fecha;
        $medicion->hora = $request->hora;
        $medicion->caudal != '' ? $request->caudal : null;

        $request->caudal != '' ?$medicion->caudal= $request->caudal : $medicion->caudal= null;
        $request->ph != '' ?$medicion->ph= $request->ph : $medicion->ph= null;
        $request->ce != '' ?$medicion->ce= $request->ce : $medicion->ce= null;
        $request->temperatura != '' ?$medicion->temperatura= $request->temperatura : $medicion->temperatura= null;
        $request->aceites!=''? $medicion->aceites= $request->aceites : $medicion->aceites= null;
        $request->turbiedad != '' ?$medicion->turbiedad = $request->turbiedad: $medicion->turbiedad= null;
        $request->sdt !='' ?$medicion->sdt = $request->sdt: $medicion->sdt= null;
        $request->sst != '' ?$medicion->sst = $request->sst: $medicion->sst= null;
        $request->color != '' ?$medicion->color = $request->color: $medicion->color= null;
        $request->co != '' ?$medicion->co = $request->co: $medicion->co= null;
        $request->od != '' ?$medicion->od = $request->od: $medicion->od= null;
        $request->od_satu != '' ?$medicion->od_satu = $request->od_satu: $medicion->od_satu= null;
        $request->saturacion != '' ?$medicion->saturacion = $request->saturacion: $medicion->saturacion= null;
        $request->hs != '' ?$medicion->hs = $request->hs: $medicion->hs= null;


        $request->ca != '' ?$medicion->ca = $request->ca: $medicion->ca= null;
        $request->mg != '' ?$medicion->mg = $request->mg: $medicion->mg= null;
        $request->na != '' ?$medicion->na = $request->na: $medicion->na= null;
        $request->k != '' ?$medicion->k = $request->k: $medicion->k= null;
        $request->na_k != '' ?$medicion->na_k = $request->na_k: $medicion->na_k= null;
        $request->co2 != '' ?$medicion->co2 = $request->co2: $medicion->co2= null;
        $request->co2h != '' ?$medicion->co2h = $request->co2h: $medicion->co2h= null;
        $request->ci != '' ?$medicion->ci = $request->ci: $medicion->ci= null;
        $request->so4 != '' ?$medicion->so4 = $request->so4: $medicion->so4= null;
        $request->alcalinidad != '' ?$medicion->alcalinidad = $request->alcalinidad: $medicion->alcalinidad= null;
        $request->dureza != '' ?$medicion->dureza = $request->dureza: $medicion->dureza= null;
        $request->sio3 != '' ?$medicion->sio3 = $request->sio3: $medicion->sio3= null;
        $request->nno3 != '' ?$medicion->nno3 = $request->nno3: $medicion->nno3= null;
        $request->nno2 != '' ?$medicion->nno2 = $request->nno2: $medicion->nno2= null;
        $request->nnh4 != '' ?$medicion->nnh4 = $request->nnh4: $medicion->nnh4= null;
        $request->nt != '' ?$medicion->nt = $request->nt: $medicion->nt= null;
        $request->kjendall != '' ?$medicion->kjendall = $request->kjendall: $medicion->kjendall= null;
        $request->po4 != '' ?$medicion->po4 = $request->po4: $medicion->po4= null;
        $request->p != '' ?$medicion->p = $request->p: $medicion->p= null;
        $request->pt != '' ?$medicion->pt = $request->pt: $medicion->pt= null;
        $request->si != '' ?$medicion->si = $request->si: $medicion->si= null;
        $request->b != '' ?$medicion->b = $request->b: $medicion->b= null;
        $request->dbo5 != '' ?$medicion->dbo5 = $request->dbo5: $medicion->dbo5= null;
        $request->dqo != '' ?$medicion->dqo = $request->dqo: $medicion->dqo= null;
        $request->coli_feca != '' ?$medicion->coli_feca = $request->coli_feca: $medicion->coli_feca= null;
        $request->coli_tot != '' ?$medicion->coli_tot = $request->coli_tot: $medicion->coli_tot= null;
        $request->salmonella != '' ?$medicion->salmonella = $request->salmonella: $medicion->salmonella= null;
        $request->bact_coli != '' ?$medicion->bact_coli = $request->bact_coli: $medicion->bact_coli= null;
        $request->zn != '' ?$medicion->zn = $request->zn: $medicion->zn= null;
        $request->cd != '' ?$medicion->cd = $request->cd: $medicion->cd= null;
        $request->pb != '' ?$medicion->pb = $request->pb: $medicion->pb= null;
        $request->fe != '' ?$medicion->fe = $request->fe: $medicion->fe= null;
        $request->mn != '' ?$medicion->mn = $request->mn: $medicion->mn= null;
        $request->cu != '' ?$medicion->cu = $request->cu: $medicion->cu= null;
        $request->hg != '' ?$medicion->hg = $request->hg: $medicion->hg= null;
        $request->as != '' ?$medicion->as = $request->as: $medicion->as= null;
        $request->cr != '' ?$medicion->cr = $request->cr: $medicion->cr= null;
        $request->ni != '' ?$medicion->ni = $request->ni: $medicion->ni= null;
        $request->sb != '' ?$medicion->sb = $request->sb: $medicion->sb= null;
        $request->se != '' ?$medicion->se = $request->se: $medicion->se= null;

        $medicion->save();
        return redirect('admin/campanias_remfc/' . $medicion->id_remfc);
    }

    public function medicionupdate(Request $request)
    {

//        return dd($request->all());


        $medicion =MedicionRemfc::find($request->medicion_id);

        $medicion->id_remfc = $request->remfc_id;
        $medicion->campania = $request->campania;
        $medicion->cod_campania = $request->cod_campania;
        $medicion->laboratorio = $request->laboratorio;
        $medicion->fecha = $request->fecha;
        $medicion->hora = $request->hora;



       $request->caudal != '' ?$medicion->caudal= $request->caudal : $medicion->caudal= null;
       $request->ph != '' ?$medicion->ph= $request->ph : $medicion->ph= null;
       $request->ce != '' ?$medicion->ce= $request->ce : $medicion->ce= null;
       $request->temperatura != '' ?$medicion->temperatura= $request->temperatura : $medicion->temperatura= null;
       $request->aceites!=''? $medicion->aceites= $request->aceites : $medicion->aceites= null;
       $request->turbiedad != '' ?$medicion->turbiedad = $request->turbiedad: $medicion->turbiedad= null;
       $request->sdt !='' ?$medicion->sdt = $request->sdt: $medicion->sdt= null;
       $request->sst != '' ?$medicion->sst = $request->sst: $medicion->sst= null;
       $request->color != '' ?$medicion->color = $request->color: $medicion->color= null;
       $request->co != '' ?$medicion->co = $request->co: $medicion->co= null;
       $request->od != '' ?$medicion->od = $request->od: $medicion->od= null;
       $request->od_satu != '' ?$medicion->od_satu = $request->od_satu: $medicion->od_satu= null;
       $request->saturacion != '' ?$medicion->saturacion = $request->saturacion: $medicion->saturacion= null;
       $request->hs != '' ?$medicion->hs = $request->hs: $medicion->hs= null;


       $request->ca != '' ?$medicion->ca = $request->ca: $medicion->ca= null;
       $request->mg != '' ?$medicion->mg = $request->mg: $medicion->mg= null;
       $request->na != '' ?$medicion->na = $request->na: $medicion->na= null;
       $request->k != '' ?$medicion->k = $request->k: $medicion->k= null;
       $request->na_k != '' ?$medicion->na_k = $request->na_k: $medicion->na_k= null;
       $request->co2 != '' ?$medicion->co2 = $request->co2: $medicion->co2= null;
       $request->co2h != '' ?$medicion->co2h = $request->co2h: $medicion->co2h= null;
       $request->ci != '' ?$medicion->ci = $request->ci: $medicion->ci= null;
       $request->so4 != '' ?$medicion->so4 = $request->so4: $medicion->so4= null;
       $request->alcalinidad != '' ?$medicion->alcalinidad = $request->alcalinidad: $medicion->alcalinidad= null;
       $request->dureza != '' ?$medicion->dureza = $request->dureza: $medicion->dureza= null;
       $request->sio3 != '' ?$medicion->sio3 = $request->sio3: $medicion->sio3= null;
       $request->nno3 != '' ?$medicion->nno3 = $request->nno3: $medicion->nno3= null;
       $request->nno2 != '' ?$medicion->nno2 = $request->nno2: $medicion->nno2= null;
       $request->nnh4 != '' ?$medicion->nnh4 = $request->nnh4: $medicion->nnh4= null;
       $request->nt != '' ?$medicion->nt = $request->nt: $medicion->nt= null;
       $request->kjendall != '' ?$medicion->kjendall = $request->kjendall: $medicion->kjendall= null;
       $request->po4 != '' ?$medicion->po4 = $request->po4: $medicion->po4= null;
       $request->p != '' ?$medicion->p = $request->p: $medicion->p= null;
       $request->pt != '' ?$medicion->pt = $request->pt: $medicion->pt= null;
       $request->si != '' ?$medicion->si = $request->si: $medicion->si= null;
       $request->b != '' ?$medicion->b = $request->b: $medicion->b= null;
       $request->dbo5 != '' ?$medicion->dbo5 = $request->dbo5: $medicion->dbo5= null;
       $request->dqo != '' ?$medicion->dqo = $request->dqo: $medicion->dqo= null;
       $request->coli_feca != '' ?$medicion->coli_feca = $request->coli_feca: $medicion->coli_feca= null;
       $request->coli_tot != '' ?$medicion->coli_tot = $request->coli_tot: $medicion->coli_tot= null;
       $request->salmonella != '' ?$medicion->salmonella = $request->salmonella: $medicion->salmonella= null;
       $request->bact_coli != '' ?$medicion->bact_coli = $request->bact_coli: $medicion->bact_coli= null;
       $request->zn != '' ?$medicion->zn = $request->zn: $medicion->zn= null;
       $request->cd != '' ?$medicion->cd = $request->cd: $medicion->cd= null;
       $request->pb != '' ?$medicion->pb = $request->pb: $medicion->pb= null;
       $request->fe != '' ?$medicion->fe = $request->fe: $medicion->fe= null;
       $request->mn != '' ?$medicion->mn = $request->mn: $medicion->mn= null;
       $request->cu != '' ?$medicion->cu = $request->cu: $medicion->cu= null;
       $request->hg != '' ?$medicion->hg = $request->hg: $medicion->hg= null;
       $request->as != '' ?$medicion->as = $request->as: $medicion->as= null;
       $request->cr != '' ?$medicion->cr = $request->cr: $medicion->cr= null;
       $request->ni != '' ?$medicion->ni = $request->ni: $medicion->ni= null;
       $request->sb != '' ?$medicion->sb = $request->sb: $medicion->sb= null;
       $request->se != '' ?$medicion->se = $request->se: $medicion->se= null;

        $medicion->save();
        return redirect('admin/campanias_remfc/' . $medicion->id_remfc);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
