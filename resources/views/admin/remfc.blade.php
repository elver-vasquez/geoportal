@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"><strong>RED DE ESTACIONES DE MONITOREO
                            DE AGUAS CONTAMINANTES REMFC</strong>
                    </h4>
                </div>

                <div class="panel-body">
                    @if($remas->count()>0)
                        <table class="table table-responsive table-striped">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Pto</th>
                                <th>Pais</th>
                                <th>Nivel 3</th>
                                <th>Zona <br>Hidrologica</th>
                                <th>Red</th>
                                <th>Nro Red</th>
                                <th>Nombre de Zona <br>Hidrologica TDPS</th>
                                <th>Coordenada Este</th>
                                <th>Coordenada Norte</th>
                                <th>Altura(msnm)</th>
                                <th>Departamento</th>
                                <th>Nombre de Estacion</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($remas as $r)
                                <tr>
                                    <td class="col-md-2 text-primary"><strong>{{$r->codigo}}</strong></td>
                                    <td>{{$r->pto}}</td>
                                    <td>{{$r->pais}}</td>
                                    <td>{{$r->nivel3}}</td>
                                    <td>{{$r->zona_hidrologica}}</td>
                                    <td>{{$r->red}}</td>
                                    <td>{{$r->nro_red}}</td>
                                    <td>{{$r->nombre_hidrologica}}</td>
                                    <td>{{$r->coor_este}}</td>
                                    <td>{{$r->coor_oeste}}</td>
                                    <td>{{$r->altura}}</td>
                                    <td>{{$r->dpto}}</td>
                                    <td>{{$r->estacion}}</td>
                                    <td class="col-md-4">
{{--                                        <a href="{{url('admin/verdetallerema')}}/{{$r->id}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>--}}
                                        <a href="{{url('admin/campanias_remfc')}}/{{$r->id}}" class="btn btn-primary btn-sm"><i class="fa fa-rebel"></i></a>
                                        <a href="{{url('admin/createmedicion_remfc')}}/{{$r->id}}" class="btn btn-success btn-sm"><i class="fa fa-save"></i></a>

                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    @else
                        <h2 class="alert alert-primary"> No existen rem,as registradas</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
