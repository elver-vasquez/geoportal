<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h2><strong>Registrar Nueva Medicion Remfc</strong></h2>
                <ul class="list-inline">
                    <li><h4><strong>Codigo:</strong><?php echo e($rema->codigo); ?></h4></li>
                    <li><h4><strong>Nombre:</strong><?php echo e($rema->nombre_hidrologica); ?></h4></li>
                    <li><h4><strong>Estacion:</strong><?php echo e($rema->estacion); ?></h4></li>
                    <li><h4><strong>dpto:</strong><?php echo e($rema->dpto); ?></h4></li>
                </ul>

            </div>
            <form  method="post" action="<?php echo e(url('admin/medicionstore_remfc')); ?>" class="form form-horizontal ">
                <?php echo csrf_field(); ?>

                <div class="panel panel-body">
                    <div class="tabs">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#popular" data-toggle="tab"><i class="fa fa-star"></i> Generales</a>
                            </li>
                            <li >
                                <a href="#recent" data-toggle="tab" style="background-color:#01a0e4" >Parametros fisicos</a>
                            </li>
                            <li>
                                <a href="#gases" data-toggle="tab" style="background-color:#8f9d6a">Gases</a>
                            </li>
                            <li>
                                <a href="#quimicos" data-toggle="tab" style="background-color:#D8FA3C">Parametros Quimicos</a>
                            </li>
                            <li>
                                <a href="#nutrientes" data-toggle="tab" style="background-color:#86cb86">Nutrientes</a>
                            </li>
                            <li>
                                <a href="#sanitarios" data-toggle="tab" style="background-color:#DE8E30">Indicadores sanitarios Biologicos</a>
                            </li>
                            <li>
                                <a href="#metales" data-toggle="tab" style="background-color:#74b2e2 ">Metales y no Metales trazas</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="popular" class="tab-pane active">
                                <p>Generales</p>


                                <div class="form-group ">
                                    <label for=""class=" col-md-2 control-label">Campaña</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control "   name="campania" id="campania">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Codigo Campaña</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control "   name="cod_campania" id="cod_campania">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Laboratorio responsable</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control "   name="laboratorio" id="laboratorio">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Fecha d/m/A</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control " name="fecha" id="fecha"  >
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Hora H:m</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control " name="hora" id="hora"  >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for=""class="col-md-2 control-label">Caudal m3/s</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control " name="caudal" id="caudal"  >
                                    </div>
                                </div>
                            </div>





                            <div id="recent" class="tab-pane ">
                                <p>Parametros fisicos</p>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">PH:</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="ph" id="ph"  >
                                    </div>
                                </div>

                                <div class="form-group ">

                                    <label for=""class="col-md-2 control-label">Conductividad (uS/cm):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="ce" id="ce"  >
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Temperatura (°C):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="temperatura" id="temperatura"  >
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Aceites y grasas (mg/l)</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="aceites" id="aceites" >
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Turbidez(NTU):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="turbiedad" id="turbiedad"  >
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Solidos disueltos totales(mg/l):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="sdt" id="sdt"  >
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Solidos suspendidos(mg/l):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="sst" id="sst"  >
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Color:</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="color" id="color"  >
                                    </div>
                                </div>

                            </div>
                            <div id="gases" class="tab-pane">
                                <p>Gases</p>
                                
                                    
                                    
                                        
                                    
                                

                                <div class="form-group ">

                                    <label for=""class="col-md-2 control-label">Oxigeno Disuelto(mg/l):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="od" id="od"  >
                                    </div>
                                </div>

                                

                                    
                                    
                                        
                                    
                                
                                

                                    
                                    
                                        
                                    
                                

                                <div class="form-group ">
                                    <label for=""class="col-md-2 control-label">Sulfatos(mg/l):</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control " name="hs" id="hs"  >
                                    </div>
                                </div>


                            </div>
                            <div id="quimicos" class="tab-pane">
                                <p>Parametros quimicos</p>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Amonio(mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" step="0.001" class="form-control " name="amonio" id="amonio"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">

                                        <label for=""class="col-md-5 control-label">Cloruros(mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" step="0.001" class="form-control " name="cloruro" id="cloruro"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Nitrato (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" step="0.001" class="form-control " name="nitrato" id="nitrato"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Nitrito (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" step="0.001" class="form-control " name="nitrito" id="nitrito"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Cianuros (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" step="0.001" class="form-control " name="cianuro" id="cianuro"  >
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Calcio (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="ca" id="ca"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">

                                        <label for=""class="col-md-5 control-label">Magnesio (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="mg" id="mg"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Sodio(mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="na" id="na"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Potasio (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="k" id="k"  >
                                        </div>
                                    </div>

                                    
                                        
                                        
                                            
                                        
                                    

                                    
                                        
                                        
                                            
                                        
                                    



                                </div>
                                
                                    
                                        
                                        
                                            
                                        
                                    
                                    
                                        
                                        
                                            
                                        
                                    
                                    
                                        
                                        
                                            
                                        
                                    
                                    
                                        
                                        
                                            
                                        
                                    
                                    
                                        
                                        
                                            
                                        
                                    

                                

                            </div>
                            <div id="nutrientes" class="tab-pane">
                                <p>Nutrientes</p>
                                <div class="col-md-4">
                                    
                                        
                                        
                                            
                                        
                                    

                                    

                                        
                                        
                                            
                                        
                                    

                                    
                                        
                                        
                                            
                                        
                                    

                                    
                                        
                                        
                                            
                                        
                                    
                                    <div class="form-group ">
                                        <label for=""class="col-md-6 control-label">fosfato total (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="p" id="p"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-6 control-label">Nitrogeno total (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="nt" id="nt"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-6 control-label">Boro (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="b" id="b"  >
                                        </div>
                                    </div>

                                    
                                        
                                        
                                            
                                        
                                    



                                </div>
                                <div class="col-md-6">
                                    
                                        
                                        
                                            
                                        
                                    

                                    
                                        
                                        
                                            
                                        
                                    
                                    
                                        
                                        
                                            
                                        
                                    


                                </div>
                            </div>
                            <div id="sanitarios" class="tab-pane">
                                <p>Indicadores sanitarios Biologicos</p>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">DBO5 (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="dbo5" id="dbo5"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">

                                        <label for=""class="col-md-5 control-label">DQO (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="dqo" id="dqo"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Coliformes fecales (NMP/100 ml):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="coli_feca" id="coli_feca"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Coliformes totales (NMP/100 ml):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="coli_tot" id="coli_tot"  >
                                        </div>
                                    </div>

                                    
                                        
                                        
                                            
                                        
                                    

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Bacterias colif. termorresistentes UFC/100 ml:</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="bact_coli" id="bact_coli">
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div id="metales" class="tab-pane">
                                <p>Metales y no Metales trazas</p>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Zn (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="zn" id="zn"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">

                                        <label for=""class="col-md-5 control-label">Cd (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="cd" id="cd"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Pb (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="pb" id="pb"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Fe (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="fe" id="fe"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Mn (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="mn" id="mn"  >
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for=""class="col-md-5 control-label">Cu (mg/l):</label>
                                        <div class="col-md-7">
                                            <input type="number" class="form-control " name="cu" id="cu"  >
                                        </div>
                                    </div>



                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">Hg (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="hg" id="hg"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">As (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="as" id="as"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">Cr (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="cr" id="cr"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">Ni (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="ni" id="ni"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">Sb (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="sb" id="sb"  >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for=""class="col-md-3 control-label">Se (mg/l):</label>
                                        <div class="col-md-5">
                                            <input type="number" class="form-control " name="se" id="se"  >
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div >
                        <input type="hidden" name="id_remfc" value="<?php echo e($rema->id); ?>" >
                        <button type="submit" class=" btn btn-success btn-lg">Guardar</button>
                        <a href="<?php echo e(url('admin/remfc')); ?>" type="button" id="" class="cancelar btn btn-default btn-lg">Cancelar</a>

                    </div>

                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscripts'); ?>
    <script>
        $(document).ready(function(){
            $('#fecha').datepicker({
                dateFormat: 'dd/mm/yy',
                changeMonth: true,
                numberOfMonths: 1,
                buttonImage: 'contact/calendar/calendar.gif',
                buttonImageOnly: true,
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>