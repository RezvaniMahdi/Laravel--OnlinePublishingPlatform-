<?php $__env->startSection('scripts'); ?>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>



      <div class="container-fluid">

            <div class="row "  style="background-color:rgb(47, 125, 235);color:white">

                  <div class="col-sm-4">
                    <!--show links for edit profile and ....-->
                    <nav class="navbar position-fixed" style="padding: 6% 0% 0% 10%;">
                          <ul class="navbar-nav">
                            <li class="nav-item">
                              <a class="nav-link" style="color: white;border-bottom:1px solid white" href="#">Edit Profile</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" style="color: white;border-bottom:1px solid white;margin-top:3%" href="#">Show my posts</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" style="color: white;border-bottom:1px solid white;margin-top:3%" href="#">Create a new post</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color: white;border-bottom:1px solid white;margin-top:3%" href="#">My folower and flowing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color: white;border-bottom:1px solid white;margin-top:3%" href="#">Delete account</a>
                            </li>
                          </ul>
                      </nav>
                  </div>
                  <!-- Show profile-->
                  <div class="col-sm-8">

                        <div class="card" style="background-color:rgb(47, 125, 235);border:none;margin:10% 0% 0% 0%">
                              <div class="card-header" style="border:none"><h5>Name</h5></div>
                              <div class="card-body opacity-75"><?php echo e($user->name); ?></div>
                        </div>

                        <div class="card" style="background-color:rgb(47, 125, 235);border:none">
                            <div class="card-header" style="border:none"><h5>Biography</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->biography); ?></div>
                        </div>

                        <div class="card" style="background-color:rgb(47, 125, 235);border:none">
                            <div class="card-header" style="border:none"><h5>Email</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->email); ?></div>
                        </div>

                        <div class="card" style="background-color:rgb(47, 125, 235);border:none">
                            <div class="card-header" style="border:none"><h5>Phone Number</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->phone_number); ?></div>
                        </div>

                        <div class="card" style="background-color:rgb(47, 125, 235);border:none">
                            <div class="card-header" style="border:none"><h5>Birth Date</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->birth_date); ?></div>
                        </div>

                        <div class="card" style="background-color:rgb(47, 125, 235);border:none">
                            <div class="card-header" style="border:none"><h5>Gender</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->gender); ?></div>
                        </div>

                        <div class="card" style="background-color:rgb(47, 125, 235);border:none">
                            <div class="card-header" style="border:none"><h5>FaceBook Profile</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->facebook); ?></div>
                        </div>

                        <div class="card" style="background-color:rgb(47, 125, 235);border:none">
                            <div class="card-header" style="border:none"><h5>Linkdin Profile</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->linkdin); ?></div>
                        </div>

                        <div class="card" style="background-color:rgb(47, 125, 235);border:none">
                            <div class="card-header" style="border:none"><h5>Time To Join Us</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->created_at); ?></div>
                        </div>
                  </div>
            </div>

      </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/user/showprofile.blade.php ENDPATH**/ ?>