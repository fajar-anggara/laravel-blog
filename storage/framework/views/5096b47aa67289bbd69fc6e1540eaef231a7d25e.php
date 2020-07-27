
<?php $__env->startSection('recomend'); ?>
<?php

$data['keyword'] = null;
$title = 'Home';
$author = \App\user::where('id', 1)->first();

?>
<section class="site-section pt-5 pb-5">
	<div class="container">
		<div>
			<div class="row">
				<div class="col-md-12">
					<!-- default slider -->
					<div class="owl-carousel owl-theme home-slider">
						<?php $__currentLoopData = $data['dipajang']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postPajangan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div>
							<a href="<?php echo e(url('blog/'.$postPajangan->id)); ?>" class="a-block d-flex align-items-center height-lg" style="background-image: url('<?php echo e(asset('storage/'.$postPajangan->thumbnail)); ?>'); ">
								<div class="text half-to-full">
									<span class="category mb-5"><?php echo e(\App\categorie::where('id', \App\blog::where('id', $postPajangan->id)->first()->categories)->first()->categori); ?></span>
									<div class="post-meta">
										
										<span class="author mr-2"><img src="<?php echo e(asset('storage/'.\App\user::where('id', \App\blog::where('id', $postPajangan->id)->first()->author)->first()->profil_image)); ?>" alt="Colorlib"> <?php echo e(\App\user::where('id', \App\blog::where('id', $postPajangan->id)->first()->author)->first()->name); ?></span>&bullet;
										<span class="mr-2">
											<?php
											echo date('d M, Y', strtotime($postPajangan->updated_at))
											?>
										</span>&bullet;
										<span class="ml-2"><span class="fa fa-eye"></span> <?php echo e($postPajangan->views); ?></span>
										
									</div>
									<h3><?php echo e($postPajangan->title); ?></h3>
									<p>
										<?php echo implode(" ", array_slice(explode(" ", \App\blog::where('id', $postPajangan->id)->first()->body), 0, 14)); ?>...
									</p></p>
								</div>
							</a>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('latestPost'); ?>
<section class="site-section py-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2 class="mb-4">Latest Posts</h2>
			</div>
		</div>
		<div class="row blog-entries">
			<div class="col-md-12 col-lg-8 main-content">
				<div class="row">
					<?php $__currentLoopData = $data['article']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $articles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-md-6">
						<a href="<?php echo e(url('blog/'.$articles->id)); ?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
							<img src="<?php echo e(asset('storage/'.$articles->thumbnail)); ?>" alt="Image placeholder">
							<div class="blog-content-body">
								<div class="post-meta">
									<span class="author mr-2"><img src="<?php echo e(asset('storage/'.\App\user::where('id', \App\blog::where('id', $articles->id)->first()->author)->first()->profil_image)); ?>" alt="Colorlib"> <?php echo e(\App\user::where('id', \App\blog::where('id', $articles->id)->first()->author)->first()->name); ?></span>&bullet;
									<span class="mr-2">
										<?php echo date('d M Y', strtotime($articles->updated_at)) ; ?>
									</span> &bullet;
									<span class="ml-2"><span class="fa fa-eye"></span> <?php echo e($articles->views); ?></span>
								</div>
								<h2><?php echo e($articles->title); ?></h2>
							</div>
						</a>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				
				
			</div>
			<?php $__env->stopSection(); ?>
			<?php $__env->startSection('sidebar2'); ?>
			<div class="col-md-12 col-lg-4 sidebar">
				<div class="sidebar-box search-form-wrap">
					<form method="POST" action="<?php echo e(route('search')); ?>" class="search-form">
						<?php echo csrf_field(); ?>
						<div class="form-group"><span class="icon fa fa-search"></span>
						<input name="searchTitle" type="text" class="form-control" id="s" placeholder="Cari apa?">
					</div>
				</form>
				
				<!-- END sidebar-box -->
				<div class="sidebar-box">
					<h3 class="heading">Post Populer</h3>
					<div class="post-entry-sidebar">
						<ul>
							<?php $__currentLoopData = $data['popularPost']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li>
								<a href="<?php echo e(url('blog/'.$popPost->id)); ?>">
									<img src="<?php echo e(asset('storage/'.$popPost->thumbnail)); ?>" alt="Image placeholder" class="mr-4">
									<div class="text">
										<h4><?php echo e($popPost->title); ?></h4>
										<div class="post-meta">
											<span class="mr-2">
												<?php
												echo date('j M Y', strtotime($popPost->updated_at)).' <i class="fa fa-eye"></i> '.$popPost->views;
												?>
											</span>
										</div>
									</div>
								</a>
							</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
				</div>
				<!-- END sidebar-box -->
				<div class="sidebar-box">
					<h3 class="heading">Categories</h3>
					<ul class="categories">
						<?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><a href="<?php echo e(url('blog/categories/'.$categories->id)); ?>"><?php echo e($categories->categori); ?><span><?php echo e($categories->post); ?></span></a></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
			</div>
			<!-- END sidebar -->
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('blog/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/blog/home.blade.php ENDPATH**/ ?>