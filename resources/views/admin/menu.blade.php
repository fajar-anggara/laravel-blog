@extends('admin.menus')
@section('createMenu')
@php

$title = 'Menu';

@endphp
<form method="POST" action="{{route('add.menu')}}">
	@csrf
	<div class="modal fade" id="createMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Buat Menu baru</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					@error('menu')
	      	<div class="alert alert-danger" role="alert">
					  <strong>{{$message}}</strong>
					</div>
					@enderror
					@error('icon')
	      	<div class="alert alert-danger" role="alert">
					  <strong>{{$message}}</strong>
					</div>
					@enderror
					@error('link')
	      	<div class="alert alert-danger" role="alert">
					  <strong>{{$message}}</strong>
					</div>
					@enderror
					<div class="form-group col-12">
						<label>Nama Menu</label>
						<input value="{{ old('menu') }}" type="text" name="menu" class="form-control @error('menu') is-invalid @enderror">
					</div>
					<div class="form-group col-12">
						<label>Icon Menu</label>
						<input value="{{ old('icon') }}" type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" placeholder="Harus FontAwesome">
					</div>
					<div class="form-group col-12">
						<label>Link Menu</label>
						<input value="{{ old('link') }}" type="text" name="link" class="form-control @error('link') is-invalid @enderror" placeholder="Harus sama dengan Route">
					</div>
					<div class="form-group col-12">
						<label>Untuk siapa</label>
						<select name="role" class="form-control"  >
							<option value="1">Author</option>
							<option value="2">Admin</option>
						</select>
					</div>
					<div class="form-group col-12">
						<label>Langsung aktif ?</label>
						<select name="is_active" class="form-control"  >
							<option value="1">Aktif</option>
							<option value="2">Nonaktif</option>
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
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td>
								Aksi
							</td>
							<td>
								Ikon
							</td>
							<td>
								Nama
							</td>
							<td>
								Role
							</td>
							<td>
								Status
							</td>
						</tr>
					</thead>
					
					<tbody>
						@foreach($data['menus'] as $menu)
						<tr>
							<td>
								<!-- =============================================================== -->
								<form method="POST" action="{{url('admin/menu/'.$menu->id)}}">
									@csrf
									@method('put')
									<input type="hidden" name="id" value="{{$menu->id}}">
									<div class="modal fade" id="editMenu{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalCenterTitle">Edit menu {{$menu->menu}}</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="form-group col-12">
														<input type="text" name="id" class="form-control" value="{{$menu->menu}}" readonly>
													</div>
													<div class="form-group col-12">
														<label>Ganti nama Menu</label>
														<input type="text" name="menu" class="form-control" value="{{$menu->menu}}">
													</div>
													<div class="form-group col-12">
														<label>Ganti icon Menu</label>
														<input type="text" name="icon" class="form-control" value="{{$menu->icon}}">
													</div>
													<div class="form-group col-12">
														<label>Link</label>
														<input type="text" name="link" class="form-control" value="{{$menu->link}}">
													</div>
													<div class="form-group col-12">
														<label>Edit role Menu</label>
														<select name="role" class="form-control">
															<option value="1">Author</option>
															<option value="2">Admin</option>
														</select>
													</div>
													<div class="form-group col-12">
														<label>
															@if($menu->is_active == 1)
															Nonaktifkan Menu {{$menu->menu}} ?
															@else
															Aktifkan Menu {{$menu->menu}} ?
															@endif
														</label>
														<select name="is_active" class="form-control">
															@if($menu->is_active == 1)
															<option value="1">Aktifkan</option>
															<option value="2" selected>Nonaktifkan</option>
															@else
															<option value="1" selected>Aktifkan</option>
															<option value="2">Nonaktifkan</option>
															@endif
														</select>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="mt-2 btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" name="edit" class="mt-2 btn btn-primary">Terapkan editan</button>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form method="POST" action="{{url('admin/menu/'.$menu->id)}}">
									@csrf
									@method('delete')
									<input type="hidden" name="id" value="{{$menu->id}}">
									<div class="modal fade" id="deleteMenu{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-body">
													<p>Anda yakin ingin menghapus Menu {{$menu->menu}} ?</p>
													<button type="button" class="mt-2 btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" class="mt-2 btn btn-danger">Hapus</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							<button class=" ml-2 mt-2 btn btn-info" data-toggle="modal" data-target="#editMenu{{$menu->id}}">Edit</a>
							<button class=" ml-2 mt-2 btn btn-danger" data-toggle="modal" data-target="#deleteMenu{{$menu->id}}">Hapus</button>
						</td>
						<td>
							{!!$menu->icon!!}
						</td>
						<td>
							{{$menu->menu}}
						</td>
						<td>
							@if($menu->role == 1)
							Author
							@elseif($menu->role == 2)
							Admin
							@else
							Umum
							@endif
						</td>
						<td>
							@if($menu->is_active == 1)
							<button class="mt-2 btn btn-success">Aktif</button>
							@else
							<button class="mt-2 btn btn-secondary">Nonaktif</button>
							@endif
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