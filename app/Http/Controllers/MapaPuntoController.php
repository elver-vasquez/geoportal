<?php

namespace App\Http\Controllers;

use App\MapaPunto;
use App\Monitoreo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mockery\CountValidator\Exception;
use Symfony\Component\HttpFoundation\File\File;

class MapaPuntoController extends Controller
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


    public function indexCuencaCoipasa1000000(){
        $sub=MapaPunto::where('tipo','coipasa1')->orderBy('nombre','ASC')->get();

        return view ('admin.subcuencascoipasa_10000',['subcuencas'=>$sub]);
    }
    public function storeCuencaCoipasa1000000(Request $request){
        $rules=[
            'nombre'=>'required'
        ];
        $this->validate($request,$rules);

        $mapa= new MapaPunto();

        $mapa->nombre=$request->nombre;
        $mapa->descripcion=$request->descripcion;
        $mapa->tipo='coipasa1';

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
                    $mapa->archivo=$fileName;


                }
                else
                    return redirect()->back();

            }
        }
        if($mapa->save()){

            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }

    }
    public function updateCuencaCoipasa1000000(Request $request){
        $rules=[
            'nombre'=>'required'
        ];
        $this->validate($request,$rules);

        $mapa= MapaPunto::find($request->id);

        $mapa->nombre=$request->nombre;
        $mapa->descripcion=$request->descripcion;

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
                    $mapa->archivo=$fileName;


                }
                else
                    return redirect()->back();

            }
        }
        if($mapa->save()){

            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }

    }
    public  function destroyCuencaCoipasa1000000(MapaPunto $mapa){

        $mapa->delete();
        return  redirect()->back();

    }

    public function updateCuencaCoipasa50000(Request $request){

        $rules=[
            'nombre'=>'required'
        ];
        $this->validate($request,$rules);

        $mapa= MapaPunto::find($request->id);

        $mapa->nombre=$request->nombre;
        $mapa->descripcion=$request->descripcion;

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
                    $mapa->archivo=$fileName;


                }
                else
                    return redirect()->back();

            }
        }
        if($mapa->save()){

            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    }


    public function indexCuencaPoopo1000000(){
        $sub=MapaPunto::where('tipo','poopo1')->orderBy('nombre','ASC')->get();

        return view ('admin.subcuencaspoopo_10000',['subcuencas'=>$sub]);
    }
    public  function destroyCuencaPoopo1000000(MapaPunto $mapa){

            $mapa->delete();
            return  redirect()->back();

        }
    public function updateCuencaPoopo1000000(Request $request){
        $rules=[
            'nombre'=>'required'
        ];
        $this->validate($request,$rules);

        $mapa= MapaPunto::find($request->id);

        $mapa->nombre=$request->nombre;
        $mapa->descripcion=$request->descripcion;

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
                    $mapa->archivo=$fileName;


                }
                else
                    return redirect()->back();

            }
        }
        if($mapa->save()){

            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }

    }
    public function storeCuencaPoopo1000000(Request $request){
        $rules=[
            'nombre'=>'required'
        ];
        $this->validate($request,$rules);

        $mapa= new MapaPunto();

        $mapa->nombre=$request->nombre;
        $mapa->descripcion=$request->descripcion;
        $mapa->tipo='poopo1';

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
                    $mapa->archivo=$fileName;


                }
                else
                    return redirect()->back();

            }
        }
        if($mapa->save()){

            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }

    }



    public function storeMapaSubcuenca(Request $request){

        $rules=[
            'archivo'=>'required'
        ];
        $this->validate($request,$rules);

        $mapa= new MapaPunto();

        $mapa->nombre=$request->nombre;
        $mapa->monitoreo_id=$request->monitoreo_id;
        if($request->file('archivo')){
            if ($request->file('archivo')->isValid()) {
                $destinationPath =public_path().'/mapas/cuencas/'; // upload path
                $fileName = $request->file('archivo')->getClientOriginalName();
                try {
                    $request->file('archivo')->move($destinationPath, $fileName); // sube el archivo

//                    Storage::disk('local')->put($fileName, \File::get($request->file('archivo')));
                }
                catch (\Exception $e){
                    return $e;
                }
                $url=public_path().'/mapas/cuencas/'.$fileName;
                if(file_exists($url)){
                    $mapa->archivo=$fileName;
                    $mapa->descripcion=$request->descripcion;
                    if($mapa->save()){

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
            public function cuencaPoopoMapas50000(Monitoreo $subcuenca){
                return view ('admin.cuencaPoopoMapas50000',['subcuenca'=>$subcuenca]);
            }

    public function cuencaCoipasaMapas50000(Monitoreo $subcuenca){
        return view ('admin.cuencaCoipasaMapas50000',['subcuenca'=>$subcuenca]);
    }


    public function store(Request $request)
    {

        $rules=[
            'nombre'=>'required',
            'archivo'=>'required'
        ];
        $this->validate($request,$rules);
        $mapa= new MapaPunto();

        $mapa->nombre=$request->nombre;
        $mapa->monitoreo_id=$request->monitoreo_id;
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
                    $mapa->archivo=$fileName;
                    $mapa->descripcion=$request->descripcion;
                    if($mapa->save()){

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
    public function updateMapaSubcuenca(Request $request)
    {



        $mapa=MapaPunto::find($request->id);

        $mapa->nombre=$request->nombre;
        if($request->file('archivo')){
            if ($request->file('archivo')->isValid()) {
                $destinationPath =public_path().'/mapas/tdps/puntos/'; // upload path
                $fileName = $request->file('archivo')->getClientOriginalName();
                Storage::disk('local')->put('$filename',\File::get($request->file('archivo')));
                $url=public_path().'/mapas/tdps/puntos/'.$fileName;
                if(file_exists($url)){
                    $mapa->archivo=$fileName;
                    $mapa->descripcion=$request->descripcion;
                    if($mapa->save()){

                        return redirect()->back();
                    }
                    else
                    {
                        return redirect()->back();
                    }

                }
                else
                    return redirect()->back();
//                $request->file('archivo')->move($destinationPath, $fileName); // sube el archivo




            }
        }
        else{
            $mapa->save();
            return redirect()->back();


        }


    }

    public function update(Request $request)
    {
        $mapa=MapaPunto::find($request->id);

        $mapa->nombre=$request->nombre;
        if($request->file('archivo')){
            if ($request->file('archivo')->isValid()) {
                $destinationPath =public_path().'/mapas/tdps/puntos/'; // upload path
                $fileName = $request->file('archivo')->getClientOriginalName();
                Storage::disk('local')->put('$filename',\File::get($request->file('archivo')));
                $url=public_path().'/mapas/tdps/puntos/'.$fileName;
                if(file_exists($url)){
                    $mapa->archivo=$fileName;
                    $mapa->descripcion=$request->descripcion;
                    if($mapa->save()){

                        return redirect()->back();
                    }
                    else
                    {
                        return redirect()->back();
                    }

                }
                else
                    abort(404);
//                $request->file('archivo')->move($destinationPath, $fileName); // sube el archivo




            }
        }
        else{
            $mapa->save();
            return redirect()->back();


        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroyMapaSubcuenca(MapaPunto $mapa){

        $url=public_path().'/mapas/cuencas/'.$mapa->archivo;
        if($mapa->delete()){
            \File::delete($url);
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
    public function destroy(MapaPunto $mapa)
    {
        $url=public_path().'/mapas/tdps/puntos/'.$mapa->archivo;
        if($mapa->delete()){
            \File::delete($url);
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
}
