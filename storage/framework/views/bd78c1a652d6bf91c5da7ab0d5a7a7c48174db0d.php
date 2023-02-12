<?php $__env->startSection('scripts'); ?>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <!-- nav bar -->
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #0004f9">
        <div class="container">
            <a class="navbar-brand" href="javascript:void(0)"><b style="font-size: xx-large;">FiU</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="mynavbar">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0)">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0)">ABOUT</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0)">OUR DESIGN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">SHOP</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">CONTACT US</a>
                  </li>
              </ul>
            </div>
          </div>
      </nav>

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

      </div>

      <div class="container">

        <div class="row mt-5">
           <div class="col-sm-6">

             <div class="row">
                 <h6>Top 10 Posts</h6>
             </div>

           </div>
           <div class="col-sm-6">

             <div class="row">
               <h6>Top 10 Writers</h6>
             </div>

           </div>
        </div>
        <!--for show titles and new posts and all articles-->
        <div class="row mt-5">

          <div class="col-sm-7">

          </div>

          <div class="col-sm-5">

              <div class="row">
                <h6>Titles</h6>

                </div>

                  <h6>New Posts</h6>

                </div>

          </div>
      </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/whitepaper/home.blade.php ENDPATH**/ ?>