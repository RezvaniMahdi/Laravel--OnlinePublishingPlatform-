<?php $__env->startSection('scripts'); ?>
<script>

    $(document).ready(function(){

    $(".delete-button-comment").click(function(){
        var id = $(this).attr("data-id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = {
                         content: id,
                          };
        $.ajax({
            url: "<?php echo e(route('admin.delete_comment')); ?>",
            type: "POST",
            data: formData,
            dataType: 'json',
            success: function(response) {

                var card_id = "#" + id;
                $(card_id).remove();
            }
        });
    });
});
</script>

<?php $__env->stopSection(); ?>







<?php $__env->startSection('styles'); ?>
<style>
.delete-button-comment{
    width: 80px;
}

</style>
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>


<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-sm-8 mt-5">
            <p class="text-primary"><b>Newest Comments</b> <span class="badge bg-primary"><?php echo e(count($comments)); ?></span></p>
            <br>
            <br>
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="card" style="border: none" id="<?php echo e($comment->id); ?>">
                    <div class="card-header row text-white" style="background-color:rgb(47, 125, 235);color:white" >
                        <div class="col-sm-10">
                            <?php echo e($comment->user->name); ?>


                        </div>
                        <div class="col-sm-2">

                            <button data-id="<?php echo e($comment->id); ?>" class="btn btn-danger float-end delete-button-comment">delete</button>


                        </div>                    </div>
                    <div class="card-body mt-4 mb-5">
                        <p style="text-align: left"><?php echo e($comment->body); ?></p>
                        <br>
                        <p class="opacity-50">created at :<?php echo e($comment->created_at); ?></p>
                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php echo e($comments->onEachSide(2)->links('vendor.pagination.bootstrap-5')); ?>


        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/admin/show_comments.blade.php ENDPATH**/ ?>