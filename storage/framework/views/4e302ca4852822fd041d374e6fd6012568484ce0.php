<?php $__env->startSection('scripts'); ?>
<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="container mt-5">
        <div class="row justify-content-center ">


            <div class="col-sm-8 mt-3">
                <h5 class="text-primary mb-5">Contact Us</h5>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <div class="col-sm-6">

                            <input type="text" style="color:white;background-color:rgb(123, 146, 252)" placeholder="name" id="name" name="name" class="form-control mt-3" value="">
                        </div>
                        <div class="col-sm-6">
                            <input type="email" style="color:white;background-color:rgb(123, 146, 252)" id="name" name="name" placeholder="email address" class="form-control mt-3" value="">

                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <textarea style="color:white;background-color:rgb(123, 146, 252);border:none;overflow:hidden;resize:none" oninput="auto_grow(this)" id="context" name="context" placeholder="Content" class="form-control mt-3" value=""></textarea>
                    </div>
                    <div class="form-group mt-3" style="text-align: center">
                        <input type="submit" class="btn btn-primary" value="Send">
                    </div>
                </form>
                <br>
                <br>
            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/contact_us.blade.php ENDPATH**/ ?>