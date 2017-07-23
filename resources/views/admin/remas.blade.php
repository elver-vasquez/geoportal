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
                        <table class=" table-striped" id="table">
                            <thead>
                            <tr class=" bg-tertiary">
                                <th class="col-md-6 ">Codigo</th>
                                <th>Pto</th>
                                <th>Pais</th>
                                <th>Nivel 3</th>
                                <th>Zona <br>Hidro <br>logica</th>
                                <th>Red</th>
                                <th>Nro Red</th>
                                <th>Nombre de Zona <br>Hidrologica TDPS</th>
                                <th>Coordenada Este</th>
                                <th>Coordenada Norte</th>
                                <th>Altura(msnm)</th>
                                <th>Depto</th>
                                <th>Nombre de Estacion</th>
                                <th>Crear</th>
                                <th>Editar</th>
                            </tr>
                            </thead>
                            <tbody>
                          @foreach($remas as $r)
                              <tr>
                                  <td  class=" text-primary"  style="font-size:9px;"><strong>{{$r->codigo}}</strong></td>
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
                                  <td class="col-md-6">{{$r->estacion}}</td>
                                  <td>
                                      <a href="{{url('admin/createmedicion')}}/{{$r->id}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>

                                  </td>
                                  <td >
                                      <a href="{{url('admin/campaniasrema')}}/{{$r->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
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
