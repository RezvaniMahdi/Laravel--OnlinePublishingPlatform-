<?php $__env->startSection('styles'); ?>
<style>
#flo{
    text-align: center;
}
@media screen and (max-width: 576px) {
        #flo{
            text-align: left;
        }

}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-sm-8 mt-5">
            <p id="div-bestWriters" class="text-primary"><b><?php echo e($type); ?></b></p>
            <br>
            <br>
            <?php $__currentLoopData = $bestWriters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $writer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a style="text-decoration: none;color:black" href="<?php echo e(route('user.dashbord', ['user'=> $writer->id])); ?>">
                <div class="card" style="border: none">
                    <div class="card-header" style="background-color:rgb(47, 125, 235);color:white" >
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 style="text-align: left"><?php echo e($writer->name); ?></h6>

                            </div>
                            <div class="col-sm-6">
                                <h6 id="flo">Followers : <?php echo e($writer->num_followers); ?></h6>

                            </div>
                        </div>

                    </div>
                    <div class="card-body mt-4 mb-5">
                        <p style="text-align: left">email address :<?php echo e($writer->email); ?></p>
                        <br>
                        <p style="text-align: left"><?php echo e($writer->biography); ?></p>

                    </div>
                </div>
            </a>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php echo e($bestWriters->fragment('div-bestWriters')->onEachSide(2)->links('vendor.pagination.bootstrap-5')); ?>


        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/user/show_best_writers.blade.php ENDPATH**/ ?>