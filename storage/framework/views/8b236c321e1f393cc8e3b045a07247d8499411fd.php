<!doctype html>
<html lang="en">
  <head>
    <title>
      <?php echo e($title); ?>

    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('blog_assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('blog_assets/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('blog_assets/css/owl.carousel.min.css')); ?>">
    <?php if($data['keyword']): ?>
      <?php $__currentLoopData = $data['keyword']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <meta keyword="<?php echo e($keyword); ?>">
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?> <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('blog_assets/fonts/fontawesome/css/font-awesome.min.css')); ?>">
    <!-- Theme Style -->
    <link rel="stylesheet" href="<?php echo e(asset('blog_assets/css/style.css')); ?>">

    <style type="text/css">
      body{ margin:0;padding:0;}.bg{z-index:999;position:fixed;background-color:white;width:100%;height:100%;}.center{z-index:1000; position:absolute;top:40%;left:50%;transform:translate(-50%,-50%);}.uel{margin:0;padding:0;position:relative;width:400px;height:240px;overflow:hidden;border-bottom:1px solid rgba(0,0,0,.2);}.uel .eli{list-style:none;border-radius:50%;border:15px solid #000;position:absolute;top:100%;left:50%;border-bottom-color:transparent !important;border-left-color:transparent !important;box-shadow:0 0 10px rgba(0,0,0,.5);animation:animate 5s infinite alternate;transform:translate(-50%,-50%);}.uel .eli:nth-child(1){width:60px;height:60px;border-color:#FF0000;animation-delay:.2s;}.uel .eli:nth-child(2){width:90px;height:90px;border-color:#FF7F00;animation-delay:.4s;}.uel .eli:nth-child(3){width:120px;height:120px;border-color:#FFFF00;animation-delay:.6s;}.uel .eli:nth-child(4){width:150px;height:150px;border-color:#00FF00;animation-delay:.8s;}.uel .eli:nth-child(5){width:180px;height:180px;border-color:#0000FF;animation-delay:1s;}.uel .eli:nth-child(6){width:210px;height:210px;border-color:#4B0082;animation-delay:1.2s;}.uel .eli:nth-child(7){width:240px;height:240px;border-color:#9400D3;animation-delay:1.4s;}@keyframes  animate{0%{transform:translate(-50%,-50%) rotate(-45deg);}100%{transform:translate(-50%,-50%) rotate(315deg);}}.owl-carousel .own-stage,.owl-carousel.owl-drag .owl-item{-ms-touch-action:auto;touch-action:auto;}
    </style>
  </head>
  <body>
    <div id="preloader" class="bg">
      <div class="center">
        <ul class="uel">
          <li class="eli"></li>
          <li class="eli"></li>
          <li class="eli"></li>
          <li class="eli"></li>
          <li class="eli"></li>
          <li class="eli"></li>
          <li class="eli"></li>
        </ul>
      </div>
    </div>
    <div class="wrap">
      <header role="banner">
        
        <div class="container logo-wrap">
          <div class="row pt-5">
            <div class="col-12 text-center">
              <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
              <h1 class="site-logo"><a href="<?php echo e(url('/')); ?>">Example</a></h1>
            </div>
          </div>
        </div>
        
        <nav class="navbar navbar-expand-md  navbar-light bg-light">
          <div class="container">
            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="<?php echo e(url('/')); ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown05">
                    <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="dropdown-item" href="<?php echo e(url('blog/categories/'.$categories->id)); ?>"><?php echo e($categories->categori); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(route('about.web')); ?>">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(route('about.contact')); ?>">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(url('admin/')); ?>">Login</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

      <?php echo $__env->yieldContent('blogContent'); ?>
      <?php echo $__env->yieldContent('sidebar1'); ?>
      <?php echo $__env->yieldContent('relatedPost'); ?>
      <?php echo $__env->yieldContent('recomend'); ?>
      <?php echo $__env->yieldContent('latestPost'); ?>
      <?php echo $__env->yieldContent('categories'); ?>
      <?php echo $__env->yieldContent('search'); ?>
      <?php echo $__env->yieldContent('sidebar2'); ?>

      <footer class="site-footer">
        <div class="container">
          
          <div class="row">
            <div class="col-md-12 text-center">
              <p class="small">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved | This template is made with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    
    <script src="<?php echo e(asset('blog_assets/js/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('blog_assets/js/jquery-migrate-3.0.0.js')); ?>"></script>
    <script src="<?php echo e(asset('blog_assets/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('blog_assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('blog_assets/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('blog_assets/js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('blog_assets/js/jquery.stellar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('blog_assets/js/main.js')); ?>"></script>

    <script>
      $(document).ready(function(){
        $('#preloader').delay(50).fadeOut();
      })
    </script>
  </body>
</html><?php /**PATH C:\xampp\htdocs\laravel\resources\views/blog/template.blade.php ENDPATH**/ ?>