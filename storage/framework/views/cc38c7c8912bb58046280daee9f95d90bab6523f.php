<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"><strong>ZONAS HIDROLOGICAS</strong>


                    </h4>


                    <a href="#myModal"  data-toggle="modal" class="btn  btn-success">Nuevo Registro</a>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Nuevo registro</h4>
                                </div>
                                <form  enctype="multipart/form-data" class="form-horizontal" action="<?php echo e(url('admin/zonashidrologicas/store')); ?>" method="post" id="form">
                                    <?php echo csrf_field(); ?>


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
                                            <label for="" class="control-label col-md-4">Archivo Remas(Kmz o Kml)</label>
                                            <div class="col-md-8">
                                                <input type="file" class="form-control" name="archivo_remas" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label col-md-4">Archivo Remfc(Kmz o Kml)</label>
                                            <div class="col-md-8">
                                                <input type="file" class="form-control" name="archivo_remfc" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label col-md-4">Archivo Remli(Kmz o Kml)</label>
                                            <div class="col-md-8">
                                                <input type="file" class="form-control" name="archivo_remli " value="">
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

                    <?php if(count($zonas_hidrologicas)>0): ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Mapa Remas</th>
                                <th>Mapa Remfc</th>
                                <th>Mapa Remli</th>
                                                                <th>Num Mpas KML/KM</th>
                                <th>Mapas KML/KMZ</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $zonas_hidrologicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e($row->codigo); ?></td>
                                    <td><?php echo e($row->nombre); ?></td>
                                    <td><?php echo e($row->archivo_remas); ?></td>
                                    <td><?php echo e($row->archivo_remfc); ?></td>
                                    <td><?php echo e($row->archivo_remli); ?></td>

                                    <td><?php echo e(count($row->puntos)); ?></td>
                                    <td>
                                        <a  title="Ver mapas" href="<?php echo e(url('admin/monitoreo/mapas_monitoreo')); ?>/<?php echo e($row->id); ?>" class="btn btn-sm btn-primary"><i class="fa fa-map-marker"></i> Ver Mapas</a>

                                    </td>
                                    <td>
                                        <a href="#modalEdit<?php echo e($row->id); ?>" data-toggle="modal" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>

                                        <a href="<?php echo e(url('admin/monitoreo/destroy')); ?>/<?php echo e($row->id); ?>" class="btn btn-sm btn-danger"><i class="fa fa-pencil"></i> Eliminar</a>
                                    </td>
                                </tr>
                                <div id="modalEdit<?php echo e($row->id); ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Nuevo registro</h4>
                                            </div>
                                            <form  enctype="multipart/form-data" class="form-horizontal" action="<?php echo e(url('admin/zonashidrologicas/update')); ?>" method="post" id="form">
                                                <?php echo csrf_field(); ?>

                                                <input type="hidden" name="id" value="<?php echo e($row->id); ?>">

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Codigo</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="codigo" value="<?php echo e($row->codigo); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Nombre</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="nombre" value="<?php echo e($row->nombre); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                            <label for="" class="control-label col-md-4">Archivo <strong>Remas</strong>(Kmz o Kml)</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="form-control" name="archivo_remas" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Archivo <strong>Remfc</strong>(Kmz o Kml)</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="form-control" name="archivo_remfc" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Archivo <strong>Remli</strong>(Kmz o Kml)</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="form-control" name="archivo_remli" value="">
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <h1  class="alert alert-info">No existen registros</h1>

                    <?php endif; ?>



                </div>

            </div>
        </div
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>