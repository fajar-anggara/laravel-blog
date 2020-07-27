@extends('admin.menus')
@section('adminPost')
@php

$title = 'Post';
$menu = \App\menu::where('link', request()->path())->first();

@endphp
<div class="col-12 mt-5" style="">
	<form method="POST" action="{{route('add.post')}}" enctype="multipart/form-data">
		@csrf
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
							<input value="{{ old('tag1') }}" type="text" name="tag1" class="form-control @error('tag1') is-invalid @enderror" placeholder="Tag ke 1">
						</div>
						<div class="form-group col-12">
							<input value="{{ old('tag2') }}" type="text" name="tag2" class="form-control @error('tag2') is-invalid @enderror" placeholder="Tag ke 2">
						</div>
						<div class="form-group col-12">
							<input value="{{ old('tag3') }}" type="text" name="tag3" class="form-control @error('tag3') is-invalid @enderror" placeholder="Tag ke 3">
						</div>
						<div class="form-group col-12">
							<input value="{{ old('tag4') }}" type="text" name="tag4" class="form-control @error('tag4') is-invalid @enderror" placeholder="Tag ke 4">
						</div>
						<div class="form-group col-12">
							<input value="{{ old('tag5') }}" type="text" name="tag5" class="form-control @error('tag5') is-invalid @enderror" placeholder="Tag ke 5">
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
						@error('title')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('tags')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('keyword')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('thumbnail')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						@error('content')
						<div class="alert alert-danger" role="alert">
							<strong>{{$message}}</strong>
						</div>
						@enderror
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Judul</label>
								<input value="{{ old('title') }}" type="text" name="title" class="form-control @error('title') is-invalid @enderror">
							</div>
							<div class="form-group col-md-6">
								<label>Tag</label>
								<div class="mt-2 btn btn-primary form-control" data-toggle="modal" data-target="#addTags"> Tambahkan Tags </div>
							</div>
							<div class="form-group col-md-6">
								<label>Kategori</label>
								<select name="categories" class="form-control">
									@foreach($data['categories'] as $categories)
									<option value="{{ $categories->id }}">{{ $categories->categori }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-6 @error('keyword') is-invalid @enderror">
								<label>keyword</label>
								<input value="{{ old('keyword') }}" type="text" name="keyword" class="form-control @error('keyword') is-invalid @enderror">
							</div>
							<div class="form-group col-12 py-3">
								<div class="custom-file">
									<!-- <input type="file" name="thumbnail"> -->
									<input type="file" name="thumbnail" id="customFileLangHTML" class="custom-file-input @error('thumbnail') is-invalid @enderror">
									<label class="custom-file-label" for="customFileLangHTML" data-browse="Cari">Pilih file untuk Thumbnail</label>
								</div>
							</div>
							<div class="form-group col-12">
								<textarea class="editor @error('content') is-invalid @enderror" id="editor" name="content" style="height: 500px;">{{ old('content') }}</textarea>
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

	<div class="alert alert-success alert-dismissible fade show" role="alert">
		Harap selalu menganti pajangan setiap hari
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="card mb-3">
		<div class="card-header">
			{!! $menu->icon !!}
			{{ $menu->menu }}<button class="mt-2 btn btn-primary ml-3 align-item-right" data-toggle="modal" data-target="#createNewPost">Buat postingan baru</button>
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
						@foreach($data['article'] as $article)
						<tr>
							<td>
								<strong>
								@php
									echo date('j-m-Y', strtotime($article->updated_at));
								@endphp
								</strong>
							</td>
							<td>
								<a href="{{ url('blog/'.$article->id) }}"><strong>{{$article->title}}</strong></a> | <span class="badge badge-info">
									@php 
										echo \App\categorie::where('id', $article->categories)->first()->categori;
									@endphp
								</span> | <i class="fa fa-eye"></i> <div class="badge badge-dark">{{ $article->views }}</div> | @if($article->is_recomended == 1) <div class="badge badge-primary">Dipajang</div> @endif
							</td>
							<td>
								<strong>{{ \App\user::where('id', $article->author)->first()->name }}</strong>
							</td>
							<td>
								<div class="modal fade" id="deletePost{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-body">
								      	<form method="POST" action="{{url('admin/post/'.$article->id)}}">
													@csrf
													@method('delete')
									        <p>Anda yakin ingin menghapus postingan ini ?</p>
									        <input type="hidden" name="id" value="{{$article->id}}">
									        <button type="button" class="mt-2 btn btn-secondary" data-dismiss="modal">Close</button>
									        <button type="submit" class="mt-2 btn btn-danger">Hapus</button>
									      </form>
								      </div>
								    </div>
								  </div>
								</div>
								<div class="modal fade" id="pajang{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-body">
								      	<form method="POST" action="{{url('admin/post/'.$article->id)}}">
													@csrf
													@method('put')
									        <p>Anda yakin ingin memajang postingan ni di homepage ?</p>
									        <input type="hidden" name="id" value="{{$article->id}}">
									        <input type="hidden" name="type" value="pajang">
									        @if($article->is_recomended == 1)
									        	<input type="hidden" name="pajangkah" value="0">
									        @else 
									        	<input type="hidden" name="pajangkah" value="1">
									        @endif
									        <button type="button" class="mt-2 btn btn-secondary" data-dismiss="modal">Close</button>
									        <button type="submit" name="pajang" class="mt-2 btn btn-danger">
									        	@if($article->is_recomended == 1)
										        	Hapus dari pajangan
										        @else 
										        	Pajang
										        @endif
									        </button>
									      </form>
								      </div>
								    </div>
								  </div>
								</div>
								<!-- ============================================= -->
								<a href="{{url('admin/post/'.$article->id)}}" class="mt-2 btn btn-success justify-content-end">Edit</a> <button class="mt-2 btn btn-danger" data-toggle="modal" data-target="#deletePost{{$article->id}}">Hapus</button> <button class="mt-2 btn btn-secondary" data-toggle="modal" data-target="#pajang{{$article->id}}">@if($article->is_recomended == 1)batal pajang @else Pajang @endif</button>
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