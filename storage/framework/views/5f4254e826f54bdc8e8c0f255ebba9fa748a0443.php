<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->

    <?php echo $__env->yieldContent('scripts'); ?>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark shadow-lg sticky-top" style="background-color: rgb(47, 125, 235)">
            <div class="container">
                <b><a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    WhitePaper
                </a></b>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                        <form action="<?php echo e(route('search')); ?>" id="search-form" class="d-flex p-2" method="GET">
                            <input class="form-control me-2" type="text" placeholder="Search" id="search" name="search">
                            <button class="btn btn-warning" style="color:white" type="submit">Search</button>
                          </form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item p-2">
                            <a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a>
                        </li>
                        <li class="nav-item p-2">
                            <a class="nav-link" href="<?php echo e(route('our_story')); ?>">Our story</a>
                        </li>
                        <li class="nav-item p-2">
                            <a class="nav-link" href="<?php echo e(route('contact_us')); ?>">Contact Us</a>
                        </li>
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item p-2">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item p-2">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown p-2">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div  data-bs-spy="scroll" class="dropdown-menu dropdown-menu-end" style="background-color:rgb(105, 156, 228)" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="<?php echo e(route('user.dashbord', ['user'=> auth()->user()->id])); ?>">
                                        dashbord
                                    </a>
                                    <a class="dropdown-item" href="<?php echo e(route('user.show_profile')); ?>">
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="<?php echo e(route('user.create_article')); ?>">
                                        Create article
                                    </a>
                                    <a class="dropdown-item" href="<?php echo e(route('user.show_myarticles')); ?>">
                                        My Articles
                                    </a>
                                    <a class="dropdown-item" href="<?php echo e(route('user.show_savedlist')); ?>">Saved articles</a>

                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                            <?php if(auth()->user()->type === 'admin'): ?>
                                <li class="nav-item p-2">
                                    <a class="nav-link" href="<?php echo e(route('admin.index')); ?>">Admin Panel</a>
                                </li>
                            <?php endif; ?>

                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>

        </main>
    </div>
</body>
</html>
<?php /**PATH E:\Web_VS_Code\projects\white-paper\resources\views/layouts/app.blade.php ENDPATH**/ ?>