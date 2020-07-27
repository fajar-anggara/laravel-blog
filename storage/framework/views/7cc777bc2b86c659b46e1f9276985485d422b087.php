
<?php $__env->startSection('blogContent'); ?>
<?php

$article = $data['article'];
$categori = $data['categori'];
$author = $data['author'];
$title = $article->title;

?>
<section class="site-section py-lg">
	<div class="container">
		<div class="row blog-entries element-animate">
			<div class="col-md-12 col-lg-8 main-content">
				<img src="<?php echo e(asset('storage/'.$article->thumbnail)); ?>" alt="Image" class="img-fluid mb-5">
				<div class="post-meta">
					<span class="author mr-2"><img src="<?php echo e(asset('storage/'.$author->profil_image)); ?>" alt="Colorlib" class="mr-2"> <?php echo e($author->name); ?></span>|
					<span class="mr-2">
						<?php
						echo date('d M Y', strtotime($article->updated_at));
						?>
					</span>|
					<span class="ml-2">
						<span class="fa fa-eye"> <?php echo e($article->views); ?></span>
					</span>
				</div>
				<div class="mb-4"><h1><?php echo e($article->title); ?></h1></div>
				<a class="category mb-5" href="#"><?php echo e($categori->categori); ?></a>
				<div class="post-content-body">
					<?php echo $article->body; ?>

				</div>
				<div class="pt-5">
					<p>Kategori:  <a href="<?php echo e(url('blog/categories/'.$categori->id)); ?>"> <?php echo e($categori->categori); ?> </a></p>
					<p>Tags:
						<?php $__currentLoopData = $data['tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<a href="<?php echo e(url('blog/search/'.$tag)); ?>" class="tags">#<?php echo e($tag); ?></a>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</p>
					
				</div>
			</div>
			<?php $__env->stopSection(); ?>
			
			<?php $__env->startSection('sidebar1'); ?>
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
				<div class="bio text-center">
					<img src="<?php echo e(asset('storage/'.$author->profil_image)); ?>" alt="Image Placeholder" class="img-fluid">
					<div class="bio-body">
						<h2><?php echo e($author->name); ?></h2>
						<p><?php echo $author->description; ?></p>
						<p><a href="<?php echo e(url('about/person/'.$author->id)); ?>" class="btn btn-primary btn-sm rounded">Read my bio</a></p>
						<p class="social">
							<?php if($author->facebook != null): ?>
							<a href="<?php echo $author->facebook; ?>"><span class="fa fa-facebook"></span></a>
							<?php endif; ?>
							<?php if($author->instagram != null): ?>
							<a href="<?php echo $author->instagram; ?>"><span class="fa fa-instagram"></span></a>
							<?php endif; ?>
							<?php if($author->twitter != null): ?>
							<a href="<?php echo $author->twitter; ?>"><span class="fa fa-twitter"></span></a>
							<?php endif; ?>
							<?php if($author->whatsapp != null): ?>
							<a href="<?php echo $author->whatsapp; ?>"><span class="fa fa-whatsapp"></span></a>
							<?php endif; ?>
							<?php if($author->github != null): ?>
							<a href="<?php echo $author->github; ?>"><span class="fa fa-github"></span></a>
							<?php endif; ?>
							<?php if($author->linkedin != null): ?>
							<a href="<?php echo $author->linkedin; ?>"><span class="fa fa-linkedin"></span></a>
							<?php endif; ?>
							<?php if($author->youtube != null): ?>
							<a href="<?php echo $author->youtube; ?>"><span class="fa fa-youtube"></span></a>
							<?php endif; ?>
							<?php if($author->owncv != null): ?>
							<a href="<?php echo $author->owncv; ?>"><span class="fa fa-link"></span></a>
							<?php endif; ?>
						</p>
					</div>
				</div>
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
			<!-- END sidebar-box -->
			<div class="sidebar-box">
				<h3 class="heading">Tags</h3>
				<ul class="tags">
					<?php $__currentLoopData = $data['tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><a href="<?php echo e(url('blog/search/'.$tag)); ?>"><?php echo e($tag); ?></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		</div>
		<!-- END sidebar -->
	</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('relatedPost'); ?>
<section class="py-5">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="mb-3 ">Related Post</h2>
		</div>
	</div>
	<div class="row">
		<?php $__currentLoopData = $data['relatedPost']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="col-md-6 col-lg-4">
			<a href="<?php echo e(url('blog/'.$related->id)); ?>" class="a-block sm d-flex align-items-center height-md" style="background-image: url('<?php echo e(asset('storage/'.$related->thumbnail)); ?>'); ">
				<div class="text">
					<div class="post-meta">
						<span class="category">
							<?php
							echo \App\categorie::where('id', \App\blog::where('id', $related->id)->first()->categories)->first()->categori;
							?>
						</span>
						<span class="mr-2">
							<?php
							echo date('j-M-Y', strtotime($related->updated_at))
							?>
						</span> &bullet;
						<span class="ml-2"><span class="fa fa-eye"></span> <?php echo e($related->views); ?></span>
					</div>
					<h3><?php echo e($related->title); ?></h3>
				</div>
			</a>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('blog/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/blog/blog.blade.php ENDPATH**/ ?>