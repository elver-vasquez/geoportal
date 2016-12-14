<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"><strong>MAPAS  SUBCUENCAS - <?php echo e($monitoreo->codigo); ?><?php echo e($monitoreo->nombre); ?></strong></h4>
                    <a href="<?php echo e(url('/admin/cuencas/subcuencas')); ?>/<?php echo e($monitoreo->tdps->id); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Regresar a Subcuencas</a>
                    <a href="#myModal"  data-toggle="modal" class="btn  btn-success">Nuevo Registro</a>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Nuevo registro Mapa</h4>
                                </div>
                                <form  enctype="multipart/form-data" class="form-horizontal" action="<?php echo e(url('admin/subcuencas/mapas_subcuencas/store')); ?>" method="post" id="form">
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="monitoreo_id" value="<?php echo e($monitoreo->id); ?>">

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

                    <?php if(count($monitoreo->puntos)>0): ?>
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
                            <?php $__currentLoopData = $monitoreo->puntos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>

                                    <td><?php echo e($row->nombre); ?></td>
                                    <td><?php echo e($row->descripcion); ?></td>
                                    <td><a href="<?php echo e(url('admin/subcuencas/mapas_subcuencas/download')); ?>/<?php echo e($row->id); ?>"><i class="fa fa-download"></i> <?php echo e($row->archivo); ?></a></td>

                                    <td>
                                        <a href="#modalEdit<?php echo e($row->id); ?>" data-toggle="modal" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>

                                        <a href="<?php echo e(url('admin/subcuencas/mapas_subcuencas/destroy')); ?>/<?php echo e($row->id); ?>" class="btn btn-sm btn-danger"><i class="fa fa-pencil"></i> Eliminar</a>
                                    </td>
                                </tr>

                                <div id="modalEdit<?php echo e($row->id); ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Editar registro Mapa</h4>
                                            </div>
                                                <form  enctype="multipart/form-data" class="form-horizontal" action="<?php echo e(url('admin/subcuencas/mapas_subcuencas/update')); ?>" method="post" id="form">
                                                <?php echo csrf_field(); ?>

                                                <input type="hidden" name="id" value="<?php echo e($row->id); ?>">

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Nombre</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="nombre" value="<?php echo e($row->nombre); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Archivo Kml/Kmz</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="form-control" name="archivo" value="<?php echo e($row->archivo); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Descripcion</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="descripcion" value="<?php echo e($row->descripcion); ?>">
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
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>