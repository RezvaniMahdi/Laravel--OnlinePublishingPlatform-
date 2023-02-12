<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="row justify-content-center ">
            <div id="div-articles" class="col-sm-8 mt-5" >
                    <h4 class="mb-5">Saved Articles</h4>

                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a style="text-decoration: none;color:black" href="<?php echo e(route('user.show_article', ['article'=> $article->id])); ?>">
                        <div class="card" style="border: none">
                            <div class="card-header" style="background-color:rgb(47, 125, 235);color:white" >
                                <h6><?php echo e($article->title); ?></h6>
                            </div>
                            <div class="card-body mt-4 mb-3">
                                <p><?php echo e($article->introduction); ?></p>
                            </div>
                        </div>
                    </a>
                    <form action=" <?php echo e(route('user.delete_savedarticle', ['article' => $article->id])); ?> " method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button class="btn btn-danger mb-5"><i class="fa fa-trash"></i> Remove from list</button>
                    </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($articles->onEachSide(2)->links('vendor.pagination.bootstrap-5')); ?>



        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/user/show_savedarticles.blade.php ENDPATH**/ ?>