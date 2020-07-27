
<?php $__env->startSection('search'); ?>
<?php

$data['keyword'] = null;
$title = 'Cari';

?>
<section class="site-section pt-5">
	<div class="container">
		<div class="row mb-4">
			<div class="col-md-6">
				<h2 class="mb-4">Cari: <?php if($data['search'] == null): ?> #<?php echo e($data['tags']); ?> <?php elseif($data['tags'] == null): ?> <?php echo e($data['search']); ?> <?php endif; ?></h2>
			</div>
		</div>
		<div class="row blog-entries">
			<div class="col-md-12 col-lg-8 main-content">
				<div class="row mb-5 mt-5">
					<div class="col-md-12">
						<?php $__currentLoopData = $data['article']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="post-entry-horzontal">
							<a href="<?php echo e(url('blog/'.$article->id)); ?>">
								<div class="image element-animate" data-animate-effect="fadeIn" style="background-image: url(<?php echo e(asset('storage/'.$article->thumbnail)); ?>);"></div>
								<span class="text">
									<div class="post-meta">
										<span class="author mr-2"><img src="<?php echo e(asset('storage/'.\App\user::where('id', \App\blog::where('id', $article->id)->first()->author)->first()->profil_image)); ?>" alt="Colorlib"> <?php echo e(\App\user::where('id', \App\blog::where('id', $article->id)->first()->author)->first()->name); ?></span>&bullet;
										<span class="mr-2">
											<?php echo e(date('d M Y', strtotime($article->updated_at))); ?>

										</span> &bullet;
										<span class="mr-2"><?php echo e($title); ?></span> &bullet;
										<span class="ml-2"><span class="fa fa-eye"></span> <?php echo e($article->views); ?></span>
									</div>
									<h2><?php echo e($article->title); ?></h2>
								</span>
							</a>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
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
			</div>
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
<?php echo $__env->make('blog/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/blog/search.blade.php ENDPATH**/ ?>