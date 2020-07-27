@extends('admin.menus')
@section('notifandmessage')
@php

$title = 'Pesan';
$menu = \App\menu::where('link', request()->path())->first();

@endphp
<div class="col-12 ml-auto mt-5">

	<form method="post" action="{{ route('add.message') }}">
		@csrf
		@method('post')
		<input type="hidden" name="type" value="addMessage">
		<div class="modal fade" id="makeMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<div class="form-group col-12">
		          <label>Ke</label>
		          <select class="form-control" name="target">
		          	@foreach($data['user'] as $user)
		          	<option value="{{ $user->id }}">{{ $user->name }} | @if($user->role == 1) author @else Admin @endif</option>
		          	@endforeach
		          </select>
		        </div>
		        <div class="form-group col-12">
		          <label>Pesan</label>
							<textarea class="editor" id="editor" name="message" style="height: 200px"></textarea>
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Kirim</button>
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

	<div class="card mb-3">
		<div class="card-header">
			{!! $menu->icon !!}
			{{ $menu->menu }} <button class="mt-2 btn btn-primary ml-3" data-toggle="modal" data-target="#makeMessage">Buat pesan</button>
		</div>
		<div class="card-body">
			<h3>Pesan masuk</h3><hr>
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td>
								Tanggal
							</td>
							<td>
								Dari
							</td>
							<td>
								Pesan
							</td>
							<td>
								Aksi
							</td>
						</tr>
					</thead>
					<tbody>
						@foreach($data['message'] as $message)
						<tr>
							<td>
								@php $user = \App\user::where('id', $message->from)->first(); @endphp
								<div class="modal fade" id="replyMessage{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <form method="post" action="{{ route('add.message') }}">
							      		@csrf
							      		@method('post')
								      	<div class="modal-body">
								      		<input type="hidden" name="id" value="{{ $message->id }}">
								      		<input type="hidden" name="type" value="replyMessage">
								      		<div class="form-group col-12">
									          <label>Ke</label>
									          <select class="form-control" name="target">
									          	<option value="{{ $user->id }}">{{ $user->name }} | @if($user->role == 1) author @else Admin @endif</option>
									          </select>
									        </div>
									        <div class="form-group col-12">
									          <label>Pesan</label>
														<textarea class="editor" id="editor" name="message" style="height: 200px"></textarea>
									        </div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									        <button type="submit" class="btn btn-primary">Balas</button>
									      </div>
									    </div>
									  </form>
								  </div>
								</div>
								<strong>{{ date('d-M-Y', strtotime($message->updated_at)) }}</strong>
							</td>
							<td>
								<img class="author" src="{{asset('storage/'.\App\user::where('id', $message->from)->first()->profil_image)}}">
								<strong>{{ $user->name }}</strong>
							</td>
							<td>
								@if($message->reply_from != 0)
									<strong>Balasan dari <div class="badge badge-dark">{{ \App\user::where('id', $message->reply_from)->first()->name }}</div></strong><br>
								@endif
								{!! $message->message !!}
							</td>
							<td>
								<button class="mt-2 btn btn-primary" data-toggle="modal" data-target="#replyMessage{{$message->id}}">Balas</button>
								<a href="{{ url('admin/message/dell/'.session('id').'/'.$message->id) }}" class="mt-2 btn btn-danger">Hapus</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<hr><h3>Pesan Terbaca</h3><hr>
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td>
								Tanggal
							</td>
							<td>
								Dari
							</td>
							<td>
								Pesan
							</td>
							<td>
								Aksi
							</td>
						</tr>
					</thead>
					<tbody>
						@foreach($data['messager'] as $message)
						<tr>
							<td>
								@php $user = \App\user::where('id', $message->from)->first(); @endphp
								<div class="modal fade" id="replyMessager{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <form method="post" action="{{ route('add.message') }}">
							      		@csrf
							      		@method('post')
								      	<div class="modal-body">
								      		<input type="hidden" name="id" value="{{ $message->id }}">
								      		<input type="hidden" name="type" value="replyMessage">
								      		<div class="form-group col-12">
									          <label>Ke</label>
									          <select class="form-control" name="target">
									          	<option value="{{ $user->id }}">{{ $user->name }} | @if($user->role == 1) Author @else Admin @endif</option>
									          </select>
									        </div>
									        <div class="form-group col-12">
									          <label>Pesan</label>
														<textarea class="editor" id="editor" name="message" style="height: 200px"></textarea>
									        </div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									        <button type="submit" class="btn btn-primary">Balas</button>
									      </div>
									    </div>
									  </form>
								  </div>
								</div>
								<strong>{{ date('d-M-Y', strtotime($message->updated_at)) }}</strong>
							</td>
							<td>
								<img class="author" src="{{asset('storage/'.\App\user::where('id', $message->from)->first()->profil_image)}}">
								<strong>{{ $user->name }}</strong>
							</td>
							<td>
								@if($message->reply_from != 0)
									<strong>Balasan dari <div class="badge badge-dark">{{ \App\user::where('id', $message->reply_from)->first()->name }}</div></strong><br>
								@endif
								{!! $message->message !!}
							</td>
							<td>
								<button class="mt-2 btn btn-primary" data-toggle="modal" data-target="#replyMessager{{$message->id}}">Balas</button>
								<a href="{{ url('admin/message/dell/'.session('id').'/'.$message->id) }}" class="mt-2 btn btn-danger">Hapus</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<hr><h3 class="pb-2">Pesan terkirim</h3>
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable3" width="100%" cellspacing="0">
					<thead>
						<tr>
							<td>
								Tanggal
							</td>
							<td>
								Ke
							</td>
							<td>
								Pesan
							</td>
							<td>
								Aksi
							</td>
						</tr>
					</thead>
					<tbody>
						@foreach($data['messages'] as $message)
						<tr>
							<td>
								@php $user = \App\user::where('id', $message->from)->first(); @endphp
								<strong>{{ date('d-M-Y', strtotime($message->updated_at)) }}</strong>
							</td>
							<td>
								<img class="author" src="{{asset('storage/'.\App\user::where('id', $message->target)->first()->profil_image)}}">
								<strong>{{ \App\user::where('id', \Illuminate\Support\Facades\DB::table('message')->where('id', $message->id)->first()->target)->first()->name }}</strong>
							</td>
							<td>
								@if($message->is_read == 0)
									<div class="badge badge-secondary">Belum dibaca</div><br>
								@else
									<div class="badge badge-info">Sudah dibaca</div><br>
								@endif
								@if($message->deleted_at != null)
									<div class="badge badge-danger">dihapus oleh {{ \App\user::where('id', $message->target)->first()->name }}</div><br>
								@endif
								{!! $message->message !!}
							</td>
							<td>
								<a href="{{ url('admin/message/del/'.session('id').'/'.$message->id) }}" class="mt-2 btn btn-danger">Hapus</a>
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