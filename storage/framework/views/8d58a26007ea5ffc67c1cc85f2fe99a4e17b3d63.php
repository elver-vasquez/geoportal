<?php $__env->startSection('head'); ?>
    <?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <section class="body">

        <!-- start: header -->
        <?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <?php echo $__env->make('includes.sidebar_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <!-- end: sidebar -->

            <section role="main" class="content-body">


                <header class="page-header">
                    

                    <div class="right-wrapper pull-right">
                       
                        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                    </div>
                </header>
                <div class=" row col-md-12">
            <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- start: page -->


                <!-- end: page -->
            </section>
        </div>
        <?php echo $__env->make('includes.sidebar-right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </section>
    <?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('includes.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>