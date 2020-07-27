
<?php $__env->startSection('lorefail'); ?>
<?php

$title = 'Welcome';

?>
<div class="col-3"></div>
<div class="col-lg-6 col-sm-12 ml-auto mt-5" id="dLogin">
  <?php if(session('response')): ?>
  <div class="alert alert-danger" role="alert">
    <?php echo session('response'); ?>

  </div>
  <?php endif; ?>
  <?php if(session('success')): ?>
  <div class="alert alert-success" role="alert">
    <?php echo session('success'); ?>

  </div>
  <?php endif; ?>
  <div class="card mb-3">
    <div class="card-header">
      <div class="text-muted text-center">Welcome to admin page</div>
    </div>
    <div class="card-body">
      <form method="POST" action="<?php echo e(url('admin/')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('post'); ?>
        <input type="hidden" name="type" value="inputLogin">
        <h4 class="text-center">Login</h4>
        <div class="form-group col-12">
          <label>Name / Email</label>
          <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group col-12">
          <label>Password</label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group col-12 text-center pt-4">
          <button type="submit" class="mt-2 btn btn-primary" style="width: 100%">Login</button>
        </div>
      </form>
      <div class="form-group col-12 text-center pt-4">
        <button id="register" type="submit" class="mt-2 btn btn-danger" style="width: 100%">Register</button>
      </div>
    </div>
    <div class="card-footer small text-muted">
      Copyright &copy; 2020 Muhamad fajar anggara
    </div>
  </div>
</div>
<div class="col-3"></div>
<div class="col-3"></div>
<div class="col-lg-6 col-sm-12 ml-auto mt-5 none" id="dRegister">
  <?php if(session('response')): ?>
  <div class="alert alert-danger" role="alert">
    <?php echo session('response'); ?>

  </div>
  <?php endif; ?>
  <div class="card mb-3">
    <div class="card-header">
      <div class="text-muted text-center">Welcome to admin page</div>
    </div>
    <div class="card-body">
      <h4 class="text-center">Register</h4>
      
      <?php $__errorArgs = ['name'];
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
      <?php $__errorArgs = ['password'];
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
      <?php $__errorArgs = ['ttl'];
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
      <?php $__errorArgs = ['email'];
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
      <?php $__errorArgs = ['description'];
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
      <?php $__errorArgs = ['facebook'];
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
      <?php $__errorArgs = ['instagram'];
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
      <?php $__errorArgs = ['twitter'];
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
      <?php $__errorArgs = ['whatsapp'];
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
      <?php $__errorArgs = ['github'];
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
      <?php $__errorArgs = ['linkedin'];
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
      <?php $__errorArgs = ['youtube'];
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
      <?php $__errorArgs = ['owncv'];
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
      <form method="POST" action="<?php echo e(url('admin/')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('post'); ?>
        <input type="hidden" name="type" value="inputRegister">
        <div class="form-group col-12">
          <label>Nama User</label>
          <input value="<?php echo e(old('name')); ?>" type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Tidak boleh kosong">
        </div>
        <div class="form-group col-12">
          <label>Password</label>
          <input value="<?php echo e(old('password')); ?>" type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Tidak boleh kosong">
        </div>
        <div class="form-group col-12">
          <label>TTL </label><label class="text-muted ml-2">(Tempat, dd-mm-yy)</label>
          <input value="<?php echo e(old('ttl')); ?>" type="text" name="ttl" class="form-control <?php $__errorArgs = ['ttl'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Tidak boleh kosong">
        </div>
        <div class="form-group col-12">
          <label>Email</label>
          <input value="<?php echo e(old('email')); ?>" type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Tidak boleh kosong">
        </div>
        <div class="form-group col-12">
          <label>Deskripsi</label>
          <textarea name="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" style="height: 200px;" placeholder="Tidak boleh kosong"><?php echo e(old('description')); ?></textarea>
        </div>
        <div class="form-group col-12">
          <label>Link Facebook</label>
          <input value="<?php echo e(old('facebook')); ?>" type="text" name="facebook" class="form-control <?php $__errorArgs = ['facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="boleh kosong">
        </div>
        <div class="form-group col-12">
          <label>Link Instagram</label>
          <input value="<?php echo e(old('instagram')); ?>" type="text" name="instagram" class="form-control <?php $__errorArgs = ['instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="boleh kosong">
        </div>
        <div class="form-group col-12">
          <label>Link Twitter</label>
          <input value="<?php echo e(old('twitter')); ?>" type="text" name="twitter" class="form-control <?php $__errorArgs = ['twitter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="boleh kosong">
        </div>
        <div class="form-group col-12">
          <label>nomor whatsapp</label>
          <input value="<?php echo e(old('whatsapp')); ?>" type="text" name="whatsapp" class="form-control <?php $__errorArgs = ['whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="boleh kosong">
        </div>
        <div class="form-group col-12">
          <label>Link github</label>
          <input value="<?php echo e(old('github')); ?>" type="text" name="github" class="form-control <?php $__errorArgs = ['github'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="boleh kosong">
        </div>
        <div class="form-group col-12">
          <label>Link linkedin</label>
          <input value="<?php echo e(old('linkedin')); ?>" type="text" name="linkedin" class="form-control <?php $__errorArgs = ['linkedin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="boleh kosong">
        </div>
        <div class="form-group col-12">
          <label>Link youtube</label>
          <input value="<?php echo e(old('youtube')); ?>" type="text" name="youtube" class="form-control <?php $__errorArgs = ['youtube'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="boleh kosong">
        </div>
        <div class="form-group col-12">
          <label>Link website sendiri</label>
          <input value="<?php echo e(old('owncv')); ?>" type="text" name="owncv" class="form-control <?php $__errorArgs = ['owncv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="boleh kosong">
        </div>
        <input type="hidden" name="role" value="1">
        <div class="form-group col-12 text-center pt-4">
          <button type="submit" class="mt-2 btn btn-primary" style="width: 100%">Register</button>
        </div>
      </form>
      <div class="form-group col-12 text-center pt-4">
        <button id="login" type="submit" class="mt-2 btn btn-danger" style="width: 100%">Login</button>
      </div>
    </div>
    <div class="card-footer small text-muted">
      Copyright &copy; 2020 Muhamad fajar anggara
    </div>
  </div>
</div>
<div class="col-3"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\resources\views/admin/lorefail.blade.php ENDPATH**/ ?>