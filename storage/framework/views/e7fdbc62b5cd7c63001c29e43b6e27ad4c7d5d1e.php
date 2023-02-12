<?php $__env->startSection('scripts'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<style>

    #a1:hover,#a2:hover,#a3:hover,#a4:hover,#a5:hover,#a6:hover{
        text-shadow: 0px 0px 10px white;
        cursor: pointer;
    }
    .bg-color{
        background-color: rgb(55, 55, 94);
        color: white;
    }

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



      <div class="container-fluid">

            <div class="row bg-color" >
                  <div class="col-sm-4">
                    <!--show links for edit profile and ....-->
                    <nav id="prof-list" class="navbar" style="padding: 23% 0% 0% 12%;">
                          <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" id="a4" style="color: white;border-bottom:1px solid white;margin-top:3%" href="<?php echo e(route('user.dashbord', ['user' => $user->id])); ?>">Dashbord</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="a1" style="color: white;border-bottom:1px solid white" href="<?php echo e(route('user.edit_profile')); ?>">Edit Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="a2" style="color: white;border-bottom:1px solid white;margin-top:3%" href="<?php echo e(route('user.show_myarticles')); ?>">My articles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="a5" style="color: white;border-bottom:1px solid white;margin-top:3%" href="<?php echo e(route('user.create_article')); ?>">Create new article</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="a6" style="color: white;border-bottom:1px solid white;margin-top:3%" href="<?php echo e(route('user.show_savedlist')); ?>">Saved articles</a>
                            </li>

                            <li class="nav-item">
                              <a class="nav-link" id="a5" style="color: white;border-bottom:1px solid white;margin-top:3%" data-bs-toggle="modal" data-bs-target="#modal-trash">Delete account</a>
                            </li>
                          </ul>
                      </nav>
                  </div>
                  <!-- Show profile-->
                  <div id="prof" class="col-sm-8">

                        <div class="card bg-color" style="border:none;margin:10% 0% 0% 0%">
                              <div class="card-header" style="border:none"><h5>Name</h5></div>
                              <div class="card-body opacity-75"><?php echo e($user->name); ?></div>
                        </div>

                        <div class="card bg-color" style="border:none">
                            <div class="card-header" style="border:none"><h5>Biography</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->biography); ?></div>
                        </div>

                        <div class="card bg-color" style="border:none">
                            <div class="card-header" style="border:none"><h5>Email</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->email); ?></div>
                        </div>

                        <div class="card bg-color" style="border:none">
                            <div class="card-header" style="border:none"><h5>Phone Number</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->phone_number); ?></div>
                        </div>

                        <div class="card bg-color" style="border:none">
                            <div class="card-header" style="border:none"><h5>Birth Date</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->birth_date); ?></div>
                        </div>

                        <div class="card bg-color" style="border:none">
                            <div class="card-header" style="border:none"><h5>Gender</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->gender); ?></div>
                        </div>

                        <div class="card bg-color" style="border:none">
                            <div class="card-header" style="border:none"><h5>FaceBook Profile</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->facebook); ?></div>
                        </div>

                        <div class="card bg-color" style="border:none">
                            <div class="card-header" style="border:none"><h5>Linkdin Profile</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->linkdin); ?></div>
                        </div>

                        <div class="card bg-color" style="border:none">
                            <div class="card-header" style="border:none"><h5>Time To Join Us</h5></div>
                            <div class="card-body opacity-75"><?php echo e($user->created_at); ?></div>
                        </div>
                  </div>
            </div>

      </div>




          <!-- The Modal for delete  account -->
          <div class="modal fade" id="modal-trash">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header bg-danger text-white">

                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  <br>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h4 class="text-danger" style="text-align: center">Are You Sure?</h4>

                    <div class="row mt-5">
                        <div class="col-sm-6 mb-3" style="text-align: center">
                            <button type="button"  class="btn btn-primary" data-bs-dismiss="modal" style="width: 50%;height: 60px">No</button>

                        </div>
                        <div class="col-sm-6"  style="text-align: center">
                            <form action="<?php echo e(route('user.delete_acount')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button type="submit" class="btn btn-danger" style="width: 50%;height: 60px">YES</button>
                            </form>
                            <br>
                            <br>
                        </div>
                    </div>


                </div>
                <!-- Modal footer -->


              </div>
            </div>
          </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/user/show_profile.blade.php ENDPATH**/ ?>