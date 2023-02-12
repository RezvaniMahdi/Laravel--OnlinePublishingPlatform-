<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function(){
    var second_g = "";
    var third_g = "";
    switch("<?php echo e($user->gender); ?>") {
        case "other":
            second_g = "male";
            third_g = "female";
            break;
        case "male":
          second_g = "female";
          third_g = "other";
          break;
        case "female":
          second_g = "male";
          third_g = "other";
          break;
      }
    $("#first_gender").text("<?php echo e($user->gender); ?>");
    $("#first_gender").val("<?php echo e($user->gender); ?>");
    $("#second_gender").text(second_g);
    $("#second_gender").val(second_g);
    $("#third_gender").text(third_g);
    $("#third_gender").val(third_g);
});
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
.bg-color{
    background-color: rgb(55, 55, 94);
    color: white;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="row justify-content-center bg-color" >
            <div class="col-sm-8">
                <?php echo $__env->make('sections.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card bg-color" style="border:none;margin:10% 0% 0% 0%">
                    <div class="card-header" style="border:none"><h5>Edit Profile</h5></div>
                    <div class="card-body">
                        <form action="<?php echo e(route('user.store_profile')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="img"><b>Profile Image</b></label>
                                <input type="file" style="color:white;background-color:rgb(123, 146, 252)" id="img" name="profile_image" class="form-control mt-3">
                            </div>
                            <div class="form-group mt-3">
                                <label for="name"><b>Name</b></label>
                                <input type="text" style="color:white;background-color:rgb(123, 146, 252)" id="name" name="name" class="form-control mt-3" value="<?php echo e($user->name); ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="biography"><b>Biography</b></label>
                                <textarea style="color:white;background-color:rgb(123, 146, 252)" id="biography" name="biography" placeholder="Introduce your self" class="form-control mt-3" value="<?php echo e($user->biography); ?>"></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="email"><b>Email</b></label>
                                <input type="email" style="color:white;background-color:rgb(123, 146, 252)" id="email" name="email"  class="form-control mt-3" value="<?php echo e($user->email); ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="phone"><b>Phone Number</b></label>
                                <input type="tel" style="color:white;background-color:rgb(123, 146, 252)" id="phone" name="phone" placeholder="09******351" pattern="[0-9]{11}" class="form-control mt-3" value="<?php echo e($user->phone_number); ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="birth"><b>Birth Date</b></label>
                                <input type="date" style="color:white;background-color:rgb(123, 146, 252)" id="birth" name="birth" class="form-control mt-3" value="<?php echo e($user->birth_date); ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="gender"><b>Gender</b></label>
                                <select class="form-select" style="color:white;background-color:rgb(123, 146, 252)" id="gender" name="gender">
                                    <option id="first_gender" value=""></option>
                                    <option id="second_gender" value=""></option>
                                    <option id="third_gender" value=""></option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="facebook"><b>FaceBook ID</b></label>
                                <input type="text" style="color:white;background-color:rgb(123, 146, 252)" id="facebook" name="facebook" class="form-control mt-3" value="<?php echo e($user->facebook); ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="linkdin"><b>Linkedin ID</b></label>
                                <input type="text" style="color:white;background-color:rgb(123, 146, 252)" id="linkdin" name="linkdin" class="form-control mt-3" value="<?php echo e($user->linkdin); ?>">
                            </div>
                            <button type="submit" class="btn btn-warning mt-3" style="color: rgb(63, 60, 60);width:20%;margin-left:37%">Save</button>
                        </form>
                    </div>
              </div>
            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/user/edit_profile.blade.php ENDPATH**/ ?>