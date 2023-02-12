<?php $__env->startSection('styles'); ?>

<style>
body{
    background-color: rgb(55, 55, 94);
}
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<div class="container">

    <div class="row mt-5">

        <div class="col-sm-6 mt-5">

            <div class="list-group">
                <p class=" list-group-item list-group-item-action text-white" style="background-color: rgb(47, 125, 235)"><b>Manage Articles</b></p>
                <a href="<?php echo e(route('admin.show_categories', ['type' => 'accepted'])); ?>"style="border:none; font-size: 18px" class="list-group-item list-group-item-action list-group-item-info d-flex justify-content-between align-items-center">
                    Accepted articles
                    <span class="badge bg-primary rounded-pill"><?php echo e($accepted_articles); ?></span>
                </a>

                <a href="<?php echo e(route('admin.show_categories', ['type' => 'unaccepted'])); ?>"style="border:none; font-size: 18px" class="list-group-item list-group-item-action list-group-item-info d-flex justify-content-between align-items-center">
                    Unaccepted articles
                    <span class="badge bg-primary rounded-pill"><?php echo e($unaccepted_articles); ?></span>
                </a>
                <a href="<?php echo e(route('admin.show_list_articles', ['type' => 'all' , 'category' => 'all'])); ?>"style="border:none; font-size: 18px" class="list-group-item list-group-item-action list-group-item-info d-flex justify-content-between align-items-center">
                    Newest articles
                    <span class="badge bg-primary rounded-pill"><?php echo e($unaccepted_articles + $accepted_articles); ?></span>
                </a>
                <a href="<?php echo e(route('admin.show_comments')); ?>"style="border:none; font-size: 18px" class="list-group-item list-group-item-action list-group-item-info d-flex justify-content-between align-items-center">
                    Manage comments
                    <span class="badge bg-primary rounded-pill"><?php echo e($comments); ?></span>
                </a>
            </div>
        </div>
        <div class="col-sm-6 mt-5">

            <div class="list-group">
                <p class=" list-group-item list-group-item-action text-white" style="background-color: rgb(228, 205, 31)"><b>Manage Writers</b></p>
                <a href="<?php echo e(route('admin.show_users_list', ['status'=>'active'])); ?>" style="border:none; font-size: 18px"class="list-group-item list-group-item-action list-group-item-warning d-flex justify-content-between align-items-center">
                    Active writers
                    <span class="badge bg-secondary rounded-pill"><?php echo e($active_users); ?></span>

                </a>
                <a href="<?php echo e(route('admin.show_users_list', ['status'=>'inactive'])); ?>" style="border:none; font-size: 18px" class="list-group-item list-group-item-action list-group-item-warning d-flex justify-content-between align-items-center">
                    Inactive writers
                    <span class="badge bg-secondary rounded-pill"><?php echo e($inactive_users); ?></span>

                </a>

            </div>
        </div>
    </div>


</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/admin/index.blade.php ENDPATH**/ ?>