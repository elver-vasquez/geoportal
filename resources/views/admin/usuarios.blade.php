@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"><strong>USUARIOS</strong>


                    </h4>
                    <a href="#myModal"  data-toggle="modal" class="btn  btn-success">Nuevo Usuario</a>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Nuevo Usuario</h4>
                                </div>
                                <form  enctype="multipart/form-data" class="form-horizontal" action="{{url('admin/usuarios/store')}}" method="post" id="form">
                                    {!! csrf_field() !!}

                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="" class="control-label col-md-4">Nombre</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label col-md-4">email</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label col-md-4">contraseña</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="password">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="control-label col-md-4">Rol de usuario</label>
                                            <div class="col-md-8">
                                                <select name="role" id="role" class="form-control">
                                                    <option value="moni">Monitoreo</option>
                                                    <option value="mapas">Administrador mapas</option>
                                                </select>                                            </div>
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

                    @if(count($usuarios)>0)
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>

                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usuarios as $row)
                                <tr>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>
                                        @if($row->rol=='moni')
                                        Monitoreo
                                            @endif
                                            @if($row->rol=='mapas')
                                                Administrador Mapas
                                            @endif


                                    </td>

                                    <td>
                                        <a href="#modalEdit{{$row->id}}"  data-toggle="modal" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
                                        <a href="{{url('admin/usuarios/destroy')}}/{{$row->id}}"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> borrar</a>

                                    </td>
                                </tr>
                                <div id="modalEdit{{$row->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Editar registro</h4>
                                            </div>
                                            <form  enctype="multipart/form-data" class="form-horizontal" action="{{url('admin/usuarios/update')}}" method="post" id="form">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="id" value="{{$row->id}}">

                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Nombre</label>
                                                        <div class="col-md-8">
                                                            <input type="text" value="{{$row->name}}" class="form-control" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">email</label>
                                                        <div class="col-md-8">
                                                            <input type="text" value="{{$row->email}}" class="form-control" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">contraseña</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Rol de usuario</label>
                                                        <div class="col-md-8">
                                                            <select name="role" id="role" class="form-control">
                                                                <option value="moni" @if(Auth::user()->rol=='moni') selected @endif>Monitoreo</option>
                                                                <option value="mapas" @if(Auth::user()->rol=='mapas') selected @endif>Administrador mapas</option>
                                                            </select>                                            </div>
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

