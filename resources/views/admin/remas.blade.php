@extends('layouts.admin')

@section('content')
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="text-center"><strong>RED DE ESTACIONES DE MONITOREO
                            DE AGUAS SUPERFICIALES</strong>
                        </h4>
                        <a href="{{url('admin/remas/exportar')}}" class="btn   btn-success"><i class="fa fa-file-excel-o"> </i> Exportar los registros  a Excel</a>
                    </div>

                    <div class="panel-body">
                        @if($remas->count()>0)
                        <table class="" id="table">
                            <thead>
                            <tr>
                                <th class="col-md-6 ">Codigo</th>
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
                                  <td class=" text-primary"  style="font-size:10px;"><strong>{{$r->codigo}}</strong></td>
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
                                      <a href="{{url('admin/campaniasrema')}}/{{$r->id}}" class="btn btn-primary btn-xs"><i class="fa fa-rebel"></i></a>
                                      <a href="{{url('admin/createmedicion')}}/{{$r->id}}" class="btn btn-success btn-xs"><i class="fa fa-save"></i></a>
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
@section('myscripts')
    <script>
        $(document).ready(function(){
            $('#table').dataTable({

                "order": [[2, "desc"]],
                "iDisplayLength": -1,

            });
        });
    </script>
    @stop
