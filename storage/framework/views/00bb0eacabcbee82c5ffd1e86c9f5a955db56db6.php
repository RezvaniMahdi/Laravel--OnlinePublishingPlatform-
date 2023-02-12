<?php $__env->startSection('content'); ?>

      <div class="container-fluid">

        <div class="row" style="background-color:rgb(47, 125, 235)">
            <div class="col-sm-6">
                <h1 style="color:white;padding:20% 0% 0% 30%;">Be Enthusiastic.</h1>
                <p style="color: white;padding:0% 0% 0% 30%">For Discovering, Learning, thinking and Reading<br>from writers on any topic.</p>
            </div>
            <div class="col-sm-6">

                <img class="img-fluid p-5" src="<?php echo e(asset('photos/home.png')); ?>">

            </div>
        </div>
        <div class="row mt-5">

            <div class="row mb-5" id="div-articles">
                <p class="text-center text-primary mb-3" style="font-size: 20px"><b>Trending on WhitePaper</b></p>
                <div class="col-sm-4 text-center">

                    <a href="<?php echo e(route('user.categoryArticles', ['category' => $best_categories[0]])); ?>" class="btn btn-outline-primary mb-3" style="width: 50%;height: 80px;padding-top: 5%">
                        <div class="row">
                            <div class="col-sm-6">

                                <span class="badge bg-primary" style="font-size:18px">1</span>
                            </div>
                            <div class="col-sm-6">

                                <b><?php echo e($best_categories[0]); ?></b>
                            </div>
                        </div>

                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="<?php echo e(route('user.categoryArticles', ['category' => $best_categories[1]])); ?>" class="btn btn-outline-primary mb-3" style="width: 50%;height: 80px;padding-top: 5%"">

                        <div class="row">
                            <div class="col-sm-6">

                                <span class="badge bg-primary" style="font-size:18px">2</span>
                            </div>
                            <div class="col-sm-6">

                                <b><?php echo e($best_categories[1]); ?></b>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="col-sm-4 text-center">
                    <a href="<?php echo e(route('user.categoryArticles', ['category' => $best_categories[2]])); ?>" class="btn btn-outline-primary" style="width: 50%;height: 80px;padding-top: 5%"">

                        <div class="row">
                            <div class="col-sm-6">

                                <span class="badge bg-primary" style="font-size:18px">3</span>
                            </div>
                            <div class="col-sm-6">

                                <b><?php echo e($best_categories[2]); ?></b>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
             <div class="col-sm-7">

                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a style="text-decoration: none;color:black" href="<?php echo e(route('user.show_article', ['article'=> $article->id])); ?>">
                    <div class="card" style="border: none">
                        <div class="card-header" style="background-color:rgb(47, 125, 235);color:white" >
                            <h6><?php echo e($article->title); ?></h6>
                        </div>
                        <div class="card-body mt-4 mb-5">
                            <p><?php echo e($article->introduction); ?></p>

                            <p class="opacity-50">created at :<?php echo e($article->created_at); ?></p>
                        </div>
                    </div>
                </a>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php echo e($articles->fragment('div-articles')->onEachSide(2)->links('vendor.pagination.bootstrap-5')); ?>


             </div>
             <div class="col-sm-5">
                <div class="row" >
                    <div class="list-group">
                        <h6 class=" list-group-item list-group-item-action text-white" style="background-color: rgb(47, 125, 235)">Categories</h6>
                        <a href="<?php echo e(route('user.categoryArticles', ['category' => 'science'])); ?>" style="border:none" class="btn list-group-item list-group-item-action list-group-item-light">Science</a>
                        <a href="<?php echo e(route('user.categoryArticles', ['category' => 'history'])); ?>"style="border:none;" class="btn list-group-item list-group-item-action list-group-item-light">History</a>
                        <a href="<?php echo e(route('user.categoryArticles', ['category' => 'technology'])); ?>"style="border:none;" class="btn list-group-item list-group-item-action list-group-item-light">Technology</a>
                        <a href="<?php echo e(route('user.categoryArticles', ['category' => 'physics'])); ?>"style="border:none;" class="btn list-group-item list-group-item-action list-group-item-light">Physics</a>
                        <a href="<?php echo e(route('user.categoryArticles', ['category' => 'sport'])); ?>"style="border:none;" class="btn list-group-item list-group-item-action list-group-item-light">Sport</a>
                        <a href="<?php echo e(route('user.categoryArticles', ['category' => 'other'])); ?>"style="border:none;" class="btn list-group-item list-group-item-action list-group-item-light">Other</a>

                    </div>
                </div>
                <div class="row mt-5">
                    <div class="list-group">
                        <h6 class=" list-group-item list-group-item-action text-white" style="background-color: rgb(47, 125, 235)">Newest Articles</h6>
                        <a href="<?php echo e(route('user.show_article', ['article' => $newestArticle->get(0)->id])); ?>" style="border:none" class="btn list-group-item list-group-item-action list-group-item-light"><?php echo e($newestArticle->get(0)->title); ?></a>
                        <a href="<?php echo e(route('user.show_article', ['article' => $newestArticle->get(1)->id])); ?>"style="border:none;" class="btn list-group-item list-group-item-action list-group-item-light"><?php echo e($newestArticle->get(1)->title); ?></a>
                        <a href="<?php echo e(route('user.show_article', ['article' => $newestArticle->get(2)->id])); ?>"style="border:none;" class="btn list-group-item list-group-item-action list-group-item-light"><?php echo e($newestArticle->get(2)->title); ?></a>
                        <a href="<?php echo e(route('user.newestArticles')); ?>" style="border:none;" class="text-center text-primary btn list-group-item list-group-item-action list-group-item-light">view all...</a>

                    </div>
                </div>
                <div class="row mt-5">
                    <div class="list-group">
                        <h6 class=" list-group-item list-group-item-action text-white" style="background-color: rgb(47, 125, 235)">Best Articles</h6>
                        <a href="<?php echo e(route('user.show_article', ['article' => $bestArticles->get(0)->id])); ?>" style="border:none" class="btn list-group-item list-group-item-action list-group-item-light"><?php echo e($bestArticles->get(0)->title); ?></a>
                        <a href="<?php echo e(route('user.show_article', ['article' => $bestArticles->get(0)->id])); ?>"style="border:none;" class="btn list-group-item list-group-item-action list-group-item-light"><?php echo e($bestArticles->get(1)->title); ?></a>
                        <a href="<?php echo e(route('user.show_article', ['article' => $bestArticles->get(0)->id])); ?>"style="border:none;" class="btn list-group-item list-group-item-action list-group-item-light"><?php echo e($bestArticles->get(2)->title); ?></a>
                        <a href="<?php echo e(route('user.bestArticles')); ?>"style="border:none;" class="text-center text-primary btn list-group-item list-group-item-action list-group-item-light">view all...</a>

                    </div>
                </div>
                <div class="row mt-5">
                    <div class="list-group">
                        <h6 class=" list-group-item list-group-item-action text-white" style="background-color: rgb(47, 125, 235)">Best Writers</h6>
                        <a href="<?php echo e(route('user.dashbord', ['user' => $bestWriters->get(0)->id])); ?>" style="border:none" class="btn list-group-item list-group-item-action list-group-item-light"><?php echo e($bestWriters->get(0)->name); ?></a>
                        <a href="<?php echo e(route('user.dashbord', ['user' => $bestWriters->get(1)->id])); ?>"style="border:none;" class="btn list-group-item list-group-item-action list-group-item-light"><?php echo e($bestWriters->get(1)->name); ?></a>
                        <a href="<?php echo e(route('user.dashbord', ['user' => $bestWriters->get(2)->id])); ?>"style="border:none;" class="btn list-group-item list-group-item-action list-group-item-light"><?php echo e($bestWriters->get(2)->name); ?></a>
                        <a href="<?php echo e(route('user.bestWriters')); ?>"style="border:none;" class="text-center text-primary btn list-group-item list-group-item-action list-group-item-light">view all...</a>

                    </div>
                </div>
             </div>
        </div>
      </div>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/home.blade.php ENDPATH**/ ?>