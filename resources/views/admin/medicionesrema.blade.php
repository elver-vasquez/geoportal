@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <a href="{{url('admin/createmedicion')}}/{{$rema_id}}" class="btn btn-success btn-lg">Registrar Nueva Medicion</a>

        </div>
        <div class="col-md-12 ">

            @if($mediciones->count()>0)
                
                @foreach($mediciones as $m)
                    <div class="panel panel-default">
                        <div class="panel panel-heading">
                            <h2><strong>Campaña:</strong>{{$m->campania}}</h2>
                            <a href="###" class="editar btn btn-warning btn-lg " id="{{$m->id}}"><i class="fa fa-edit"></i> Editar</a>
                        </div>
                        <form  method="post" action="{{url('admin/medicionupdate')}}" class="form form-horizontal ">
                        {!! csrf_field() !!}
                            <div class="panel panel-body">
                            <div class="tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#popular{{$m->id}}" data-toggle="tab"><i class="fa fa-star"></i> Generales</a>
                                    </li>
                                    <li >
                                        <a href="#recent{{$m->id}}" data-toggle="tab" style="background-color:#01a0e4" >Parametros fisicos</a>
                                    </li>
                                    <li>
                                        <a href="#gases{{$m->id}}" data-toggle="tab" style="background-color:#8f9d6a">Gases</a>
                                    </li>
                                    <li>
                                        <a href="#quimicos{{$m->id}}" data-toggle="tab" style="background-color:#D8FA3C">Parametros Quimicos</a>
                                    </li>
                                    <li>
                                        <a href="#nutrientes{{$m->id}}" data-toggle="tab" style="background-color:#86cb86">Nutrientes</a>
                                    </li>
                                    <li>
                                        <a href="#sanitarios{{$m->id}}" data-toggle="tab" style="background-color:#DE8E30">Indicadores sanitarios Biologicos</a>
                                    </li>
                                    <li>
                                        <a href="#metales{{$m->id}}" data-toggle="tab" style="background-color:#74b2e2 ">Metales y no Metales trazas</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="popular{{$m->id}}" class="tab-pane active">
                                        <p>Generales</p>


                                        <div class="form-group ">
                                            <label for=""class=" col-md-2 control-label">Campaña</label>
                                            <div class="col-md-2">
                                            <input type="text" class="form-control medicion{{$m->id}}" value="{{$m->campania}}" readonly name="campania" id="campania">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for=""class="col-md-2 control-label">Codigo Campaña</label>
                                            <div class="col-md-2">
                                            <input type="text" class="form-control medicion{{$m->id}}" value="{{$m->cod_campania}}" readonly name="cod_campania" id="cod_campania">
                                        </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for=""class="col-md-2 control-label">Laboratorio responsable</label>
                                            <div class="col-md-2">
                                            <input type="text" class="form-control medicion{{$m->id}}" value="{{$m->laboratorio}}" readonly name="laboratorio" id="laboratorio">
                                        </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for=""class="col-md-2 control-label">Fecha d/m/A</label>
                                            <div class="col-md-2">
                                            <input type="text" class="datepicker form-control medicion{{$m->id}}" name="fecha" id="fecha" value="@if($m->fecha){{$m->fecha}}@endif"  readonly>
                                        </div>
                                       </div>


                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Hora H:m</label>
                                                <div class="col-md-2">
                                                <input type="text" class="form-control medicion{{$m->id}}" name="hora" id="hora" value="{{$m->hora}}" readonly>
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label for=""class="col-md-2 control-label">Caudal m3/s</label>
                                                <div class="col-md-2">
                                                <input type="text" class="form-control medicion{{$m->id}}" name="caudal" id="caudal" value="{{$m->caudal}}" readonly>
                                            </div>
                                            </div>
                                        </div>

                                    <div id="recent{{$m->id}}" class="tab-pane ">
                                        <p>Parametros fisicos</p>

                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">PH:</label>
                                                <div class="col-md-2">
                                                <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="ph" id="ph" value="{{$m->ph}}" readonly>
                                            </div>
                                            </div>

                                            <div class="form-group ">

                                                <label for=""class="col-md-2 control-label">Conductividad (uS/cm):</label>
                                                <div class="col-md-2">
                                                <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="ce" id="ce" value="{{$m->ce}}" readonly>
                                            </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Temperatura (°C):</label>
                                                <div class="col-md-2">
                                                <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="temperatura" id="temperatura" value="{{$m->temperatura}}" readonly>
                                            </div>
                                            </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-2 control-label">Turbidez(NTU):</label>
                                                    <div class="col-md-2">
                                                        <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="turbiedad" id="turbiedad" value="{{$m->turbiedad}}" readonly>
                                                    </div>
                                            </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-2 control-label">Solidos disueltos totalesz(mg/l):</label>
                                                    <div class="col-md-2">
                                                        <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="sdt" id="sdt" value="{{$m->sdt}}" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-2 control-label">Solidos suspendidos(mg/l):</label>
                                                    <div class="col-md-2">
                                                        <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="sst" id="sst" value="{{$m->sst}}" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-2 control-label">Color:</label>
                                                    <div class="col-md-2">
                                                        <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="color" id="color" value="{{$m->color}}" readonly>
                                                    </div>
                                                </div>

                                               </div>
                                    <div id="gases{{$m->id}}" class="tab-pane">
                                        <p>Gases</p>
                                        {{--<div class="form-group ">--}}
                                            {{--<label for=""class="col-md-2 control-label">CO2(mg/l):</label>--}}
                                            {{--<div class="col-md-2">--}}
                                                {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="co" id="co" value="{{$m->co}}" readonly>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        <div class="form-group ">

                                            <label for=""class="col-md-2 control-label">Oxigeno disuelto(mg/l):</label>
                                            <div class="col-md-2">
                                                <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="od" id="od" value="{{$m->od}}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for=""class="col-md-2 control-label">Sulfatos (mg/l):</label>
                                            <div class="col-md-2">
                                                <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="hs" id="hs" value="{{$m->hs}}" readonly>
                                            </div>
                                        </div>


                                    </div>
                                    <div id="quimicos{{$m->id}}" class="tab-pane">
                                        <p>Parametros quimicos</p>

                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label for=""class="col-md-5 control-label">Amonio(mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}} " readonly value="{{$m->amonio}}" name="amonio" id="amonio"  >
                                                </div>
                                            </div>

                                            <div class="form-group ">

                                                <label for=""class="col-md-5 control-label">Cloruros(mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}} " readonly value="{{$m->cloruro}}" name="cloruro" id="cloruro"  >
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-5 control-label">Nitrato (mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}} " readonly value="{{$m->nitrato}}" name="nitrato" id="nitrato"  >
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-5 control-label">Nitrito (mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}} " readonly value="{{$m->nitrito}}" name="nitrito" id="nitrito"  >
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for=""class="col-md-5 control-label">Cianuros (mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}} " readonly value="{{$m->cianuro}}" name="cianuro" id="cianuro"  >
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label for=""class="col-md-5 control-label">Calcio (mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="ca" id="ca" value="{{$m->ca}}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">

                                                <label for=""class="col-md-5 control-label">Magnesio (mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="mg" id="mg" value="{{$m->mg}}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-5 control-label">Sodio (mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="na" id="na" value="{{$m->na}}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-5 control-label">Potasio (mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="k" id="k" value="{{$m->k}}" readonly>
                                                </div>
                                            </div>

                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-5 control-label">Na + K (mg/l):</label>--}}
                                                {{--<div class="col-md-7">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="na_k" id="na_k" value="{{$m->na_k}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-5 control-label">CO3 (mg/l):</label>--}}
                                                {{--<div class="col-md-7">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="co2" id="co2" value="{{$m->co2}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        </div>
                                        {{--<div class="col-md-6">--}}
                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-3 control-label">CO3H (mg/l):</label>--}}
                                                {{--<div class="col-md-5">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="co2h" id="co2h" value="{{$m->co2h}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-3 control-label">Cl (mg/l):</label>--}}
                                                {{--<div class="col-md-5">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="ci" id="ci" value="{{$m->ci}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-3 control-label">(SO4)2- (mg/l):</label>--}}
                                                {{--<div class="col-md-5">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="so4" id="so4" value="{{$m->so4}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-3 control-label">Alcalinidad (mg/l) CaCO3:</label>--}}
                                                {{--<div class="col-md-5">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="alcalinidad" id="alcalinidad" value="{{$m->alcalinidad}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-3 control-label">Dureza total (mg/l) CaCO3:</label>--}}
                                                {{--<div class="col-md-5">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="dureza" id="dureza" value="{{$m->dureza}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                        {{--</div>--}}

                                    </div>
                                    <div id="nutrientes{{$m->id}}" class="tab-pane">
                                        <p>Nutrientes</p>
                                        <div class="col-md-4">
                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-5 control-label">SiO3 (mg/l):</label>--}}
                                                {{--<div class="col-md-7">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="sio3" id="sio3" value="{{$m->sio3}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="form-group ">--}}

                                                {{--<label for=""class="col-md-5 control-label">N-NO3- (mg/l):</label>--}}
                                                {{--<div class="col-md-7">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="nno3" id="nno3" value="{{$m->nno3}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-5 control-label">N-NO2- (mg/l):</label>--}}
                                                {{--<div class="col-md-7">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="nno2" id="nno2" value="{{$m->nno2}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-5 control-label">N-NH4+ (mg/l):</label>--}}
                                                {{--<div class="col-md-7">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="nnh4" id="nnh4" value="{{$m->nnh4}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            <div class="form-group ">
                                                <label for=""class="col-md-3 control-label">Nitrogeno total (mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="nt" id="nt" value="{{$m->nt}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for=""class="col-md-3 control-label">Boro (mg/l):</label>
                                                <div class="col-md-5">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="b" id="b" value="{{$m->b}}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-3 control-label">Fosfato total(mg/l):</label>
                                                <div class="col-md-5">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="p" id="p" value="{{$m->p}}" readonly>
                                                </div>
                                            </div>

                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-5 control-label">N-Kjeldall (mg/l):</label>--}}
                                                {{--<div class="col-md-7">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="kjendall" id="kjendall" value="{{$m->kjendall}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}



                                        </div>
                                        <div class="col-md-6">
                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-3 control-label">(PO4)3- (mg/l):</label>--}}
                                                {{--<div class="col-md-5">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="po4" id="po4" value="{{$m->po4}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-3 control-label">Pt (mg/l):</label>--}}
                                                {{--<div class="col-md-5">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="pt" id="pt" value="{{$m->pt}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-3 control-label">Si (mg/l):</label>--}}
                                                {{--<div class="col-md-5">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="si" id="si" value="{{$m->si}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}


                                        </div>
                                    </div>
                                    <div id="sanitarios{{$m->id}}" class="tab-pane">
                                        <p>Indicadores sanitarios Biologicos</p>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label for=""class="col-md-5 control-label">DBO5 (mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="dbo5" id="dbo5" value="{{$m->dbo5}}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">

                                                <label for=""class="col-md-5 control-label">DQO (mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="dqo" id="dqo" value="{{$m->dqo}}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-5 control-label">Coliformes fecales (NMP/100 ml):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="coli_feca" id="coli_feca" value="{{$m->coli_feca}}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-5 control-label">Coliformes totales (NMP/100 ml):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="coli_tot" id="coli_tot" value="{{$m->coli_tot}}" readonly>
                                                </div>
                                            </div>

                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-5 control-label">Salmonella spp (NMP/100 ml):</label>--}}
                                                {{--<div class="col-md-7">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="salmonella" id="salmonella" value="{{$m->salmonella}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}


                                        </div>
                                    </div>
                                    <div id="metales{{$m->id}}" class="tab-pane">
                                        <p>Metales y no Metales trazas</p>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label for=""class="col-md-5 control-label">Zinc (mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="zn" id="zn" value="{{$m->zn}}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">

                                                <label for=""class="col-md-5 control-label">Cadmio (mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="cd" id="cd" value="{{$m->cd}}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-5 control-label">Plomo (mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="pb" id="pb" value="{{$m->pb}}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-5 control-label">Hierro(mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="fe" id="fe" value="{{$m->fe}}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-5 control-label">Manganeso (mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="mn" id="mn" value="{{$m->mn}}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-5 control-label">Cobre (mg/l):</label>
                                                <div class="col-md-7">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="cu" id="cu" value="{{$m->cu}}" readonly>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label for=""class="col-md-3 control-label">Mercurio (mg/l):</label>
                                                <div class="col-md-5">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="hg" id="hg" value="{{$m->hg}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for=""class="col-md-3 control-label">Arsenico total (mg/l):</label>
                                                <div class="col-md-5">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="as" id="as" value="{{$m->as}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for=""class="col-md-3 control-label">Cromo hexavalente (mg/l):</label>
                                                <div class="col-md-5">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="cr" id="cr" value="{{$m->cr}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for=""class="col-md-3 control-label">Niquel (mg/l):</label>
                                                <div class="col-md-5">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="ni" id="ni" value="{{$m->ni}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for=""class="col-md-3 control-label">Antimonio (mg/l):</label>
                                                <div class="col-md-5">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="sb" id="sb" value="{{$m->sb}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for=""class="col-md-3 control-label">Selenio (mg/l):</label>
                                                <div class="col-md-5">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="se" id="se" value="{{$m->se}}" readonly>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <div class="botones{{$m->id}}" style="display:none">
                                    <input type="hidden" name="medicion_id" value="{{$m->id}}">
                                    <input type="hidden" name="remas_id" value="{{$m->id_remas}}">
                                    <button type="submit" class=" btn btn-success btn-lg">Guardar</button>
                                    <button type="button" id="{{$m->id}}" class="cancelar btn btn-default btn-lg">Cancelar</button>

                                </div>

                            </div>
                        </form>
                    </div>
                    @endforeach
                @else
            <h2 class="alert alert-primary">No existen mediciones</h2>
                @endif


            </div>
            </div>

    @endsection

@section('myscripts')
    <script>
        $(document).ready(function(){

            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                changeMonth: true,
                autoclose:true,
                numberOfMonths: 1,
                buttonImage: 'contact/calendar/calendar.gif',
                buttonImageOnly: true,
            });

              $('.editar').click(function(){

                 $id=$(this).prop('id');
                  $('.medicion'+$id).removeAttr('readonly');
                  $('.medicion'+$id).addClass('bg-primary');
                  $('.medicion'+$id+':first' ).focus();
                  $('.botones'+$id).fadeIn(300);


              });
            $('.cancelar').click(function() {

                $id = $(this).prop('id');
                $('.medicion'+$id).attr('readonly',true);
                $('.medicion'+$id).removeClass('bg-primary');
                $('.botones'+$id).fadeOut(300);

            });

        });
    </script>
    @stop
