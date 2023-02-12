<?php $__env->startSection('scripts'); ?>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<div class="container mt-5">


    <form>
        <input type="text" name=t1 class='form-control' id=t1>

    </form>
    <br>
    <div class="container">
        <label for="d1" s>Number of characters</label>
        <h3 id=d1>0</h3>
    </div>
    <br>
    <div class="progress" style="height:30px">
        <div class="progress-bar" id="p1" style="width:0%;height:30px" max="50"></div>
      </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/whitepaper/index.blade.php ENDPATH**/ ?>