<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <a href="<?php echo e(url('admin/createmedicion_remfc')); ?>/<?php echo e($rema_id); ?>" class="btn btn-success btn-lg">Registrar Nueva Medicion Remfc</a>

        </div>
        <div class="col-md-12 ">

            <?php if($mediciones->count()>0): ?>

                <?php $__currentLoopData = $mediciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="panel panel-default">
                        <div class="panel panel-heading">
                            <h2><strong>Campaña:</strong><?php echo e($m->campania); ?></h2>
                            <a href="###" class="editar btn btn-warning btn-lg " id="<?php echo e($m->id); ?>"><i class="fa fa-edit"></i> Editar</a>
                        </div>
                        <form  method="post" action="<?php echo e(url('admin/medicionupdate_remfc')); ?>" class="form form-horizontal ">
                            <?php echo csrf_field(); ?>

                            <div class="panel panel-body">
                                <div class="tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#popular<?php echo e($m->id); ?>" data-toggle="tab"><i class="fa fa-star"></i> Generales</a>
                                        </li>
                                        <li >
                                            <a href="#recent<?php echo e($m->id); ?>" data-toggle="tab" style="background-color:#01a0e4" >Parametros fisicos</a>
                                        </li>
                                        <li>
                                            <a href="#gases<?php echo e($m->id); ?>" data-toggle="tab" style="background-color:#8f9d6a">Gases</a>
                                        </li>
                                        <li>
                                            <a href="#quimicos<?php echo e($m->id); ?>" data-toggle="tab" style="background-color:#D8FA3C">Parametros Quimicos</a>
                                        </li>
                                        <li>
                                            <a href="#nutrientes<?php echo e($m->id); ?>" data-toggle="tab" style="background-color:#86cb86">Nutrientes</a>
                                        </li>
                                        <li>
                                            <a href="#sanitarios<?php echo e($m->id); ?>" data-toggle="tab" style="background-color:#DE8E30">Indicadores sanitarios Biologicos</a>
                                        </li>
                                        <li>
                                            <a href="#metales<?php echo e($m->id); ?>" data-toggle="tab" style="background-color:#74b2e2 ">Metales y no Metales trazas</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="popular" class="tab-pane active">
                                            <p>Generales</p>


                                            <div class="form-group ">
                                                <label for=""class=" col-md-2 control-label">Campaña</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control medicion<?php echo e($m->id); ?>" value="<?php echo e($m->campania); ?>" readonly name="campania" id="campania">
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Codigo Campaña</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control medicion<?php echo e($m->id); ?>" value="<?php echo e($m->cod_campania); ?>" readonly name="cod_campania" id="cod_campania">
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Laboratorio responsable</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control medicion<?php echo e($m->id); ?>" value="<?php echo e($m->laboratorio); ?>" readonly name="laboratorio" id="laboratorio">
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Fecha d/m/A</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control medicion<?php echo e($m->id); ?>" name="fecha" id="fecha" value="<?php echo e($m->fecha); ?>" readonly>
                                                </div>
                                            </div>


                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Hora H:m</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control medicion<?php echo e($m->id); ?>" name="hora" id="hora" value="<?php echo e($m->hora); ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for=""class="col-md-2 control-label">Caudal m3/s</label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control medicion<?php echo e($m->id); ?>" name="caudal" id="caudal" value="<?php echo e($m->caudal); ?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="recent<?php echo e($m->id); ?>" class="tab-pane ">
                                            <p>Parametros fisicos</p>

                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">PH:</label>
                                                <div class="col-md-2">
                                                    <input type="number"  step="0.001" class="form-control medicion<?php echo e($m->id); ?>" name="ph" id="ph" value="<?php echo e($m->ph); ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">

                                                <label for=""class="col-md-2 control-label">Conductividad (uS/cm):</label>
                                                <div class="col-md-2">
                                                    <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="ce" id="ce" value="<?php echo e($m->ce); ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Temperatura (°C):</label>
                                                <div class="col-md-2">
                                                    <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="temperatura" id="temperatura" value="<?php echo e($m->temperatura); ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Aceites y grasas (mg/l)</label>
                                                <div class="col-md-2">
                                                    <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="aceites" id="aceites" value="<?php echo e($m->aceites); ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Turbidez(NTU):</label>
                                                <div class="col-md-2">
                                                    <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="turbiedad" id="turbiedad" value="<?php echo e($m->turbiedad); ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Solidos Disueltos totales(mg/l):</label>
                                                <div class="col-md-2">
                                                    <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="sdt" id="sdt" value="<?php echo e($m->sdt); ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Solidos Suspendidos(mg/l):</label>
                                                <div class="col-md-2">
                                                    <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="sst" id="sst" value="<?php echo e($m->sst); ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Color:</label>
                                                <div class="col-md-2">
                                                    <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="color" id="color" value="<?php echo e($m->color); ?>" readonly>
                                                </div>
                                            </div>

                                        </div>
                                        <div id="gases<?php echo e($m->id); ?>" class="tab-pane">
                                            <p>Gases</p>
                                            
                                                
                                                
                                                    
                                                
                                            

                                            <div class="form-group ">

                                                <label for=""class="col-md-2 control-label">Oxigeno disuelto(mg/l):</label>
                                                <div class="col-md-2">
                                                    <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="od" id="od" value="<?php echo e($m->od); ?>" readonly>
                                                </div>
                                            </div>
                                            

                                                
                                                
                                                    
                                                
                                            
                                            

                                                
                                                
                                                    
                                                
                                            

                                            <div class="form-group ">
                                                <label for=""class="col-md-2 control-label">Sulfatos(mg/l):</label>
                                                <div class="col-md-2">
                                                    <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="hs" id="hs" value="<?php echo e($m->hs); ?>" readonly>
                                                </div>
                                            </div>


                                        </div>
                                        <div id="quimicos<?php echo e($m->id); ?>" class="tab-pane">
                                            <p>Parametros quimicos</p>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Amonio(mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" step="0.001" class="form-control medicion<?php echo e($m->id); ?> " readonly value="<?php echo e($m->amonio); ?>" name="amonio" id="amonio"  >
                                                    </div>
                                                </div>

                                                <div class="form-group ">

                                                    <label for=""class="col-md-5 control-label">Cloruros(mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" step="0.001" class="form-control medicion<?php echo e($m->id); ?> " readonly value="<?php echo e($m->cloruro); ?>" name="cloruro" id="cloruro"  >
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Nitrato (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" step="0.001" class="form-control medicion<?php echo e($m->id); ?> " readonly value="<?php echo e($m->nitrato); ?>" name="nitrato" id="nitrato"  >
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Nitrito (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" step="0.001" class="form-control medicion<?php echo e($m->id); ?> " readonly value="<?php echo e($m->nitrito); ?>" name="nitrito" id="nitrito"  >
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Cianuros (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" step="0.001" class="form-control medicion<?php echo e($m->id); ?> " readonly value="<?php echo e($m->cianuro); ?>" name="cianuro" id="cianuro"  >
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Calcio (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="ca" id="ca" value="<?php echo e($m->ca); ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">

                                                    <label for=""class="col-md-5 control-label">Magnesio (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="mg" id="mg" value="<?php echo e($m->mg); ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Sodio (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="na" id="na" value="<?php echo e($m->na); ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Potasio (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="k" id="k" value="<?php echo e($m->k); ?>" readonly>
                                                    </div>
                                                </div>

                                                
                                                    
                                                    
                                                        
                                                    
                                                

                                                
                                                    
                                                    
                                                        
                                                    
                                                



                                            </div>
                                            
                                                
                                                    
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                    
                                                        
                                                    
                                                

                                            

                                        </div>
                                        <div id="nutrientes<?php echo e($m->id); ?>" class="tab-pane">
                                            <p>Nutrientes</p>
                                            <div class="col-md-4">
                                                
                                                    
                                                    
                                                        
                                                    
                                                

                                                

                                                    
                                                    
                                                        
                                                    
                                                

                                                
                                                    
                                                    
                                                        
                                                    
                                                

                                                
                                                    
                                                    
                                                        
                                                    
                                                
                                                <div class="form-group ">
                                                    <label for=""class="col-md-6 control-label">Fosfato total (mg/l):</label>
                                                    <div class="col-md-5">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="p" id="p" value="<?php echo e($m->p); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for=""class="col-md-6 control-label">Nitrogeno total (mg/l):</label>
                                                    <div class="col-md-6">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="nt" id="nt" value="<?php echo e($m->nt); ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-6 control-label">Boro (mg/l):</label>
                                                    <div class="col-md-6">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="b" id="b" value="<?php echo e($m->b); ?>" readonly>
                                                    </div>
                                                </div>

                                                
                                                    
                                                    
                                                        
                                                    
                                                



                                            </div>
                                            <div class="col-md-6">
                                                
                                                    
                                                    
                                                        
                                                    
                                                

                                                
                                                    
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                    
                                                        
                                                    
                                                


                                            </div>
                                        </div>
                                        <div id="sanitarios<?php echo e($m->id); ?>" class="tab-pane">
                                            <p>Indicadores sanitarios Biologicos</p>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">DBO5 (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="dbo5" id="dbo5" value="<?php echo e($m->dbo5); ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">

                                                    <label for=""class="col-md-5 control-label">DQO (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="dqo" id="dqo" value="<?php echo e($m->dqo); ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Coliformes fecales (NMP/100 ml):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="coli_feca" id="coli_feca" value="<?php echo e($m->coli_feca); ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Coliformes totales (NMP/100 ml):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="coli_tot" id="coli_tot" value="<?php echo e($m->coli_tot); ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Salmonella spp (NMP/100 ml):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="salmonella" id="salmonella" value="<?php echo e($m->salmonella); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Bacterias colif. termorresistentes UFC/100 ml:</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="bact_coli" id="bact_coli" value="<?php echo e($m->bact_coli); ?>" readonly>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div id="metales<?php echo e($m->id); ?>" class="tab-pane">
                                            <p>Metales y no Metales trazas</p>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Zn (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="zn" id="zn" value="<?php echo e($m->zn); ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">

                                                    <label for=""class="col-md-5 control-label">Cd (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="cd" id="cd" value="<?php echo e($m->cd); ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Pb (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="pb" id="pb" value="<?php echo e($m->pb); ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Fe (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="fe" id="fe" value="<?php echo e($m->fe); ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Mn (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="mn" id="mn" value="<?php echo e($m->mn); ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group ">
                                                    <label for=""class="col-md-5 control-label">Cu (mg/l):</label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="cu" id="cu" value="<?php echo e($m->cu); ?>" readonly>
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label for=""class="col-md-3 control-label">Hg (mg/l):</label>
                                                    <div class="col-md-5">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="hg" id="hg" value="<?php echo e($m->hg); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for=""class="col-md-3 control-label">As (mg/l):</label>
                                                    <div class="col-md-5">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="as" id="as" value="<?php echo e($m->as); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for=""class="col-md-3 control-label">Cr (mg/l):</label>
                                                    <div class="col-md-5">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="cr" id="cr" value="<?php echo e($m->cr); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for=""class="col-md-3 control-label">Ni (mg/l):</label>
                                                    <div class="col-md-5">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="ni" id="ni" value="<?php echo e($m->ni); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for=""class="col-md-3 control-label">Sb (mg/l):</label>
                                                    <div class="col-md-5">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="sb" id="sb" value="<?php echo e($m->sb); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for=""class="col-md-3 control-label">Se (mg/l):</label>
                                                    <div class="col-md-5">
                                                        <input type="number" class="form-control medicion<?php echo e($m->id); ?>" name="se" id="se" value="<?php echo e($m->se); ?>" readonly>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="botones<?php echo e($m->id); ?>" style="display:none">
                                    <input type="hidden" name="medicion_id" value="<?php echo e($m->id); ?>">
                                    <input type="hidden" name="remfc_id" value="<?php echo e($m->id_remfc); ?>">
                                    <button type="submit" class=" btn btn-success btn-lg">Guardar</button>
                                    <button type="button" id="<?php echo e($m->id); ?>" class="cancelar btn btn-default btn-lg">Cancelar</button>

                                </div>

                            </div>
                        </form>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php else: ?>
                <h2 class="alert alert-primary">No existen mediciones</h2>
            <?php endif; ?>


        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('myscripts'); ?>
    <script>
        $(document).ready(function(){
            $('.editar').click(function(){

                $id=$(this).prop('id');
                $('.medicion'+$id).removeAttr('readonly');
                $('.medicion'+$id).addClass('bg-primary');
                $('.medicion'+$id+':first' ).focus();
                $('.botones'+$id).fadeIn(300);


            });
            $('.cancelar').click(function() {

                $id = $(this).prop('id');
                $('.medicion'+$id).attr('readonly',true);
                $('.medicion'+$id).removeClass('bg-primary');
                $('.botones'+$id).fadeOut(300);

            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>