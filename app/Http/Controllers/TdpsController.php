<?php

namespace App\Http\Controllers;

use App\Tdps;
use Illuminate\Http\Request;

class TdpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tdps=Tdps::where('tipo','tdps')->orderBy('nombre','ASC')->get();


        return view('admin.tdps',[
            'tdps'=>$tdps
        ]);

    }

    public function indexCuenca(){
        $tdps=Tdps::where('tipo','poopo')->orwhere('tipo','subcuenca')->orderBy('nombre','ASC')->get();



        return view('admin.cuencas',[
            'tdps'=>$tdps
        ]);

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
    public function updateMapaSubcuenca(Request $request){

        $td= Tdps::find(22);
        $td->nombre=$request->nombre;
        $td->tipo='poopo';
        if($request->file('archivo')){
            if ($request->file('archivo')->isValid()) {
                $destinationPath =public_path().'/mapas/'; // upload path
                $fileName = $request->file('archivo')->getClientOriginalName();
                $request->file('archivo')->move($destinationPath, $fileName); // sube el archivo

                $td->archivo=$fileName;
                $td->descripcion=$request->descripcion;


            }
        }

        if($td->save()){

            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    }

    public function indexCuencaCoipasa(){

        $tdps=Tdps::where('tipo','coipasa')->orwhere('tipo','sub_coi')->get();
        return view ('admin.cuenca_coipasa',['tdps'=>$tdps]);

    }

    public function updateMapaSubcuencaPoopo(Request $request){

        $td= Tdps::find($request->id);
        $td->nombre=$request->nombre;
        $td->descripcion=$request->descripcion;
//        $td->tipo='poopo';
        if($request->file('archivo')){
            if ($request->file('archivo')->isValid()) {
                $destinationPath =public_path().'/mapas/'; // upload path
                $fileName = $request->file('archivo')->getClientOriginalName();
                $request->file('archivo')->move($destinationPath, $fileName); // sube el archivo

                $td->archivo=$fileName;



            }
        }

        if($td->save()){

            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    }
 public function subCuencas(Tdps $tdps){

     $subcuencas=$tdps->puntos_monitoreo;

     return view('admin.subcuencas',[
         'subcuencas'=>$subcuencas,
         'tdps'=>$tdps

     ]);
 }
    public function puntosMonitoreo(Tdps $tdps){

            return view('admin.puntos_monitoreo',[
            'tdps'=>$tdps

        ]);
    }


    public function storeCuenca(Request $request){
        $td=new Tdps();
        $td->nombre=$request->nombre;
        $td->descripcion=$request->descripcion;
        $td->tipo='cuenca';


        if($td->save()) {
            return redirect('admin/cuencas');
        }


    }
    public function store(Request $request)
    {

//        return dd($request->file('archivo'));
        $td=new Tdps();
        $td->nombre=$request->nombre;
        $td->descripcion=$request->descripcion;

        $td->tipo='tdps';
        if($request->file('archivo')){
            if ($request->file('archivo')->isValid()) {
                $destinationPath =public_path().'/mapas/'; // upload path
                $fileName = $request->file('archivo')->getClientOriginalName();
                $request->file('archivo')->move($destinationPath, $fileName); // sube el archivo

                $td->archivo=$fileName;


            }
        }

        if($td->save()){

            return redirect('admin/tdps');
        }
        else
        {
            return redirect('admin/tdps');
        }
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


    public function updateCuenca(Request $request){
        $td= Tdps::find($request->id);
        $td->nombre=$request->nombre;
        $td->descripcion=$request->descripcion;
        if($td->save())
            return redirect()->back();
        else
            return redirect()->back();
    }
    public function update(Request $request)
    {
        $td= Tdps::find($request->id);
        $td->nombre=$request->nombre;
        if($request->file('archivo')){
            if ($request->file('archivo')->isValid()) {
                $destinationPath =public_path().'/mapas/'; // upload path
                $fileName = $request->file('archivo')->getClientOriginalName();
                $request->file('archivo')->move($destinationPath, $fileName); // sube el archivo

                $td->archivo=$fileName;
                $td->descripcion=$request->descripcion;


            }
        }

        if($td->save()){

            return redirect('admin/tdps');
        }
        else
        {
            return redirect('admin/tdps');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyCuenca(Tdps $cuenca){
        if($cuenca->delete()){
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }

    }
    public function destroy(Tdps $tdps)
    {
        if($tdps->delete()){
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
}
