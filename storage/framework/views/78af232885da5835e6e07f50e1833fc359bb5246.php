<!-- start: header -->
<header class="header">
    <div class="logo-container">
        <a href="../" class="logo">
            <h3>SISTEMA DE CUENCAS</h3>
            
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <!-- start: search & user box -->
    <div class="header-right">



        <span class="separator"></span>


        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <h2><i class="fa fa-user"></i></h2>
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email=".com">

                    <span class="name"><?php echo e(Auth::user()->name); ?></span>

                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">

                    <li class="divider"></li>
                    <li><a href="<?php echo e(url('admin/usuarios/micuenta')); ?>/<?php echo e(\Illuminate\Support\Facades\Auth::user()->id); ?>"><strong>Editar mi Cuenta</strong></a></li>
                    <li class="divider"></li>
                    <li>
                        <form action="<?php echo e(url('/logout')); ?>" method="post">
                            <?php echo csrf_field(); ?>

                            <button class="btn btn-link">
                                <i class=" fa fa-power-off"></i>Salir
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>
<!-- end: header -->
