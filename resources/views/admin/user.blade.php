@extends('admin.menus')
@section('user')
@php

$title = 'User';
$menu = \App\menu::where('link', request()->path())->first();

@endphp
<form method="POST" action="{{route('add.user')}}">
	@csrf
	<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Tambah User baru</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
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
						<input value="{{ old('name') }}" type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Tidak boleh kosong">
					</div>
					<div class="form-group col-12">
						<label>Password</label>
						<input value="{{ old('password') }}" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Tidak boleh kosong">
					</div>
					<div class="form-group col-12">
						<label>TTL</label>
						<input value="{{ old('ttl') }}" type="text" name="ttl" class="form-control @error('ttl') is-invalid @enderror" placeholder="Tidak boleh kosong">
					</div>
					<div class="form-group col-12">
						<label>Email</label>
						<input value="{{ old('email') }}" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Tidak boleh kosong">
					</div>
					<div class="form-group col-12">
						<label>Deskripsi</label>
						<textarea name="description" class="form-control @error('description') is-invalid @enderror" style="height: 200px;" placeholder="Tidak boleh kosong">{{ old('description') }}</textarea>
					</div>
					<div class="form-group col-12">
						<label>Link Facebook</label>
						<input value="{{ old('facebook') }}" type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" placeholder="boleh kosong">
					</div>
					<div class="form-group col-12">
						<label>Link Instagram</label>
						<input value="{{ old('instagram') }}" type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" placeholder="boleh kosong">
					</div>
					<div class="form-group col-12">
						<label>Link Twitter</label>
						<input value="{{ old('twitter') }}" type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" placeholder="boleh kosong">
					</div>
					<div class="form-group col-12">
						<label>nomor whatsapp</label>
						<input value="{{ old('whatsapp') }}" type="text" name="whatsapp" class="form-control @error('whatsapp') is-invalid @enderror" placeholder="boleh kosong">
					</div>
					<div class="form-group col-12">
						<label>Link github</label>
						<input value="{{ old('github') }}" type="text" name="github" class="form-control @error('github') is-invalid @enderror" placeholder="boleh kosong">
					</div>
					<div class="form-group col-12">
						<label>Link linkedin</label>
						<input value="{{ old('linkedin') }}" type="text" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" placeholder="boleh kosong">
					</div>
					<div class="form-group col-12">
						<label>Link youtube</label>
						<input value="{{ old('youtube') }}" type="text" name="youtube" class="form-control @error('youtube') is-invalid @enderror" placeholder="boleh kosong">
					</div>
					<div class="form-group col-12">
						<label>Link owncv</label>
						<input value="{{ old('owncv') }}" type="text" name="owncv" class="form-control @error('owncv') is-invalid @enderror" placeholder="boleh kosong">
					</div>
					<div class="form-group col-12">
						<label>Role</label>
						<select name="role" class="form-control">
							<option value="1">Author</option>
							<option value="2">Admin</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="mt-2 btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="mt-2 btn btn-primary">Buat</button>
				</div>
			</div>
		</div>
	</div>
</form>
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
			{!! $menu->icon !!}
			{{ $menu->menu }} <button class="mt-2 btn btn-primary ml-3" data-toggle="modal" data-target="#createUser">Tambah User baru</button>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td>
								PP
							</td>
							<td>
								Nama
							</td>
							<td>
								Post
							</td>
							<td>
								Status & Aksi
							</td>
						</tr>
					</thead>
					
					<tbody>
						@foreach($data['user'] as $user)
						<tr>
							<td>
								<div class="modal fade" id="aktif{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<form method="POST" action="{{ url('admin/user/'.$user->id) }}">
													@csrf
													@method('put')
													<input type="hidden" name="type" value="aktif">
													@if($user->is_active == 1)
													Anda ingin Menonaktifkan {{$user->name}}?
													<input type="hidden" name="is_active" value="0">
													<button class="mt-2 btn btn-primary">Nonaktifkan</button>
													@else
													Anda ingin Mengaktifkan {{$user->name}}?
													<input type="hidden" name="is_active" value="1">
													<button class="mt-2 btn btn-primary">Aktifkan</button>
													@endif
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- ======================================================================= -->
								<div class="modal fade" id="role{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<form method="POST" action="{{ url('admin/user/'.$user->id) }}">
													@csrf
													@method('put')
													<input type="hidden" name="type" value="role">
													Anda ingin mengubah {{$user->name}} menjadi 
													@if($user->role == 1) <input type="hidden" name="role" value="2"> Admin? 
													@else <input type="hidden" name="role" value="1"> Author? 
													@endif
													<button type="submit" class="btn btn-primary">Ya</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- ==================================================================== -->
								<div class="modal fade" id="del{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<form method="POST" action="{{ url('admin/user/'.$user->id) }}">
													@csrf
													@method('delete')
													Anda ingin menghapus {{ $user->name }}
													<button type="submit" class="btn btn-primary">Ya</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<img class="author" src="{{ asset('storage/'.$user->profil_image) }}"/>
							</td>
							<td>
								<strong>{{ $user->name }}</strong> | <div class="badge badge-danger">@if($user->role == 1) Author @else Admin @endif</div>
								@if($user->facebook != null)
								<a href="{!! $user->facebook !!}" class="p-2 badge badge-dark"><span class="fa fa-facebook"></span></a>
								@endif
								@if($user->instagram != null)
								<a href="{!! $user->instagram !!}" class="p-2 badge badge-dark"><span class="fa fa-instagram"></span></a>
								@endif
								@if($user->twitter != null)
								<a href="{!! $user->twitter !!}" class="p-2 badge badge-dark"><span class="fa fa-twitter"></span></a>
								@endif
								@if($user->whatsapp != null)
								<a href="{!! $user->whatsapp !!}" class="p-2 badge badge-dark"><span class="fa fa-whatsapp"></span></a>
								@endif
								@if($user->github != null)
								<a href="{!! $user->github !!}" class="p-2 badge badge-dark"><span class="fa fa-github"></span></a>
								@endif
								@if($user->linkedin != null)
								<a href="{!! $user->linkedin !!}" class="p-2 badge badge-dark"><span class="fa fa-linkedin"></span></a>
								@endif
								@if($user->youtube != null)
								<a href="{!! $user->youtube !!}" class="p-2 badge badge-dark"><span class="fa fa-youtube"></span></a>
								@endif
								@if($user->owncv != null)
								<a href="{!! $user->owncv !!}" class="p-2 badge badge-dark"><span class="fa fa-link"></span></a>
								@endif
							</td>
							<td>
								<div class="badge badge-primary">{{ \App\blog::where('author', $user->id)->count() }}</div> Post
							</td>
							<td>
								@if($user->is_active == 1)
								<button class="mt-2 btn btn-success" data-toggle="modal" data-target="#aktif{{$user->id}}">Aktif</button>
								@else
								<button class="mt-2 btn btn-secondary" data-toggle="modal" data-target="#aktif{{$user->id}}">Nonaktif</button>
								@endif
								<a href="{{ url('admin/user/'.$user->id) }}" class="mt-2 btn btn-primary">Edit</a>
								<a href="{{ url('about/person/'.$user->id) }}" class="mt-2 btn btn-dark"><i class="fa fa-eye"></i></a>
								<button class="mt-2 btn btn-info" data-toggle="modal" data-target="#role{{$user->id}}">
									@if($user->role == 1)
										Author
									@else
										Admin
									@endif
								</button>
								<button class="mt-2 btn btn-danger" data-toggle="modal" data-target="#del{{$user->id}}">Hapus</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer small text-muted">Copyright &copy; 2020 Muhamad fajar anggara </div>
	</div>
</div>
@endsection