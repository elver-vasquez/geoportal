@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"><strong>MAPAS  SUBCUENCA {{$subcuenca->nombre}}  </strong></h4>
                    <a href="{{url('/admin/cuencacoipasa/escala50000')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Regresar Subcuencas Coipasa 1:50000</a>
                    <a href="#myModal"  data-toggle="modal" class="btn  btn-success">Nuevo Registro</a>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Nuevo registro Mapa</h4>
                                </div>
                                <form  enctype="multipart/form-data" class="form-horizontal" action="{{url('admin/mapaspuntos/store')}}" method="post" id="form">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="monitoreo_id" value="{{$subcuenca->id}}">

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="" class="control-label col-md-4">Nombre</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="nombre">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label col-md-4">Archivo Kml/Kmz</label>
                                            <div class="col-md-8">
                                                <input type="file" class="form-control" name="archivo">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label col-md-4">Descripcion</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="descripcion">
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

                    @if(count($subcuenca->puntos)>0)
                        <table class="table">
                            <thead>
                            <tr>

                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Archivo</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subcuenca->puntos as $row)
                                <tr>

                                    <td>{{$row->nombre}}</td>
                                    <td>{{$row->descripcion}}</td>
                                    <td><a href="{{url('admin/mapaspuntos/download')}}/{{$row->id}}"></a>{{$row->archivo}}</td>

                                    <td>
                                        <a href="#modalEdit{{$row->id}}" data-toggle="modal" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>

                                        <a href="{{url('admin/mapaspuntos/destroy')}}/{{$row->id}}" class="btn btn-sm btn-danger"><i class="fa fa-pencil"></i> Eliminar</a>
                                    </td>
                                </tr>

                                <div id="modalEdit{{$row->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Editar registro Mapa</h4>
                                            </div>
                                            <form  enctype="multipart/form-data" class="form-horizontal" action="{{url('admin/cuencacoipasa/escala50000/update')}}" method="post" id="form">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="id" value="{{$row->id}}">

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Nombre</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="nombre" value="{{$row->nombre}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Archivo Kml/Kmz</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="form-control" name="archivo" value="{{$row->archivo}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Descripcion</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="descripcion" value="{{$row->descripcion}}">
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

