<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
           Menu
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li>
                        <a href="<?php echo e(url('admin/inicio')); ?>">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <?php if(Auth::user()->rol=='admin' || Auth::user()->rol=='moni'): ?>
                    <li>
                        <a href="<?php echo e(url('admin/remas')); ?>">

                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>REMAS</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('admin/remfc')); ?>">

                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>REMFC</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('admin/remli')); ?>">

                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>REMLI</span>
                        </a>
                    </li>
                    <?php endif; ?>

                  <?php if(Auth::user()->rol=='admin' || Auth::user()->rol=='mapas'): ?>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span>Mapas</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo e(url('admin/tdps')); ?>">
                                   TDPS
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('admin/zonashidrologicas')); ?>">
                                   Zonas Hidrologicas
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span>Cuencas</span>
                        </a>
                        <ul class="nav nav-children">
                    <li>
                        <a href="<?php echo e(url('admin/cuencas')); ?>">
                            Cuenca Poopo
                        </a>
                    </li>
                            <li>
                                <a href="<?php echo e(url('admin/cuencacoipasa')); ?>">
                                    Cuenca Coipasa
                                </a>
                            </li>
                            </ul>
                    </li>
                        <?php if(Auth::user()->rol=='admin' ): ?>
                    <li>

                        <a href="<?php echo e(url('admin/usuarios')); ?>">

                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>USUARIOS</span>
                        </a>
                    </li>
                            <?php endif; ?>

                    <?php endif; ?>



                    <li>
                        <form action="<?php echo e(url('/logout')); ?>" method="post">
                            <?php echo csrf_field(); ?>

                        <button class="btn btn-link">
                            <i class=" fa fa-power-off"></i>Salir
                        </button>
                        </form>
                    </li>

                </ul>
            </nav>




        </div>

    </div>

</aside>
<!-- end: sidebar -->