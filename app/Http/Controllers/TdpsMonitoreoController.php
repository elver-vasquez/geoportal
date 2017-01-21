<?php

namespace App\Http\Controllers;

use App\Monitoreo;
use Illuminate\Http\Request;

class TdpsMonitoreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function indexZonasHidrologicas(){
        $zh=Monitoreo::where('tipo','zh')->orderBy('codigo','ASC')->orderBy('nombre','ASC')->get();
        return view ('admin.zonashidrologicas',['zonas_hidrologicas'=>$zh]);

    }
    public function storeZonasHidrologicas(Request $request)
    {

//        return dd($request->all());
//
        $rules=[
            'archivo'=>'required',
            'nombre'=>'required'

        ];
        $this->validate($request,$rules);

        $zona= new Monitoreo();
        $zona->nombre=$request->nombre;
        $zona->codigo=$request->codigo;
        $zona->tipo='zh';

        if($request->file('archivo')){
            if ($request->file('archivo')->isValid()) {
                $destinationPath =public_path().'/mapas/'; // upload path
                $fileName = $request->file('archivo')->getClientOriginalName();
                try {
                    $request->file('archivo')->move($destinationPath, $fileName); // sube el archivo

//                    Storage::disk('local')->put($fileName, \File::get($request->file('archivo')));
                }
                catch (\Exception $e){
                    return $e;
                }
                $url=public_path().'/mapas/'.$fileName;
                if(file_exists($url)){
                    $zona->archivo=$fileName;
                    if($zona->save()){

                        return redirect()->back();
                    }
                    else
                    {
                        return redirect()->back();
                    }

                }
                else
                    return redirect()->back();




            }
        }

    }
public function actualizar_estado(Request $request){
    try {
        $moni = Monitoreo::find($request->id);
        if ($request->tipo == 'rema') {
            $moni->estado_remas = $request->estado;
            $moni->save();
        }
        if ($request->tipo == 'remfc') {
            $moni->estado_remfc = $request->estado;
            $moni->save();
        }
        if ($request->tipo == 'remli') {
            $moni->estado_remli = $request->estado;
            $moni->save();
        }
        return response()->json([
            'status'=>true,

        ],200);
    }
    catch (\Exception $e){
        return response()->json([
            'status'=>false,
            'error'=>$e
        ],403);
    }

}
    public function updateZonasHidrologicas(Request $request){

        $rules=[
            'nombre'=>'required'

        ];
        $this->validate($request,$rules);

        $zona= Monitoreo::find($request->id);
        $zona->nombre=$request->nombre;
        $zona->codigo=$request->codigo;

        if($request->file('archivo_remas')){
            if ($request->file('archivo_remas')->isValid()) {
                $destinationPath =public_path().'/mapas/'; // upload path
                $fileName = $request->file('archivo_remas')->getClientOriginalName();
                try {
                    $request->file('archivo_remas')->move($destinationPath, $fileName); // sube el archivo

//                    Storage::disk('local')->put($fileName, \File::get($request->file('archivo')));
                }
                catch (\Exception $e){
                    return redirect()->back();
                }
                $url=public_path().'/mapas/'.$fileName;
                if(file_exists($url)){
                    $zona->archivo_remas=$fileName;


                }
                else
                    return redirect()->back();
            }
        }
        if($request->file('archivo_remfc')){
            if ($request->file('archivo_remfc')->isValid()) {
                $destinationPath =public_path().'/mapas/'; // upload path
                $fileName = $request->file('archivo_remfc')->getClientOriginalName();
                try {
                    $request->file('archivo_remfc')->move($destinationPath, $fileName); // sube el archivo

//                    Storage::disk('local')->put($fileName, \File::get($request->file('archivo')));
                }
                catch (\Exception $e){
                    return redirect()->back();
                }
                $url=public_path().'/mapas/'.$fileName;
                if(file_exists($url)){
                    $zona->archivo_remfc=$fileName;


                }
                else
                    return redirect()->back();
            }
        }

        if($request->file('archivo_remli')){
            if ($request->file('archivo_remli')->isValid()) {
                $destinationPath =public_path().'/mapas/'; // upload path
                $fileName = $request->file('archivo_remli')->getClientOriginalName();
                try {
                    $request->file('archivo_remli')->move($destinationPath, $fileName); // sube el archivo

//                    Storage::disk('local')->put($fileName, \File::get($request->file('archivo')));
                }
                catch (\Exception $e){
                    return redirect()->back();
                }
                $url=public_path().'/mapas/'.$fileName;
                if(file_exists($url)){
                    $zona->archivo_remli=$fileName;


                }
                else
                    return redirect()->back();
            }
        }
        if($zona->save()){

            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    }
    public function store(Request $request)
    {
//        return dd($request->all());
        $moni= new Monitoreo();
        $moni->codigo=$request->codigo;
        $moni->nombre=$request->nombre;
        $moni->tdps_id=$request->tdps_id;
        $moni->tipo='monitoreo';
        if($moni->save()){
            return redirect()->back();
        }
        else
        {

        }
    }

    public function storeSubCuenca(Request $request)
    {
//        return dd($request->all());
        $moni= new Monitoreo();
        $moni->codigo=$request->codigo;
        $moni->nombre=$request->nombre;
        $moni->tdps_id=$request->tdps_id;
        $moni->tipo='subcuenca';
        if($moni->save()){
            return redirect()->back();
        }
        else
        {

        }
    }

    public function mapasMonitoreo(Monitoreo $monitoreo){
//        return dd($monitoreo);

        return view ('admin.mapas_monitoreo',['monitoreo'=>$monitoreo]);
    }
    public function mapasSubcuencas(Monitoreo $monitoreo){
        return view ('admin.mapas_subcuencas',['monitoreo'=>$monitoreo]);

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

    Public function indexCuencaPoopo50000(){
         $sub=Monitoreo::where('tipo','poopo5')->orderBy('codigo','ASC')->orderBy('nombre','ASC')->get();

        return view ('admin.subcuencaspoopo_50000',['subcuencas'=>$sub]);
    }
    Public function indexCuencaCoipasa50000(){
        $sub=Monitoreo::where('tipo','coipasa5')->orderBy('codigo','ASC')->orderBy('nombre','ASC')->get();

        return view ('admin.subcuencascoipasa_50000',['subcuencas'=>$sub]);
    }

    public function indexCuencaPoopo1000000(){
        $sub=Monitoreo::where('tipo','poopo1')->orderBy('codigo','ASC')->orderBy('nombre','ASC')->get();

        return view ('admin.subcuencaspoopo_10000',['subcuencas'=>$sub]);
    }


    public function storeSubcuencasCoipasa50000(Request $request){


//        return dd($request->all());
//
        $rules=[
//            'archivo'=>'required',
            'nombre'=>'required'

        ];
        $this->validate($request,$rules);

        $zona= new Monitoreo();
        $zona->nombre=$request->nombre;
        $zona->codigo=$request->codigo;
        $zona->tipo='coipasa5';

        if($request->file('archivo')){
            if ($request->file('archivo')->isValid()) {
                $destinationPath =public_path().'/mapas/'; // upload path
                $fileName = $request->file('archivo')->getClientOriginalName();
                try {
                    $request->file('archivo')->move($destinationPath, $fileName); // sube el archivo

//                    Storage::disk('local')->put($fileName, \File::get($request->file('archivo')));
                }
                catch (\Exception $e){
                    return $e;
                }
                $url=public_path().'/mapas/'.$fileName;
                if(file_exists($url)){
                    $zona->archivo=$fileName;
                    if($zona->save()){

                        return redirect()->back();
                    }
                    else
                    {
                        return redirect()->back();
                    }

                }
                else
                    return redirect()->back();




            }
        }
        return redirect()->back();

    }

    public function storeSubcuencasPoopo50000(Request $request){


//        return dd($request->all());
//
        $rules=[
//            'archivo'=>'required',
            'nombre'=>'required'

        ];
        $this->validate($request,$rules);

        $zona= new Monitoreo();
        $zona->nombre=$request->nombre;
        $zona->codigo=$request->codigo;
        $zona->tipo='poopo5';

        if($request->file('archivo')){
            if ($request->file('archivo')->isValid()) {
                $destinationPath =public_path().'/mapas/'; // upload path
                $fileName = $request->file('archivo')->getClientOriginalName();
                try {
                    $request->file('archivo')->move($destinationPath, $fileName); // sube el archivo

//                    Storage::disk('local')->put($fileName, \File::get($request->file('archivo')));
                }
                catch (\Exception $e){
                    return $e;
                }
                $url=public_path().'/mapas/'.$fileName;
                if(file_exists($url)){
                    $zona->archivo=$fileName;
                    if($zona->save()){

                        return redirect()->back();
                    }
                    else
                    {
                        return redirect()->back();
                    }

                }
                else
                    return redirect()->back();
            }
            else
                return redirect()->back();
        }
        else
            return redirect()->back();


    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateSubcuenca(Request $request){
        $moni=Monitoreo::find($request->id);
        $moni->codigo=$request->codigo;
        $moni->nombre=$request->nombre;
        if($moni->save()){
            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }

    }
    public function update(Request $request)
    {
        $moni=Monitoreo::find($request->id);
        $moni->codigo=$request->codigo;
        $moni->nombre=$request->nombre;
        if($moni->save()){
            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroySubcuenca(Monitoreo $subcuenca){

        if($subcuenca->delete()){
            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    }
    public function destroy(Monitoreo $monitoreo)
    {
        if($monitoreo->delete()){
            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    }
}
