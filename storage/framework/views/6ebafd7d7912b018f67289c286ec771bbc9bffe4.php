<?php $__env->startSection('content'); ?>
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
                                <form  enctype="multipart/form-data" class="form-horizontal" action="<?php echo e(url('admin/usuarios/store')); ?>" method="post" id="form">
                                    <?php echo csrf_field(); ?>


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

                    <?php if(count($usuarios)>0): ?>
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
                            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e($row->name); ?></td>
                                    <td><?php echo e($row->email); ?></td>
                                    <td>
                                        <?php if($row->rol=='moni'): ?>
                                        Monitoreo
                                            <?php endif; ?>
                                            <?php if($row->rol=='mapas'): ?>
                                                Administrador Mapas
                                            <?php endif; ?>


                                    </td>

                                    <td>
                                        <a href="#modalEdit<?php echo e($row->id); ?>"  data-toggle="modal" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
                                        <a href="<?php echo e(url('admin/usuarios/destroy')); ?>/<?php echo e($row->id); ?>"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> borrar</a>

                                    </td>
                                </tr>
                                <div id="modalEdit<?php echo e($row->id); ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Editar registro</h4>
                                            </div>
                                            <form  enctype="multipart/form-data" class="form-horizontal" action="<?php echo e(url('admin/usuarios/update')); ?>" method="post" id="form">
                                                <?php echo csrf_field(); ?>

                                                <input type="hidden" name="id" value="<?php echo e($row->id); ?>">

                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">Nombre</label>
                                                        <div class="col-md-8">
                                                            <input type="text" value="<?php echo e($row->name); ?>" class="form-control" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-4">email</label>
                                                        <div class="col-md-8">
                                                            <input type="text" value="<?php echo e($row->email); ?>" class="form-control" name="email">
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
                                                                <option value="moni" <?php if(Auth::user()->rol=='moni'): ?> selected <?php endif; ?>>Monitoreo</option>
                                                                <option value="mapas" <?php if(Auth::user()->rol=='mapas'): ?> selected <?php endif; ?>>Administrador mapas</option>
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