<?php $__env->startSection('scripts'); ?>
<script>
function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <?php echo $__env->make('sections.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <button class="btn btn-primary mt-5" href="<?php echo e(route('user.store_myarticle')); ?>"
            onclick="event.preventDefault();
                            document.getElementById('article-form').submit();">
             Publish article
        </button>


        <form id="article-form" action="<?php echo e(route('user.store_myarticle')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <label class="mt-5" for="category">Category</label>
            <select class="form-select mt-3" id="category" name="category">
                <option id="science" value="science">science</option>
                <option id="history" value="history">history</option>
                <option id="technology" value="technology">technology</option>
                <option id="physics" value="physics">physics</option>
                <option id="sport" value="sport">sport</option>
                <option id="other" value="other" selected>other</option>

            </select>
            <textarea style="border:none;overflow:hidden;resize:none" oninput="auto_grow(this)" id="title" name="title" placeholder="Title of article" class="form-control mt-5"><?php echo e(old('title')); ?></textarea>
            <textarea style="border:none;overflow:hidden;resize:none" oninput="auto_grow(this)"  id="introducton" name="introduction" placeholder="Introduction of article" class="form-control mt-5" ><?php echo e(old('introduction')); ?></textarea>
            <textarea style="border:none;overflow:hidden;resize:none" oninput="auto_grow(this)" id="body" name="body" placeholder="Body of article" class="form-control mt-5"><?php echo e(old('body')); ?></textarea>
            <textarea style="border:none;overflow:hidden;resize:none" oninput="auto_grow(this)" id="result" name="result" placeholder="Result of article" class="form-control mt-5"><?php echo e(old('result')); ?></textarea>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/user/create_article.blade.php ENDPATH**/ ?>