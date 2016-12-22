<?php

namespace App\Http\Controllers;

use App\MapaPunto;
use App\Monitoreo;
use App\Tdps;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tdps=Tdps::where('tipo','tdps')->orderBy('nombre','ASC')->get();

        $remas=Tdps::find(19);
        $remfc=Tdps::find(20);
        $remli=Tdps::find(21);

        $bolivia=Tdps::where('tipo','bolivia')->first();
        $peru=Tdps::where('tipo','peru')->first();
        $zh=Monitoreo::where('tipo','zh')->orderBy('codigo','ASC')->orderBy('nombre','ASC')->get();
        $poopo=Tdps::where('tipo','poopo')->first();
        $sub_poopo=Tdps::where('tipo','subcuenca')->first();
        $sub_coi=Tdps::find(23);
        $coipasa=Tdps::where('tipo','coipasa')->first();
        $sub_poopo_5=Monitoreo::where('tipo','poopo5')->get();
        $sub_poopo_1=MapaPunto::where('tipo','poopo1')->get();
        $sub_coipasa_5=Monitoreo::where('tipo','coipasa5')->get();
        $sub_coipasa_1=MapaPunto::where('tipo','coipasa1')->get();
        return view('public.index',[
            'remas'=>$remas,
            'remfc'=>$remfc,
            'remli'=>$remli,
            'tdps'=>$tdps,
            'bolivia'=>$bolivia,
            'peru'=>$peru,
            'zh'=>$zh,
            'poopo'=>$poopo,
            'sub_poopo'=>$sub_poopo,
            'sub_coi'=>$sub_coi,
            'coipasa'=>$coipasa,
            'sub_poopo_5'=>$sub_poopo_5,
            'sub_poopo_1'=>$sub_poopo_1,
            'sub_coipasa_5'=>$sub_coipasa_5,
            'sub_coipasa_1'=>$sub_coipasa_1,


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
