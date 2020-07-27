@extends('admin.menus')
@section('profile')
@php

$title = 'Profil';
$menu = \App\menu::where('link', request()->path())->first();
$user = $data['user'];

@endphp
<div class="col-12 ml-auto mt-5">

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
			<i class="fa fa-cog mr-3"></i> Edit profile
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<form method="POST" action="{{ url('admin/user/'.$user->id) }}" enctype="multipart/form-data">
						@csrf
						@method('put')
						<input type="hidden" name="type" value="editProfile">
						<div class="card mb-3" style="width: auto;">
							<img src="{{ asset('storage/'.$user->profil_image) }}" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Poto profil</h5>
								<div class="custom-file">
									<!-- <input type="file" name="profil_image"> -->
									<input type="file" name="profil_image" id="customFileLangHTML" class="custom-file-input @error('profil_image') is-invalid @enderror">
									<label class="btn btn-primary" for="customFileLangHTML" data-browse="Cari" style="margin-top: -30px;">Ubah poto profie</label>
								</div>
							</div>
						</div>
						@error('name')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('password')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('ttl')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('email')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('description')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('facebook')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('instagram')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('twitter')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('whatsapp')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('github')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('linkedin')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('youtube')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('owncv')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
					</div>
					<div class="col-lg-6 col-md-12">
						@error('name')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('password')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('ttl')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('email')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('description')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('facebook')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('instagram')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('twitter')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('whatsapp')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('github')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('linkedin')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('youtube')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('owncv')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						<div class="form-group col-12">
							<label>Nama User</label>
							<input value="@if(is_null(old('name'))){{$user->name}}@else{{old('name')}}@endif" type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Tidak boleh kosong">
						</div>
						<div class="form-group col-12">
							<label>Password</label>
							<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Ubah password">
						</div>
						<div class="form-group col-12">
							<label>TTL</label>
							<input value="@if(is_null(old('ttl'))){{$user->ttl}}@else{{old('ttl')}}@endif" type="text" name="ttl" class="form-control @error('ttl') is-invalid @enderror" placeholder="Tidak boleh kosong">
						</div>
						<div class="form-group col-12">
							<label>Email</label>
							<input value="@if(is_null(old('email'))){{$user->email}}@else{{old('email')}}@endif" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Tidak boleh kosong">
						</div>
						<div class="form-group col-12">
							<label>Deskripsi</label>
							<textarea name="description" class="form-control @error('description') is-invalid @enderror" style="height: 200px;" placeholder="Tidak boleh kosong">{{ old('description') }}{{ $user->description }}</textarea>
						</div>
						<div class="form-group col-12">
							<label>Link Facebook</label>
							<input value="@if(is_null(old('facebook'))){{$user->facebook}}@else{{old('facebook')}}@endif" type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" placeholder="boleh kosong">
						</div>
						<div class="form-group col-12">
							<label>Link Instagram</label>
							<input value="@if(is_null(old('instagram'))){{$user->instagram}}@else{{old('instagram')}}@endif" type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" placeholder="boleh kosong">
						</div>
						<div class="form-group col-12">
							<label>Link Twitter</label>
							<input value="@if(is_null(old('twitter'))){{$user->twitter}}@else{{old('twitter')}}@endif" type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" placeholder="boleh kosong">
						</div>
						<div class="form-group col-12">
							<label>nomor whatsapp</label>
							<input value="@if(is_null(old('whatsapp'))){{$user->whatsapp}}@else{{old('whatsapp')}}@endif" type="text" name="whatsapp" class="form-control @error('whatsapp') is-invalid @enderror" placeholder="boleh kosong">
						</div>
						<div class="form-group col-12">
							<label>Link github</label>
							<input value="@if(is_null(old('github'))){{$user->github}}@else{{old('github')}}@endif" type="text" name="github" class="form-control @error('github') is-invalid @enderror" placeholder="boleh kosong">
						</div>
						<div class="form-group col-12">
							<label>Link linkedin</label>
							<input value="@if(is_null(old('linkedin'))){{$user->linkedin}}@else{{old('linkedin')}}@endif" type="text" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" placeholder="boleh kosong">
						</div>
						<div class="form-group col-12">
							<label>Link youtube</label>
							<input value="@if(is_null(old('youtube'))){{$user->youtube}}@else{{old('youtube')}}@endif" type="text" name="youtube" class="form-control @error('youtube') is-invalid @enderror" placeholder="boleh kosong">
						</div>
						<div class="form-group col-12">
							<label>Link Portfolio sendiri</label>
							<input value="@if(is_null(old('owncv'))){{$user->owncv}}@else{{old('owncv')}}@endif" type="text" name="owncv" class="form-control @error('owncv') is-invalid @enderror" placeholder="boleh kosong">
						</div>
						<div class="form-group col-12">
							<button type="submit" class="btn btn-primary form-control" style="width:100%;">Simpan Perubahan</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="card-footer small text-muted">Copyright &copy; 2020 Muhamad fajar anggara </div>
	</div>
</div>
@endsection