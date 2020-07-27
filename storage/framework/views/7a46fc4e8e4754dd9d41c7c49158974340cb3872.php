
<?php $__env->startSection('menu'); ?>
<div class="col-lg-2 col-md-5 col-sm-12 p-0" style="position: absolute; z-index: 1000">
	<div class="collapse" id="collapseExample">
		<ul class="list-group">
			<?php $__currentLoopData = $data['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(session('role') == 2): ?>
					<?php if(request()->is($menu->link)): ?>
					<li class="list-group-item active">
						<a class="text-light" href="<?php echo e(url($menu->link)); ?>">
					<?php else: ?>
					<li class="list-group-item">
						<a href="<?php echo e(url($menu->link)); ?>">
					<?php endif; ?>
							<?php echo $menu->icon; ?> <?php echo e($menu->menu); ?>

						</a>
					</li>
				<?php elseif(session('role') == 1): ?>
					<?php if($menu->role == 2): ?>

					<?php elseif($menu->role == 1): ?>
						<?php if(request()->is($menu->link)): ?>
						<li class="list-group-item active">
							<a class="text-light" href="<?php echo e(url($menu->link)); ?>">
						<?php else: ?>
						<li class="list-group-item">
							<a href="<?php echo e(url($menu->link)); ?>">
						<?php endif; ?>
								<?php echo $menu->icon; ?> <?php echo e($menu->menu); ?>

							</a>
						</li>
					<?php endif; ?>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php if(session('role') == 2): ?>
				<?php if(request()->is('admin/menu')): ?>
				<li class="list-group-item active">
					<a class="text-light" href="<?php echo e(url('admin/menu')); ?>"><i class="fa fa-bars" aria-hidden="true"></i> Menu</a>
				<?php else: ?>
				<li class="list-group-item">
					<a href="<?php echo e(url('admin/menu')); ?>"><i class="fa fa-bars" aria-hidden="true"></i> Menu</a>
				<?php endif; ?>
				</li>
			<?php else: ?> <?php endif; ?>
		</ul>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/admin/menus.blade.php ENDPATH**/ ?>