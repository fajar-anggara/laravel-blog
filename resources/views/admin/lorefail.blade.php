@extends('admin/template')
@section('lorefail')
@php

$title = 'Welcome';

@endphp
<div class="col-3"></div>
<div class="col-lg-6 col-sm-12 ml-auto mt-5" id="dLogin">
  @if($errors->any())
  <div class="alert alert-danger" role="alert">
    Input anda tidak memenuhi validasi kami <strong>Harap ulangi aksi tadi, dan input kebali</strong>
  </div>
  @endif
  @if(session('response'))
  <div class="alert alert-danger" role="alert">
    {!! session('response') !!}
  </div>
  @endif
  @if(session('success'))
  <div class="alert alert-success" role="alert">
    {!! session('success') !!}
  </div>
  @endif
  <div class="card mb-3">
    <div class="card-header">
      <div class="text-muted text-center">Welcome to admin page</div>
    </div>
    <div class="card-body">
      <form method="POST" action="{{url('admin/')}}">
        @csrf
        @method('post')
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
  @if(session('response'))
  <div class="alert alert-danger" role="alert">
    {!! session('response') !!}
  </div>
  @endif
  <div class="card mb-3">
    <div class="card-header">
      <div class="text-muted text-center">Welcome to admin page</div>
    </div>
    <div class="card-body">
      <h4 class="text-center">Register</h4>
      
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
      <form method="POST" action="{{ url('admin/') }}">
        @csrf
        @method('post')
        <input type="hidden" name="type" value="inputRegister">
        <div class="form-group col-12">
          <label>Nama User</label>
          <input value="{{ old('name') }}" type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Tidak boleh kosong">
        </div>
        <div class="form-group col-12">
          <label>Password</label>
          <input value="{{ old('password') }}" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Tidak boleh kosong">
        </div>
        <div class="form-group col-12">
          <label>TTL </label><label class="text-muted ml-2">(Tempat, dd-mm-yy)</label>
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
          <label>Link website sendiri</label>
          <input value="{{ old('owncv') }}" type="text" name="owncv" class="form-control @error('owncv') is-invalid @enderror" placeholder="boleh kosong">
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
@endsection