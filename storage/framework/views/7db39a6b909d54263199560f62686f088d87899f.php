<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"><strong>RED DE ESTACIONES DE MONITOREO
                            DE AGUAS CONTAMINANTES REMFC</strong>
                    </h4>
                </div>

                <div class="panel-body">
                    <?php if($remas->count()>0): ?>
                        <table class=" table-striped" id="table">
                            <thead>
                            <tr class="bg-tertiary">
                                <th >Codigo</th>
                                <th>Pto</th>
                                <th>Pais</th>
                                <th>Nivel 3</th>
                                <th>Zona <br>Hidro  <BR> logica</th>
                                <th>Red</th>
                                <th>Nro Red</th>
                                <th>Nombre de Zona <br>Hidrologica TDPS</th>
                                <th>Coord <BR> Este</th>
                                <th>Coord  <BR>Norte</th>
                                <th>Altura <BR>(msnm)</th>
                                <th>Departa  <BR>mento</th>
                                <th>Nombre de Estacion</th>
                                <th>Crear</th>
                                <th>Editar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $remas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td  style="font-size: 9px" class=" col-md-3 text-primary"><strong><?php echo e($r->codigo); ?></strong></td>
                                    <td><?php echo e($r->pto); ?></td>
                                    <td><?php echo e($r->pais); ?></td>
                                    <td><?php echo e($r->nivel3); ?></td>
                                    <td ><?php echo e($r->zona_hidrologica); ?></td>
                                    <td><?php echo e($r->red); ?></td>
                                    <td><?php echo e($r->nro_red); ?></td>
                                    <td class="col-md-4"><?php echo e($r->nombre_hidrologica); ?></td>
                                    <td><?php echo e($r->coor_este); ?></td>
                                    <td><?php echo e($r->coor_oeste); ?></td>
                                    <td><?php echo e($r->altura); ?></td>
                                    <td><?php echo e($r->dpto); ?></td>
                                    <td class="col-md-4"><?php echo e($r->estacion); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('admin/createmedicion_remfc')); ?>/<?php echo e($r->id); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>

                                    </td>
                                    <td>

                                        <a href="<?php echo e(url('admin/campanias_remfc')); ?>/<?php echo e($r->id); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                            </tbody>
                        </table>
                    <?php else: ?>
                        <h2 class="alert alert-primary"> No existen rem,as registradas</h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscripts'); ?>
    <script>
        $(document).ready(function(){
            $('#table').dataTable({

                "order": [[2, "desc"]],
                "iDisplayLength": -1,

            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>