<?php $__env->startSection('scripts'); ?>
<script>

</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="row justify-content-center ">
            <div class="col-sm-8 mt-5" >
                <div class="row mb-2">
                    <div class="col-sm-9">
                        <h4>My Articles</h4>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?php echo e(route('user.create_article')); ?>" class="btn btn-primary">Create New Article</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" style="background-color:rgb(47, 125, 235);color:white">Articles</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li class="list-group-item">
                                    <?php echo e($article->title); ?>

                                    <form action=" <?php echo e(route('user.delete_myarticle', ['id' => $article->id])); ?> " method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button class="btn btn-danger float-end"><i class="fa fa-trash"></i> Trash</button>
                                    </form>
                                    <a class="btn btn-primary float-end" href="<?php echo e(route('user.edit_myarticle', ['article'=> $article->id])); ?>" style="margin-right: 2%"><i class="fa fa-edit"></i>edit</a>

                                </li>



                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php echo e($articles->onEachSide(2)->links('vendor.pagination.bootstrap-5')); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/user/show_myarticles.blade.php ENDPATH**/ ?>