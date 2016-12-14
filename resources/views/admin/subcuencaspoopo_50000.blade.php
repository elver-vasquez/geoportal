@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"><strong>SUBCUENCAS POOPO  ESCALA 1:50000</strong>


                    </h4>
                    <a href="{{url('/admin/cuencas')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Regresar a Cuenca Poopo</a>
                    <a href="#myModal"  data-toggle="modal" class="btn  btn-success">Nuevo Registro</a>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Nuevo registro</h4>
                                </div>
                                <form  enctype="multipart/form-data" class="form-horizontal" action="{{url('admin/cuencapoopo/storesubcuencas')}}" method="post" id="form">
                                    {!! csrf_field() !!}

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="" class="control-label col-md-4">Codigo</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="codigo">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label col-md-4">Nombre</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="nombre">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label col-md-4">Archivo (Kmz o Kml)</label>
                                            <div class="col-md-8">
                                                <input type="file" class="form-control" name="archivo" value="">
                                            </div>
                                        </div>




                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button  type="submit" class="btn btn-success">Guardar</button>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="panel-body">

                    @if(count($subcuencas)>0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Mapa</th>
                                <th>Num Mpas KML/KM</th>
                                <th>Mapas KML/KMZ</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subcuencas as $row)
                                <tr>
                                    <td>{{$row->codigo}}</td>
                                    <td>{{$row->nombre}}</td>
                                    <td>{{$row->archivo}}</td>
                                    <td>{{count($row->puntos)}}</td>
                                    <td>
                                        <a  title="Ver mapas" href="{{url('admin/cuencapoopo/mapas50000')}}/{{$row->id}}" class="btn btn-sm btn-primary"><i class="fa fa-map-marker"></i> Ver Mapas</a>

                                    </td>
                                    <td>
                                        <a href="#modalEdit{{$row->id}}" data-toggle="modal" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>

                                        <a href="{{url('admin/monitoreo/destroy')}}/{{$row->id}}" class="btn btn-sm btn-danger"><i class="fa fa-pencil"></i> Eliminar</a>
                                    </td>
                                </tr>
                                <div id="modalEdit{{$row->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Nuevo registro</h4>
                                            </div>
                                            <form  enctype="multipart/form-data" class="form-horizontal" action="{{url('admin/zonashidrologicas/update')}}" method="post" id="form">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="id" value="{{$row->id}}">

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Codigo</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="codigo" value="{{$row->codigo}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Nombre</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="nombre" value="{{$row->nombre}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Archivo (Kmz o Kml)</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="form-control" name="archivo" value="">
                                                        </div>
                                                    </div>




                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button  type="submit" class="btn btn-success">Guardar</button>

                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h1  class="alert alert-info">No existen registros</h1>

                    @endif



                </div>

            </div>
        </div>
    </div>
@stop

