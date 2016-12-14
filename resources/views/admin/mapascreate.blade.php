@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"><strong>MAPAS</strong></h4>

                </div>
                <div class="panel-body">
                    <form  class="form-horizontal" action="{{url('admin/tdps/store')}}" method="post" id="form">

                        <div class="form-group">
                            <label for="" class="control-label col-md-2">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label col-md-2">Depende de</label>
                            <div class="col-md-6">
                               select()
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label col-md-2">Archivo (Kmz o Kml)</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="archivo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label col-md-2">Descripcion</label>
                            <div class="col-md-6">
                                <textarea name="descripcion" id="descripcion"  class="form-control" cols="5" rows="5"></textarea>
                            </div>
                        </div>
                    </form>

                </div>
                </div>
        </div>
    </div>
    @stop


