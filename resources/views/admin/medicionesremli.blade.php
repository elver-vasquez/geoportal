@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <a href="{{url('admin/createmedicion_remli')}}/{{$rema_id}}" class="btn btn-success btn-lg">Registrar Nueva Medicion Remli</a>

        </div>
        <div class="col-md-12 ">

            @if($mediciones->count()>0)

                @foreach($mediciones as $m)
                    <div class="panel panel-default">
                        <div class="panel panel-heading">
                            <h2><strong>Campaña:</strong>{{$m->campania}} /
                            <strong>Profundidad:</strong>{{$m->profundidad}}</h2>

                            <a href="###" class="editar btn btn-warning btn-lg " id="{{$m->id}}"><i class="fa fa-edit"></i> Editar</a>
                        </div>
                        <form  method="post" action="{{url('admin/medicionupdate_remli')}}" class="form form-horizontal ">
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
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control medicion{{$m->id}}" value="{{$m->cod_campania}}" readonly name="cod_campania" id="cod_campania">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Profundidad</label>
                                                <div class="col-md-2">
                                                    <select class="form-control medicion{{$m->id}}" value="{{$m->cod_campania}}" readonly name="profundidad" id="profundidad">
                                                        <option value="P1" @if($m->profundidad=='P1') selected @endif>P1</option>
                                                        <option value="P2" @if($m->profundidad=='P2') selected @endif>P2</option>
                                                        <option value="P3" @if($m->profundidad=='P3') selected @endif>P3</option>
                                                        <option value="P4" @if($m->profundidad=='P4') selected @endif>P4</option>
                                                        </select>
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
                                                    <input type="text" class="datepicker form-control medicion{{$m->id}}" name="fecha" id="fecha" value="@if($m->fecha){{$m->fecha}}@endif" readonly>
                                                </div>
                                            </div>


                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Hora H:m</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control medicion{{$m->id}}" placeholder="23h:23m" name="hora" id="hora" value="{{$m->hora}}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for=""class="col-md-2 control-label">Prof. (m)</label>
                                                <div class="col-md-2">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="prof" id="prof" value="{{$m->prof}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="recent{{$m->id}}" class="tab-pane ">
                                            <p>Parametros fisicos</p>

                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">PH:</label>
                                                <div class="col-md-2">
                                                    <input type="number"  step="0.001" class="form-control medicion{{$m->id}}" name="ph" id="ph" value="{{$m->ph}}" readonly>
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
                                                <label for=""class="col-md-2 control-label">Color:</label>
                                                <div class="col-md-2">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="color" id="color" value="{{$m->color}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Solidos suspendidos(mg/l):</label>
                                                <div class="col-md-2">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="sst" id="sst" value="{{$m->sst}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Solidos suspendidos totales(mg/l):</label>
                                                <div class="col-md-2">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="sdt" id="sdt" value="{{$m->sdt}}" readonly>
                                                </div>
                                            </div>

                                            {{--<div class="form-group ">--}}
                                                {{--<label for=""class="col-md-2 control-label">Disco Sechi</label>--}}
                                                {{--<div class="col-md-2">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="disco" id="disco" value="{{$m->disco}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}



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

                                                <label for=""class="col-md-2 control-label">Oxido disueltoD(mg/l):</label>
                                                <div class="col-md-2">
                                                    <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="od" id="od" value="{{$m->od}}" readonly>
                                                </div>
                                            </div>
                                            {{--<div class="form-group ">--}}

                                                {{--<label for=""class="col-md-2 control-label">OD Saturado (mg/l):</label>--}}
                                                {{--<div class="col-md-2">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="od_satu" id="od_satu" value="{{$m->od_satu}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group ">--}}

                                                {{--<label for=""class="col-md-2 control-label">Saturación (%):</label>--}}
                                                {{--<div class="col-md-2">--}}
                                                    {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="satu" id="satu" value="{{$m->satu}}" readonly>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Sulfatos(mg/l):</label>
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
                                                    <label for=""class="col-md-5 control-label">sodio (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="na" id="na" value="{{$m->na}}" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Potasio(mg/l):</label>
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
                                                    <label for=""class="col-md-6 control-label">Nitrogeno total (mg/l):</label>
                                                    <div class="col-md-5">
                                                        <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="nt" id="nt" value="{{$m->nt}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for=""class="col-md-6 control-label">fosfato total (mg/l):</label>
                                                    <div class="col-md-5">
                                                        <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="p" id="p" value="{{$m->p}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for=""class="col-md-6 control-label">Boro (mg/l):</label>
                                                    <div class="col-md-5">
                                                        <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="b" id="b" value="{{$m->b}}" readonly>
                                                    </div>
                                                </div>
                                                {{--<div class="form-group ">--}}
                                                    {{--<label for=""class="col-md-5 control-label">N-Kjeldall (mg/l):</label>--}}
                                                    {{--<div class="col-md-7">--}}
                                                        {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="kjendall" id="kjendall" value="{{$m->kjendall}}" readonly>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}



                                            </div>
                                            {{--<div class="col-md-6">--}}
                                                {{--<div class="form-group ">--}}
                                                    {{--<label for=""class="col-md-3 control-label">(PO4)3- (mg/l):</label>--}}
                                                    {{--<div class="col-md-5">--}}
                                                        {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="po4" id="po4" value="{{$m->po4}}" readonly>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                               {{----}}
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
                                               {{----}}

                                            {{--</div>--}}
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

                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Bacterias colif. Termorresistentes</label>
                                                    <div class="col-md-7">
                                                        <input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="salmonella" id="salmonella" value="{{$m->salmonella}}" readonly>
                                                    </div>
                                                </div>



                                            </div>
                                            {{--<div class="col-md-6">--}}
                                                {{--<div class="form-group ">--}}
                                                    {{--<label for=""class="col-md-5 control-label">Clorofila A (mg/m3):</label>--}}
                                                    {{--<div class="col-md-7">--}}
                                                        {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="clorofilla" id="clorofilla" value="{{$m->clorofilla}}" readonly>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group ">--}}
                                                    {{--<label for=""class="col-md-5 control-label">Conteo de algas:</label>--}}
                                                    {{--<div class="col-md-7">--}}
                                                        {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="cont_algas" id="cont_algas" value="{{$m->cont_algas}}" readonly>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group ">--}}
                                                    {{--<label for=""class="col-md-5 control-label">Conteo zooplancton:</label>--}}
                                                    {{--<div class="col-md-7">--}}
                                                        {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="cont_plancton" id="cont_plancton" value="{{$m->cont_plancton}}" readonly>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group ">--}}
                                                    {{--<label for=""class="col-md-5 control-label">Conteo bentos:</label>--}}
                                                    {{--<div class="col-md-7">--}}
                                                        {{--<input type="number" step="0.001" class="form-control medicion{{$m->id}}" name="cont_bentos" id="cont_bentos" value="{{$m->cont_bentos}}" readonly>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                {{--</div>--}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="botones{{$m->id}}" style="display:none">
                                    <input type="hidden" name="medicion_id" value="{{$m->id}}">
                                    <input type="hidden" name="remli_id" value="{{$m->id_remli}}">
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
