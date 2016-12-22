@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"><strong>Mi Cuenta</strong>


                    </h4>
                </div>

                <div class="panel-body">

                    <form  enctype="multipart/form-data" class="form-horizontal" action="{{url('admin/usuarios/micuenta')}}" method="post" id="form">
                        {!! csrf_field() !!}
                        <input type="hidden"  name="id" value="{{$user->id}}">

                        <div class="modal-body">

                            <div class="form-group">
                                <label for="" class="control-label col-md-4">Nombre</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{$user->name}}" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""   class="control-label col-md-4">email</label>
                                <div class="col-md-8">
                                    <input type="text"  value="{{$user->email}}" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-4">contraseña</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="password">
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
@stop

