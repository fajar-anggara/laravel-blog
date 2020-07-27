@extends('admin.menus')
@section('createMenu')
@php

$title = '';

@endphp

<div class="col-12 ml-auto pt-5">

	@if($errors->any())
  <div class="alert alert-danger" role="alert">
    Input anda tidak memenuhi validasi kami <strong>Harap ulangi aksi tadi, dan input kebali</strong>
  </div>
  @endif
	@if(session('response'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		{!!session('response')!!}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif
	@if(session('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		{!!session('success')!!}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif

	<div class="card mb-3">
		<div class="card-header">
			<i class="fa fa-bars"></i>
			Menu <button class="mt-2 btn btn-primary ml-3" data-toggle="modal" data-target="#createMenu">Tambah menu baru</button>
		</div>
		<div class="card-body">
			
		</div>
	</div>
	<div class="card-footer small text-muted">Copyright &copy; 2020 Muhamad fajar anggara </div>
</div>
</div>
@endsection