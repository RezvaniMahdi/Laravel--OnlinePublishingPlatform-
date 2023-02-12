<?php $__env->startSection('scripts'); ?>
<script>
    // here we send a request to server with ajax for do operation like
    $(document).ready(function(){

                // for follow writers
            $("#follow").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "<?php echo e(route('user.follow', ['writer'=>$user->id])); ?>",
                    type: "POST",
                    dataType: 'json',
                    success: function(response) {

                        if (response === "Now you are his follower"){
                            $("#follow").html("Unfollow");

                        }else{
                            $("#follow").html("Follow");

                        }
                        $("#t-modal-massage").html(response);
                        $("#modal-massage").modal('show');
                        setTimeout(function () {
                            $('#modal-massage').modal('hide');
                            }, 4000);
                    }
                });
            });
        });
</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<style>
#btn-follower{
    float: right;
}
@media screen and (max-width: 576px) {
        #btn-follower{
            float:none;
        }
}

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

        <div class="container">

            <div class="row justify-content-center text-center mt-5">

                <div class="col-sm-8 mt-5">
                    <p class="text-primary"><b>Author name : <?php echo e($user->name); ?></b></p>
                    <br>
                    <p class="text-primary"><b><?php echo e($user->biography); ?></b></p>
                    <br>
                    <p class="text-primary"><b><?php echo e($user->linkdin); ?></b></p>
                    <br>
                    <p class="text-primary"><b><?php echo e($user->facebook); ?></b></p>
                    <br>
                    <div class="row">
                        <div class="col-sm-5">
                            <button id="btn-follower" class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#modal-follower"><b>Follower : <?php echo e(count($followers)); ?></b></button>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-following"><b>Following : <?php echo e(count($followings)); ?></b></button>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <button type="button" id="follow" name="follow" style="width: 50%" class="btn btn-primary"><?php echo e($follow); ?></a>

                    </div>

                    <br>
                    <br>
                    <p id="div-articles" class="text-dark"><b>Articles</b></p>
                    <br>

                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

                    <?php echo e($articles->fragment('div-articles')->onEachSide(2)->links('vendor.pagination.bootstrap-5')); ?>


                </div>

            </div>
        </div>

            <!-- The Modal for followers -->
<div class="modal fade" id="modal-follower">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Followers</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal for follower -->
        <div class="modal-body">

            <div class="list-group">

                <?php $__currentLoopData = $followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <a href="<?php echo e(route('user.dashbord', ['user'=> $flower->id])); ?>" style="border:none;" class="btn list-group-item list-group-item-action list-group-item-light"><?php echo e($flower->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>


        </div>

      </div>
    </div>
  </div>


              <!-- The Modal for followers -->
<div class="modal fade" id="modal-following">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Following</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal for follower -->
        <div class="modal-body">

            <div class="list-group">

                <?php $__currentLoopData = $followings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flowing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <a href="<?php echo e(route('user.dashbord', ['user'=> $flowing->id])); ?>" style="border:none;" class="btn list-group-item list-group-item-action list-group-item-light"><?php echo e($flowing->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>


        </div>

      </div>
    </div>
  </div>




        <!-- The Modal for show massage for add comment   -->
<div class="modal fade" id="modal-massage">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header text-white bg-success">
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body text-white bg-success" style="text-align: center">

            <p><b id="t-modal-massage"></b></p>
            <br>
            <p id="p-modal-massage"></p>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer text-white bg-success justify-content-center" >
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/user/dashbord.blade.php ENDPATH**/ ?>