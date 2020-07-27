@extends('admin.menus')
@section('categories')
@php

$title = 'kategori';
$menu = \App\menu::where('link', request()->path())->first();

@endphp
<form method="POST" action="{{route('add.categori')}}">
	@csrf
	<div class="modal fade" id="createCategories" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah kategori baru</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	      	@error('categori')
	      	<div class="alert alert-danger" role="alert">
					  <strong>{{$message}}</strong>
					</div>
					@enderror

	        <div class="form-group col-12">
						<label>Nama kategori</label>
						<input value="{{ old('categori') }}" type="text" name="categori" class="form-control @error('categori') is-invalid @enderror">
					</div>
					<div class="form-group col-12">
						<label>Langsung aktif ?</label>
						<select name="is_active" class="form-control">
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
			{{ $menu->menu }} <button class="mt-2 btn btn-primary ml-3" data-toggle="modal" data-target="#createCategories">Tambah kategori baru</button>
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
								Kategori
							</td>
							<td>
								Post
							</td>
							<td>
								Status
							</td>
						</tr>
					</thead>
					
					<tbody>
						@foreach($data['categories'] as $categori)
						<tr>
							<td>
							<!-- =============================================================== -->
								<form action="{{url('admin/categories/'.$categori->id)}}" method="POST">
									@csrf
									@method('put')
									<input type="hidden" name="id" value="{{$categori->id}}">
									<div class="modal fade" id="editCategories{{$categori->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered" role="document">
									    <div class="modal-content">
									      <div class="modal-body">
									      	<div class="form-group col-12">
									      		<input type="text" class="form-control" value="{{ $categori->categori }}" readonly>
													</div>
									        <div class="form-group col-12">
														<label>Ganti nama Kategori</label>
														<input type="text" name="categori" value="{{$categori->categori}}" class="form-control">
													</div>
													<div class="form-group col-12">
														<select name="is_active" class="form-control">
															@if($categori->is_active == 1)
																<option value="1">Aktifkan</option>
																<option selected value="2">Nonaktifkan</option>
															@else
																<option selected value="1">Aktifkan</option>
																<option value="2">Nonaktifkan</option>
															@endif
														</select>
													</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="mt-2 btn btn-secondary" data-dismiss="modal">Close</button>
									        <button type="submit" class="mt-2 btn btn-primary">Change</button>
									      </div>
									    </div>
									  </div>
									</div>
								</form>

								<form method="POST" action="{{url('admin/categories/'.$categori->id)}}">
									@csrf
									@method('delete')
									<input type="hidden" name="id" value="{{$categori->id}}">
									<div class="modal fade" id="hapusCategori{{$categori->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-body">
									        <p>Anda yakin ingin menghapus kategori {{$categori->categori}} ?</p>
									        <input type="hidden" name="{{$categori->id}}">
									        <button type="button" class="mt-2 btn btn-secondary" data-dismiss="modal">Close</button>
									        <button type="submit" class="mt-2 btn btn-danger">Hapus</button>
									      </div>
									    </div>
									  </div>
									</div>
								</form>
								<!-- =============================================================== -->
								<div class="justify-content-right">
									<button class=" ml-2 mt-2 btn btn-info" data-toggle="modal" data-target="#editCategories{{$categori->id}}">Edit</button>
									<button type="submit" class="ml-2 mt-2 btn btn-danger" data-toggle="modal" data-target="#hapusCategori{{$categori->id}}">Hapus</button>
								</div>
							</td>
							<td>
								<strong>{{$categori->categori}}</strong>
							</td>
							<td>
								<span class="badge badge-info">{{$categori->post}}</span> post
							</td>
							<td>
									@if($categori->is_active == 1)
								<button href="" class="mt-2 btn btn-success">
										Aktif
									@else
								<button href="" class="mt-2 btn btn-secondary">
										Nonaktif
									@endif
								</button>
								<a href="{{ url('blog/categories/'.$categori->id) }}" class="mt-2 btn btn-secondary"><i class="fa fa-eye"></i></a>
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