<?php $__env->startSection('scripts'); ?>
<script>

    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })


    // here we send a request to server with ajax for do operation like
    $(document).ready(function(){
            $("#like").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "<?php echo e(route('user.store_like',['article' => $article->id])); ?>",
                    type: "POST",
                    dataType: 'json',
                    success: function( response ) {

                        $("#num-like").html(response[0]);
                        if (response[1] == 'yes')
                        {
                            $("#like").removeClass("btn-outline-primary");
                            $("#like").addClass("btn-primary");
                        }else{
                            $("#like").removeClass("btn-primary");
                            $("#like").addClass("btn-outline-primary");
                        }

                    }
                });
            });

            // for send comment to server
            $("#comment-btn").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = {
                         content: jQuery('#comment').val(),
                          };
                $.ajax({
                    url: "<?php echo e(route('user.store_comment',['article' => $article->id])); ?>",
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        $("#num-comment").html(response);
                        $("#comment").val("");
                        $("#t-modal-massage").html('Comment add successfully');
                        $("#p-modal-massage").html('comment send to admin and Admin after check will accept it');
                        $("#modal-comment").modal('toggle');
                        $("#modal-massage").modal('show');
                        setTimeout(function () {
                            $('#modal-massage').modal('hide');
                            }, 3000);
                    }
                });
            });

            // for save article in your list
            $("#save-article").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "<?php echo e(route('user.save_article',['article' => $article->id])); ?>",
                    type: "POST",
                    dataType: 'json',
                    success: function(response) {

                        $("#t-modal-massage").html(response);
                        $("#p-modal-massage").html('for see your list go to the saved articles sectionment send to admin and Admin after check will accept it');
                        $("#modal-massage").modal('show');
                        setTimeout(function () {
                            $('#modal-massage').modal('hide');
                            }, 5000);
                    }
                });
            });

                // for follow writer
            $("#follow").click(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "<?php echo e(route('user.follow', ['writer'=>$writer->id])); ?>",
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
#comt-div{
    margin-left: 100%;
}
#saved-div{
    margin-left: 200%;
}
@media screen and (max-width: 576px) {
        #comt-div{
            margin-left: 35%;
            margin-top: -13%;
        }
        #saved-div{
            margin-left: 70%;
            margin-top: -13%;
        }

}
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="row justify-content-center ">

            <div class="col-sm-8 mt-5">
                <div class="mt-3 text-primary">

                    <a href="<?php echo e(route('user.dashbord', ['user'=> $writer->id])); ?>" style="text-decoration: none"><b>Author : <?php echo e($writer->name); ?></b></a>
                    <button type="button" id="follow" name="follow" class="btn btn-primary" style="margin-left: 5%"><?php echo e($follow); ?></button>

                    <br>
                    <br>
                    <p><?php echo e($writer->biography); ?></p>
                </div>
                <div class="card mt-5"  style="border: none">
                            <div class="card-header" style="background-color:rgb(47, 125, 235);color:white">
                                <?php echo e($article->title); ?>

                            </div>
                            <div class="card-body">
                                <br>
                                <p><?php echo e($article->introduction); ?></p>
                                <br>
                                <p><?php echo e($article->body); ?></p>
                                <br>
                                <p><?php echo e($article->result); ?></p>
                                <br>
                                <p class="opacity-50">created at :<?php echo e($article->created_at); ?></p>
                            </div>
                </div>
                <div class="col-sm-12 mt-2" style="display: flex" >
                    <div class="row" style="display: flex">
                            <div class="col-sm-2">
                                    <div class="container" style="display: flex;z-index: 1">
                                        <span id="num-like" class="badge bg-primary"><?php echo e(count($likes)); ?></span>

                                            <?php if( $done === "no"): ?>

                                                <button type="button" id="like" class="btn btn-outline-primary" style="border: none;z-index: 1"><i class="fa fa-thumbs-up"></i></button>

                                            <?php else: ?>
                                                <button type="submit" id="like" class="btn btn-primary" style="border: none;z-index: 1"><i class="fa fa-thumbs-up"></i></button>

                                            <?php endif; ?>
                                    </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="container" id='comt-div' style="display: flex; z-index: 2">
                                    <span id="num-comment" class="badge bg-warning"><?php echo e(count($comments)); ?></span>
                                    <a class="btn btn-outline-warning" style="border: none; z-index: 2" data-bs-toggle="modal" data-bs-target="#modal-comment"><i class='fa fa-comment'></i></a>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="container" id="saved-div" style="display: flex;z-index: 1">

                                     <button type="button" id="save-article" name="save-article" class="btn btn-outline-secondary" style="border: none;z-index: 1" data-bs-toggle="tooltip" data-bs-placement="right" title="Save"><i class="fa fa-save"></i></button>
                                </div>
                           </div>
                   </div>
                </div>

                <div id="div-comment" class="col-sm-12 mt-5">


                    
                    <p class="text-primary mt-3 mb-5" style="font-size:24px"><b>Comments</b></p>

                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="card mt-3"  style="border: none">
                        <div class="card-header row text-white" style="background-color:rgb(76, 133, 202)">
                                <?php echo e($comment->user->name); ?>

                        </div>
                        <div class="card-body" style="background-color:rgb(219, 231, 246)">
                            <br>
                            <p><?php echo e($comment->body); ?></p>
                            <br>
                            <p class="opacity-50">created at :<?php echo e($comment->created_at); ?></p>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php echo e($comments->fragment('div-comment')->onEachSide(2)->links('vendor.pagination.bootstrap-5')); ?>

                </div>
            </div>

        </div>
    </div>

    <!-- The Modal for send comment  -->
<div class="modal fade" id="modal-comment">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Comment</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

            <textarea style="border:none;overflow:hidden;resize:none" oninput="auto_grow(this)" id="comment" name="comment" placeholder="Write your comment here" class="form-control"></textarea>

        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" id="comment-btn" class="btn btn-primary">Send</button>

        </div>

      </div>
    </div>
  </div>



      <!-- The Modal for show massage    -->
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
            <br>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer text-white bg-success justify-content-center" >
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/user/show_article.blade.php ENDPATH**/ ?>