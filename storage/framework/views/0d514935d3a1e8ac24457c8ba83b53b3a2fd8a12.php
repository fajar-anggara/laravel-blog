
<?php $__env->startSection('adminPost'); ?>
<?php

$title = 'Post';
$menu = \App\menu::where('link', request()->path())->first();

?>
<div class="col-12 mt-5" style="">
	<form method="POST" action="<?php echo e(route('add.post')); ?>" enctype="multipart/form-data">
		<?php echo csrf_field(); ?>
		<div class="modal fade" id="addTags" tabindex="" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="z-index: 100000">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Tambahkan Tag</h5>
					</div>
					<div class="modal-body">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Harap hapus kembali jika tidak jadi</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="form-group col-12">
							<input value="<?php echo e(old('tag1')); ?>" type="text" name="tag1" class="form-control <?php $__errorArgs = ['tag1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Tag ke 1">
						</div>
						<div class="form-group col-12">
							<input value="<?php echo e(old('tag2')); ?>" type="text" name="tag2" class="form-control <?php $__errorArgs = ['tag2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Tag ke 2">
						</div>
						<div class="form-group col-12">
							<input value="<?php echo e(old('tag3')); ?>" type="text" name="tag3" class="form-control <?php $__errorArgs = ['tag3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Tag ke 3">
						</div>
						<div class="form-group col-12">
							<input value="<?php echo e(old('tag4')); ?>" type="text" name="tag4" class="form-control <?php $__errorArgs = ['tag4'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Tag ke 4">
						</div>
						<div class="form-group col-12">
							<input value="<?php echo e(old('tag5')); ?>" type="text" name="tag5" class="form-control <?php $__errorArgs = ['tag5'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Tag ke 5">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="mt-2 btn btn-primary" data-dismiss="modal">Oke</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="createNewPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable" role="document" id="widthModal">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalCenterTitle">Buat postingan baru</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							Maaf masih belum mendukung format gambar in blog
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Keyword</strong> harus dipisahkan dengan <strong>KOMA (,)</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<hr>
						<?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<div class="alert alert-danger" role="alert">
							<strong><?php echo e($message); ?></strong>
						</div>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						<?php $__errorArgs = ['tags'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<div class="alert alert-danger" role="alert">
							<strong><?php echo e($message); ?></strong>
						</div>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						<?php $__errorArgs = ['keyword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<div class="alert alert-danger" role="alert">
							<strong><?php echo e($message); ?></strong>
						</div>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						<?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<div class="alert alert-danger" role="alert">
							<strong><?php echo e($message); ?></strong>
						</div>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						<?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<div class="alert alert-danger" role="alert">
							<strong><?php echo e($message); ?></strong>
						</div>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Judul</label>
								<input value="<?php echo e(old('title')); ?>" type="text" name="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Tag</label>
								<div class="mt-2 btn btn-primary form-control" data-toggle="modal" data-target="#addTags"> Tambahkan Tags </div>
							</div>
							<div class="form-group col-md-6">
								<label>Kategori</label>
								<select name="categories" class="form-control">
									<?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($categories->id); ?>"><?php echo e($categories->categori); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
							<div class="form-group col-md-6 <?php $__errorArgs = ['keyword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
								<label>keyword</label>
								<input value="<?php echo e(old('keyword')); ?>" type="text" name="keyword" class="form-control <?php $__errorArgs = ['keyword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
							</div>
							<div class="form-group col-12 py-3">
								<div class="custom-file">
									<!-- <input type="file" name="thumbnail"> -->
									<input type="file" name="thumbnail" id="customFileLangHTML" class="custom-file-input <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
									<label class="custom-file-label" for="customFileLangHTML" data-browse="Cari">Pilih file untuk Thumbnail</label>
								</div>
							</div>
							<div class="form-group col-12">
								<textarea class="editor <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="editor" name="content" style="height: 500px;"><?php echo e(old('content')); ?></textarea>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="mt-2 btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="mt-2 btn btn-primary">Post</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<?php if($errors->any()): ?>
  <div class="alert alert-danger" role="alert">
    Input anda tidak memenuhi validasi kami <strong>Harap ulangi aksi tadi, dan input kebali</strong>
  </div>
  <?php endif; ?>
	<?php if(session('response')): ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?php echo session('response'); ?>

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php endif; ?>
	<?php if(session('success')): ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<?php echo session('success'); ?>

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php endif; ?>

	<div class="alert alert-success alert-dismissible fade show" role="alert">
		Harap selalu menganti pajangan setiap hari
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="card mb-3">
		<div class="card-header">
			<?php echo $menu->icon; ?>

			<?php echo e($menu->menu); ?><button class="mt-2 btn btn-primary ml-3 align-item-right" data-toggle="modal" data-target="#createNewPost">Buat postingan baru</button>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellpadding="0">
					<thead>
						<tr>
							<td>
								Tanggal
							</td>
							<td>
								Postingan
							</td>
							<td>
								Author
							</td>
							<td>
								Aksi
							</td>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $data['article']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
								<strong>
								<?php
									echo date('j-m-Y', strtotime($article->updated_at));
								?>
								</strong>
							</td>
							<td>
								<a href="<?php echo e(url('blog/'.$article->id)); ?>"><strong><?php echo e($article->title); ?></strong></a> | <span class="badge badge-info">
									<?php 
										echo \App\categorie::where('id', $article->categories)->first()->categori;
									?>
								</span> | <i class="fa fa-eye"></i> <div class="badge badge-dark"><?php echo e($article->views); ?></div> | <?php if($article->is_recomended == 1): ?> <div class="badge badge-primary">Dipajang</div> <?php endif; ?>
							</td>
							<td>
								<strong><?php echo e(\App\user::where('id', $article->author)->first()->name); ?></strong>
							</td>
							<td>
								<div class="modal fade" id="deletePost<?php echo e($article->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-body">
								      	<form method="POST" action="<?php echo e(url('admin/post/'.$article->id)); ?>">
													<?php echo csrf_field(); ?>
													<?php echo method_field('delete'); ?>
									        <p>Anda yakin ingin menghapus postingan ini ?</p>
									        <input type="hidden" name="id" value="<?php echo e($article->id); ?>">
									        <button type="button" class="mt-2 btn btn-secondary" data-dismiss="modal">Close</button>
									        <button type="submit" class="mt-2 btn btn-danger">Hapus</button>
									      </form>
								      </div>
								    </div>
								  </div>
								</div>
								<div class="modal fade" id="pajang<?php echo e($article->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-body">
								      	<form method="POST" action="<?php echo e(url('admin/post/'.$article->id)); ?>">
													<?php echo csrf_field(); ?>
													<?php echo method_field('put'); ?>
									        <p>Anda yakin ingin memajang postingan ni di homepage ?</p>
									        <input type="hidden" name="id" value="<?php echo e($article->id); ?>">
									        <input type="hidden" name="type" value="pajang">
									        <?php if($article->is_recomended == 1): ?>
									        	<input type="hidden" name="pajangkah" value="0">
									        <?php else: ?> 
									        	<input type="hidden" name="pajangkah" value="1">
									        <?php endif; ?>
									        <button type="button" class="mt-2 btn btn-secondary" data-dismiss="modal">Close</button>
									        <button type="submit" name="pajang" class="mt-2 btn btn-danger">
									        	<?php if($article->is_recomended == 1): ?>
										        	Hapus dari pajangan
										        <?php else: ?> 
										        	Pajang
										        <?php endif; ?>
									        </button>
									      </form>
								      </div>
								    </div>
								  </div>
								</div>
								<!-- ============================================= -->
								<a href="<?php echo e(url('admin/post/'.$article->id)); ?>" class="mt-2 btn btn-success justify-content-end">Edit</a> <button class="mt-2 btn btn-danger" data-toggle="modal" data-target="#deletePost<?php echo e($article->id); ?>">Hapus</button> <button class="mt-2 btn btn-secondary" data-toggle="modal" data-target="#pajang<?php echo e($article->id); ?>"><?php if($article->is_recomended == 1): ?>batal pajang <?php else: ?> Pajang <?php endif; ?></button>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer small text-muted">Copyright &copy; 2020 Muhamad fajar anggara </div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.menus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/admin/post.blade.php ENDPATH**/ ?>