<?php $__env->startSection('scripts'); ?>
<script>

    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }

    $(document).ready(function(){
    var second = "";
    var third = "";
    var furth = "";
    var fifth = "";
    var sixth = "";
    switch("<?php echo e($article->category); ?>") {
        case "science":
            second = "history";
            third = "technology";
            furth = "physics";
            fifth = "sport";
            sixth = "other";
            break;
        case "history":
            second = "science";
            third = "technology";
            furth = "physics";
            fifth = "sport";
            sixth = "other";
          break;
        case "technology":
            second = "science";
            third = "history";
            furth = "physics";
            fifth = "sport";
            sixth = "other";
          break;
          case "physics":
            second = "science";
            third = "history";
            furth = "technology";
            fifth = "sport";
            sixth = "other";
            break;
        case "sport":
            second = "science";
            third = "history";
            furth = "technology";
            fifth = "physics";
            sixth = "other";
          break;
        case "other":
            second = "science";
            third = "history";
            furth = "technology";
            fifth = "physics";
            sixth = "sport";
          break;
      }
    $("#first_option").text("<?php echo e($article->category); ?>");
    $("#first_option").val("<?php echo e($article->category); ?>");
    $("#second_option").text(second);
    $("#second_option").val(second);
    $("#third_option").text(third);
    $("#third_option").val(third);
    $("#furth_option").text(furth);
    $("#furth_option").val(furth);
    $("#fifth_option").text(fifth);
    $("#fifth_option").val(fifth);
    $("#sixth_option").text(sixth);
    $("#sixth_option").val(sixth);

    var article_status = "";
    switch("<?php echo e($article->accept); ?>") {
        case "yes":
            article_status = "no";
            break;
        case "no":
          article_status = "yes";
          break;
    }
    $("#first_status").text("<?php echo e($article->accept); ?>");
    $("#first_status").val("<?php echo e($article->accept); ?>");
    $("#second_status").text(article_status);
    $("#second_status").val(article_status);




                    // for follow writer
    $("#change-category").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = {
                         content: jQuery('#category').val(),
                          };
        $.ajax({
            url: "<?php echo e(route('admin.change_category', ['article' => $article->id])); ?>",
            type: "POST",
            data: formData,
            dataType: 'json',
            success: function(response) {

                $("#category-type").html(response);
                $("#modal-category").modal('toggle');
            }
        });
    });


    $("#change-status").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = {
                         content: jQuery('#status').val(),
                          };
        $.ajax({
            url: "<?php echo e(route('admin.change_status', ['article' => $article->id])); ?>",
            type: "POST",
            data: formData,
            dataType: 'json',
            success: function(response) {

                $("#accepted-type").html(response);
                $("#modal-activated").modal('toggle');
            }
        });
    });

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

        <div class="row justify-content-center">

            <div class="col-sm-8 mt-5">
                <div class="mt-3 text-primary">
                    <a href="<?php echo e(route('admin.edit_user_profile', ['user'=> $writer->id])); ?>" style="text-decoration: none"><b>Author : <?php echo e($writer->name); ?></b></a>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <p><b id="category-type" style="padding-right: 2%">Category : <?php echo e($article->category); ?></b></p>
                        </div>
                        <div class="col-sm-6">
                            <button data-bs-toggle="modal" data-bs-target="#modal-category" class="btn btn-secondary text-white"> Change</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <p><b id="accepted-type" style="padding-right: 2%">Accepted : <?php echo e($article->accept); ?></b></p>
                        </div>
                        <div class="col-sm-6">
                            <button data-bs-toggle="modal" data-bs-target="#modal-activated" class="btn btn-secondary text-white"> Change</button>
                        </div>
                    </div>

                </div>
                <div class="card mt-5"  style="border: none">
                            <div class="card-header row" style="background-color:rgb(47, 125, 235);color:white">
                                <div class="col-sm-10">
                                    <?php echo e($article->title); ?>


                                </div>
                                <div class="col-sm-2">
                                        <button data-bs-toggle="modal" data-bs-target="#modal-trash" class="btn btn-danger float-end"><i class="fa fa-trash"></i> Trash</button>
                                </div>
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


                <p id="comment-tp" class="text-primary mt-3 mb-5" style="font-size:20px"><b>Comments</b></p>
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="card mt-3"  style="border: none" id="<?php echo e($comment->id); ?>">
                    <div class="card-header row text-white" style="background-color:rgb(76, 133, 202)">
                        <div class="col-sm-10">
                            <?php echo e($comment->user->name); ?>


                        </div>
                        <div class="col-sm-2">

                            <button data-id="<?php echo e($comment->id); ?>" class="btn btn-danger float-end delete-button-comment">delete</button>


                        </div>
                    </div>
                    <div class="card-body" style="background-color:rgb(219, 231, 246)">
                        <br>
                        <p><?php echo e($comment->body); ?></p>
                        <br>
                        <p class="opacity-50">created at :<?php echo e($comment->created_at); ?></p>
                    </div>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php echo e($comments->fragment("comment-tp")->onEachSide(2)->links('vendor.pagination.bootstrap-5')); ?>


            </div>

        </div>
    </div>




    <!-- The Modal for changing Category of article -->
    <div class="modal fade" id="modal-category">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Change Category</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              <br>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                    <div class="form-group mt-3">
                        <select class="form-select" style="color:white;background-color:rgb(123, 146, 252)" id="category" name="category">
                            <option id="first_option" value=""></option>
                            <option id="second_option" value=""></option>
                            <option id="third_option" value=""></option>
                            <option id="furth_option" value=""></option>
                            <option id="fifth_option" value=""></option>
                            <option id="sixth_option" value=""></option>
                        </select>
                    </div>
            </div>
            <!-- Modal footer -->
            <br>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="button" id="change-category" class="btn btn-primary">change</button>

            </div>

          </div>
        </div>
      </div>


          <!-- The Modal for changing status (accept or not) of article -->
    <div class="modal fade" id="modal-activated">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Change status</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              <br>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                    <div class="form-group mt-3">
                        <select class="form-select" style="color:white;background-color:rgb(123, 146, 252)" id="status" name="status">
                            <option id="first_status" value=""></option>
                            <option id="second_status" value=""></option>

                        </select>
                    </div>
            </div>
            <!-- Modal footer -->
            <br>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" id="change-status" class="btn btn-primary">change</button>

            </div>

          </div>
        </div>
      </div>



          <!-- The Modal for delete  article -->
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
                        <form action="<?php echo e(route('admin.delete_article', ['article' => $article->id])); ?>" method="POST">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/admin/show_article.blade.php ENDPATH**/ ?>