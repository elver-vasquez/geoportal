@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"><strong>TDPS</strong>

                    </h4>
                    <a href="#myModal"  data-toggle="modal" class="btn  btn-success">Nuevo Registro</a>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Nuevo registro</h4>
                                </div>
                                <form  enctype="multipart/form-data" class="form-horizontal" action="{{url('admin/tdps/store')}}" method="post" id="form">
                                    {!! csrf_field() !!}

                                <div class="modal-body">

                                        <div class="form-group">
                                            <label for="" class="control-label col-md-4">Nombre</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="nombre">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label col-md-4">Archivo (Kmz o Kml)</label>
                                            <div class="col-md-8">
                                                <input type="file" class="form-control" name="archivo">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label col-md-4">Descripcion</label>
                                            <div class="col-md-6">
                                                <textarea name="descripcion" id="descripcion"  class="form-control" cols="5" rows="5"></textarea>
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

                    @if(count($tdps)>0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Archivo</th>
                                <th>Descripcion</th>
                                <th>Zonas hidrologicas</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tdps as $row)
                            <tr>
                               <td>{{$row->nombre}}</td>
                               <td><a href="{{url('admin/tdps/download')}}">{{$row->archivo}}</a></td>
                               <td>{{$row->descripcion}}</td>
                                <td>
                                    @if($row->tipo=='tdps')
                                    <a href="{{url('admin/zonashidrologicas')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrows"></i>Zonas hidrologicas</a>
                                        @endif

                                </td>
                                <td>
                                   <a href="#modalEdit{{$row->id}}"  data-toggle="modal" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>

{{--                                   <a href="{{url('admin/tdps/destroy')}}/{{$row->id}}" class="btn btn-sm btn-danger"><i class="fa fa-pencil"></i> Eliminar</a>--}}
                               </td>
                            </tr>
                            <div id="modalEdit{{$row->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Editar registro</h4>
                                        </div>
                                        <form  enctype="multipart/form-data" class="form-horizontal" action="{{url('admin/tdps/update')}}" method="post" id="form">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="id" id="id"  value="{{$row->id}}">

                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="" class="control-label col-md-4">Nombre</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="nombre" value="{{$row->nombre}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="control-label col-md-4">Archivo (Kmz o Kml)</label>
                                                    <div class="col-md-8">
                                                        <input type="file" class="form-control" name="archivo" value="{{$row->archivo}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="control-label col-md-4">Descripcion</label>
                                                    <div class="col-md-6">
                                                        <textarea name="descripcion" id="descripcion"  class="form-control" cols="5" rows="5">{{$row->descripcion}}</textarea>
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

