<?php $__env->startSection('styles'); ?>
    <style>
        .set-size-element{
            width: 60%;
            height:100px;
            padding-top:10%;
        }
        @media screen and (max-width: 768px) {
            .set-size-element{
                width: 60%;
                height:100px;
                padding-top:3%;
            }


        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="container">
    <p class="text-primary mt-5" style="text-align: center; font-size:20px"><b>Categories</b></p>
    <div class="row mt-5">

        <div class="col-md-4" style="text-align: center">

            <a href="<?php echo e(route('admin.show_list_articles', ['type' => $type   ,'category' => 'science'])); ?>" class="btn btn-outline-primary mb-3 set-size-element" >

                <div class="row">
                    <div class="col-md-6">

                        <b>Science</b>
                    </div>
                    <div class="col-md-6">

                        <span class="badge bg-primary" style="font-size:18px"><?php echo e($count_articles[0]); ?></span>

                    </div>
                </div>


            </a>
        </div>
        <div class="col-md-4" style="text-align: center">
            <a href="<?php echo e(route('admin.show_list_articles', ['type' => $type   ,'category' => 'history'])); ?>" class="mb-3 btn btn-outline-info set-size-element" >

                <div class="row">
                    <div class="col-md-6">

                        <b>History</b>
                    </div>
                    <div class="col-md-6">

                        <span class="badge bg-info" style="font-size:18px"><?php echo e($count_articles[1]); ?></span>

                    </div>
                </div>


            </a>

        </div>
        <div class="col-md-4" style="text-align: center">
            <a href="<?php echo e(route('admin.show_list_articles', ['type' => $type   ,'category' => 'technology'])); ?>" class="btn btn-outline-success set-size-element">

                <div class="row">
                    <div class="col-md-6">

                        <b>Technology</b>
                    </div>
                    <div class="col-md-6">

                        <span class="badge bg-success" style="font-size:18px"><?php echo e($count_articles[2]); ?></span>

                    </div>
                </div>
            </a>

        </div>
    </div>

    <div class="row mt-5">

        <div class="col-md-4" style="text-align: center">

            <a href="<?php echo e(route('admin.show_list_articles', ['type' => $type   ,'category' => 'physics'])); ?>" class="mb-3 btn btn-outline-danger set-size-element">

                <div class="row">
                    <div class="col-md-6">

                        <b>Physics</b>
                    </div>
                    <div class="col-md-6">

                        <span class="badge bg-danger" style="font-size:18px"><?php echo e($count_articles[3]); ?></span>

                    </div>
                </div>

            </a>
        </div>
        <div class="col-md-4" style="text-align: center">
            <a href="<?php echo e(route('admin.show_list_articles', ['type' => $type   ,'category' => 'sport'])); ?>" class="mb-3 btn btn-outline-warning set-size-element">

                <div class="row">
                    <div class="col-md-6">

                        <b>Sport</b>
                    </div>
                    <div class="col-md-6">

                        <span class="badge bg-warning" style="font-size:18px"><?php echo e($count_articles[4]); ?></span>

                    </div>
                </div>
            </a>

        </div>
        <div class="col-md-4" style="text-align: center">
            <a href="<?php echo e(route('admin.show_list_articles', ['type' => $type   ,'category' => 'other'])); ?>" class="mb-3 btn btn-outline-secondary set-size-element">

                <div class="row">
                    <div class="col-md-6">

                        <b>Other</b>
                    </div>
                    <div class="col-md-6">

                        <span class="badge bg-secondary" style="font-size:18px"><?php echo e($count_articles[5]); ?></span>

                    </div>
                </div>



            </a>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/admin/show_categories.blade.php ENDPATH**/ ?>