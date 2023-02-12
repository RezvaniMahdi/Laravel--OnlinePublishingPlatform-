<?php $__env->startSection('content'); ?>


<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-sm-8 mt-5">
            <p class="text-primary"><b><?php echo e($type); ?></b></p>
            <br>
            <br>
            <?php $__currentLoopData = $Articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a style="text-decoration: none;color:black" href="<?php echo e(route('user.show_article', ['article'=> $article->id])); ?>">
                <div class="card" style="border: none">
                    <div class="card-header" style="background-color:rgb(47, 125, 235);color:white" >
                        <h6 style="text-align: left"><?php echo e($article->title); ?></h6>
                    </div>
                    <div class="card-body mt-4 mb-5">
                        <p style="text-align: left"><?php echo e($article->introduction); ?></p>
                        <br>
                        <p class="opacity-50">created at :<?php echo e($article->created_at); ?></p>

                    </div>
                </div>
            </a>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/user/newest_or_best_Articles.blade.php ENDPATH**/ ?>