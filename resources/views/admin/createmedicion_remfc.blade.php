@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h2><strong>Registrar Nueva Medicion Remfc</strong></h2>
                <ul class="list-inline">
                    <li><h4><strong>Codigo:</strong>{{$rema->codigo}}</h4></li>
                    <li><h4><strong>Nombre:</strong>{{$rema->nombre_hidrologica}}</h4></li>
                    <li><h4><strong>Estacion:</strong>{{$rema->estacion}}</h4></li>
                    <li><h4><strong>dpto:</strong>{{$rema->dpto}}</h4></li>
                </ul>

            </div>
            <form  method="post" action="{{url('admin/medicionstore_remfc')}}" class="form form-horizontal ">
                {!! csrf_field() !!}
                <div class="panel panel-body">
                    <div class="tabs">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#popular" data-toggle="tab"><i class="fa fa-star"></i> Generales</a>
                            </li>
                            <li >
                                <a href="#recent" data-toggle="tab" style="background-color:#01a0e4" >Parametros fisicos</a>
                            </li>
                            <li>
                                <a href="#gases" data-toggle="tab" style="background-color:#8f9d6a">Gases</a>
                            </li>
                            <li>
                                <a href="#quimicos" data-toggle="tab" style="background-color:#D8FA3C">Parametros Quimicos</a>
                            </li>
                            <li>
                                <a href="#nutrientes" data-toggle="tab" style="background-color:#86cb86">Nutrientes</a>
                            </li>
                            <li>
                                <a href="#sanitarios" data-toggle="tab" style="background-color:#DE8E30">Indicadores sanitarios Biologicos</a>
                            </li>
                            <li>
                                <a href="#metales" data-toggle="tab" style="background-color:#74b2e2 ">Metales y no Metales trazas</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="popular" class="tab-pane active">
                                <p>Generales</p>


                                <div class="form-group ">
                                    <label for=""class=" col-md-2 control-label">Campaña</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control "   name="campania" id="campania">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Codigo Campaña</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control "   name="cod_campania" id="cod_campania">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Laboratorio responsable</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control "   name="laboratorio" id="laboratorio">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Fecha d/m/A</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control " name="fecha" id="fecha"  >
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Hora H:m</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control " name="hora" id="hora"  >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for=""class="col-md-2 control-label">Caudal m3/s</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control " name="caudal" id="caudal"  >
                                    </div>
                                </div>
                            </div>





                            <div id="recent" class="tab-pane ">
                                <p>Parametros fisicos</p>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">PH:</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="ph" id="ph"  >
                                    </div>
                                </div>

                                <div class="form-group ">

                                    <label for=""class="col-md-2 control-label">CEV (uS/cm):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="ce" id="ce"  >
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">T (°C):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="temperatura" id="temperatura"  >
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Aceites y grasas (mg/l)</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="aceites" id="aceites" >
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">TURBIEDAD(NTU):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="turbiedad" id="turbiedad"  >
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">SDT(mg/l):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="sdt" id="sdt"  >
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">SST(mg/l):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="sst" id="sst"  >
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Color:</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="color" id="color"  >
                                    </div>
                                </div>

                            </div>
                            <div id="gases" class="tab-pane">
                                <p>Gases</p>
                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">CO2(mg/l):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="co" id="co"  >
                                    </div>
                                </div>

                                <div class="form-group ">

                                    <label for=""class="col-md-2 control-label">OD(mg/l):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="od" id="od"  >
                                    </div>
                                </div>

                                <div class="form-group ">

                                    <label for=""class="col-md-2 control-label">OD Saturado (mg/l):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="od_satu" id="od_satu" >
                                    </div>
                                </div>
                                <div class="form-group ">

                                    <label for=""class="col-md-2 control-label">Saturación (%):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="saturacion" id="saturacion" >
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">HS2(mg/l):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="hs" id="hs"  >
                                    </div>
                                </div>


                            </div>
                            <div id="quimicos" class="tab-pane">
                                <p>Parametros quimicos</p>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Ca (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="ca" id="ca"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">

                                        <label for=""class="col-md-5 control-label">Mg (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="mg" id="mg"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Na (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="na" id="na"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">K (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="k" id="k"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Na + K (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="na_k" id="na_k"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">CO3 (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="co2" id="co2"  >
                                        </div>
                                    </div>



                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">CO3H (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="co2h" id="co2h"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">Cl (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="ci" id="ci"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">(SO4)2- (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="so4" id="so4"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">Alcalinidad (mg/l) CaCO3:</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="alcalinidad" id="alcalinidad"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">Dureza total (mg/l) CaCO3:</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="dureza" id="dureza"  >
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div id="nutrientes" class="tab-pane">
                                <p>Nutrientes</p>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">SiO3 (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="sio3" id="sio3"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">

                                        <label for=""class="col-md-5 control-label">N-NO3- (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="nno3" id="nno3"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">N-NO2- (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="nno2" id="nno2"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">N-NH4+ (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="nnh4" id="nnh4"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Nt (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="nt" id="nt"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">N-Kjeldall (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="kjendall" id="kjendall"  >
                                        </div>
                                    </div>



                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">(PO4)3- (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="po4" id="po4"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">P (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="p" id="p"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">Pt (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="pt" id="pt"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">Si (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="si" id="si"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">B (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="b" id="b"  >
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div id="sanitarios" class="tab-pane">
                                <p>Indicadores sanitarios Biologicos</p>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">DBO5 (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="dbo5" id="dbo5"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">

                                        <label for=""class="col-md-5 control-label">DQO (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="dqo" id="dqo"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Coliformes fecales (NMP/100 ml):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="coli_feca" id="coli_feca"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Coliformes totales (NMP/100 ml):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="coli_tot" id="coli_tot"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Salmonella spp (NMP/100 ml):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="salmonella" id="salmonella"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Bacterias colif. termorresistentes UFC/100 ml:</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="bact_coli" id="bact_coli">
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div id="metales" class="tab-pane">
                                <p>Metales y no Metales trazas</p>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Zn (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="zn" id="zn"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">

                                        <label for=""class="col-md-5 control-label">Cd (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="cd" id="cd"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Pb (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="pb" id="pb"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Fe (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="fe" id="fe"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Mn (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="mn" id="mn"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Cu (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="cu" id="cu"  >
                                        </div>
                                    </div>



                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">Hg (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="hg" id="hg"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">As (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="as" id="as"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">Cr (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="cr" id="cr"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">Ni (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="ni" id="ni"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">Sb (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="sb" id="sb"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">Se (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="se" id="se"  >
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div >
                        <input type="hidden" name="id_remfc" value="{{$rema->id}}" >
                        <button type="submit" class=" btn btn-success btn-lg">Guardar</button>
                        <a href="{{url('admin/remfc')}}" type="button" id="" class="cancelar btn btn-default btn-lg">Cancelar</a>

                    </div>

                </div>
            </form>
        </div>
    </div>
@stop
@section('myscripts')
    <script>
        $(document).ready(function(){
            $('#fecha').datepicker({
                dateFormat: 'dd/mm/yy',
                changeMonth: true,
                numberOfMonths: 1,
                buttonImage: 'contact/calendar/calendar.gif',
                buttonImageOnly: true,
            });
        });
    </script>
@stop