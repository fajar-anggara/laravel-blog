@extends('admin/menus')
@section('editPost')
@php
$title = 'edit';
$article = $data['article'];
$categori = $data['categori'];
$author = $data['author'];

@endphp
<div class="col-12 mt-5" style="">

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

	<div class="modal fade" id="deletePost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	      	<form method="POST" action="{{url('admin/post/'.$article->id)}}">
						@csrf
						@method('delete')
		        <p>Anda yakin ingin menghapus postingan ini ?</p>
		        <input type="hidden" name="id" value="{{$article->id}}">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-danger">Hapus</button>
		      </form>
	      </div>
	    </div>
	  </div>
	</div>	

	<form method="POST" action="{{ url('admin/post/'.$article->id) }}" enctype="multipart/form-data">
		@csrf
		@method('put')
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit postingan <strong>{{$article->title}}</strong>
			</div>
			<div class="card-body">
				<div class="modal fade" id="changeTags" tabindex="" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="z-index: 100000">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Tambahkan Tag</h5>
							</div>
							<div class="modal-body">
								<input type="hidden" name="type" value="edit">
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>Harap hapus kembali jika tidak jadi</strong>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="form-group col-12">
									<label>Tags Sebelumnya</label>
									<input  class="form-control" type="text" name="tagsdulu" value="{{ $article->tags }}" readonly>
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
								<button type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col col-lg-6 col-md-12">
						<div class="row">
							<div class="col">
								<div class="card mb-3" style="width: 18rem;">
									<img src="{{ asset('storage/'.$article->thumbnail) }}" class="card-img-top">
									<div class="card-body">
										<p class="card-text">Thumbnail yang lama</p>
									</div>
								</div>
							</div>
							<div class="col">
								<hr>
								<div class="btn btn-secondary m-1"><i class="fa fa-eye"></i> {{$article->views}}</div> <div class="btn btn-primary m-1"><i class="fa fa-user"></i> {{$author->name}}</div> <div class="btn btn-dark m-1"><i class="fa fa-calendar"></i> @php echo date('d-F-Y', strtotime($article->created_at)) @endphp</div>
							</div>
						</div>
					</div>
					<div class="col col-lg-6 col-md-12">
						<hr>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							Maaf masih belum mendukung format gambar in blog
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Setiap Tags dan Keyword</strong> harus dipisahkan dengan <strong>KOMA (,)</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				</div>
				<hr>
				
				
				@error('title')
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
						<input value="@if(is_null(old('title'))){{$article->title}}@else{{old('title')}}@endif" type="text" name="title" class="form-control @error('title') is-invalid @enderror">
					</div>
					<div class="form-group col-md-6">
						<label>Tag</label>
						<div class="btn btn-primary form-control" data-toggle="modal" data-target="#changeTags"> Ubah Tags </div>
					</div>
					<div class="form-group col-md-6">
						<label>Kategori</label>
						<select name="categories" class="form-control">
							@foreach($data['categories'] as $categories)
							@if($categories->id == \App\blog::where('id', $article->id)->first()->categories)
							<option value="{{ $categories->id }}" selected>{{ $categori->categori }}</option>
							@else
							<option value="{{ $categories->id }}">{{ $categories->categori }}</option>
							@endif
							@endforeach
						</select>
					</div>
					<div class="form-group col-md-6 @error('keyword') is-invalid @enderror">
						<label>keyword</label>
						<input value="{{ old('keyword') }}{{ $article->keyword }}" type="text" name="keyword" class="form-control @error('keyword') is-invalid @enderror">
					</div>
					<div class="form-group col-12 py-3">
						<div class="custom-file">
							<input type="file" name="thumbnail" id="customFileLangHTML" class="custom-file-input @error('thumbnail') is-invalid @enderror">
							<label class="custom-file-label" for="customFileLangHTML" data-browse="Cari">Ubah thumbnail</label>
						</div>
					</div>
					<div class="form-group col-12">
						<textarea class="editor @error('content') is-invalid @enderror" id="editor" name="content" style="height: 500px;">
						{{ old('content') }}{{ $article->body }}
						</textarea>
					</div>
				</div>
				<button type="submit" name="edit" class="btn btn-primary">Simpan</button>
				<div class="btn btn-danger" data-toggle="modal" data-target="#deletePost">Hapus</div>
			</div>
			<div class="card-footer small text-muted">Copyright &copy; 2020 Muhamad fajar anggara </div>
		</div>
	</form>
</div>
@endsection