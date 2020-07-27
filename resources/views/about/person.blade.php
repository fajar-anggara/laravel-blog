@extends('about/template')
@section('person')
<!-- profile -->
<div class="page-content">
  <div>
    <div class="profile-page">
      <div class="wrapper">
        <div class="page-header page-header-small" filter-color="green">
          <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('cv_assets/images/cc-bg-1.jpg') }}');"></div>
          <div class="container">
            <div class="content-center">
              <div class="cc-profile-image"><a href="#"><img src="{{ asset('storage/'.$person->profil_image) }}" alt="Image"/></a></div>
              <div class="h2 title">{{ $person->name }}</div>
              <p class="category text-white">@if($person->role == 2) Admin @else Author @endif di example Web</p><a class="btn btn-primary smooth-scroll mr-2" href="/" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Lihat Post ku</a>
            </div>
          </div>
          <div class="section">
            <div class="container">
              <div class="button-container">
                @if($person->facebook != null)
                <a href="{!! $person->facebook !!}" class="p-2 badge badge-dark"><span class="fa fa-facebook"></span></a>
                @endif
                @if($person->instagram != null)
                <a href="{!! $person->instagram !!}" class="p-2 badge badge-dark"><span class="fa fa-instagram"></span></a>
                @endif
                @if($person->twitter != null)
                <a href="{!! $person->twitter !!}" class="p-2 badge badge-dark"><span class="fa fa-twitter"></span></a>
                @endif
                @if($person->whatsapp != null)
                <a href="{!! $person->whatsapp !!}" class="p-2 badge badge-dark"><span class="fa fa-whatsapp"></span></a>
                @endif
                @if($person->github != null)
                <a href="{!! $person->github !!}" class="p-2 badge badge-dark"><span class="fa fa-github"></span></a>
                @endif
                @if($person->linkedin != null)
                <a href="{!! $person->linkedin !!}" class="p-2 badge badge-dark"><span class="fa fa-linkedin"></span></a>
                @endif
                @if($person->youtube != null)
                <a href="{!! $person->youtube !!}" class="p-2 badge badge-dark"><span class="fa fa-youtube"></span></a>
                @endif
                @if($person->owncv != null)
                <a href="{!! $person->owncv !!}" class="p-2 badge badge-dark"><span class="fa fa-link"></span></a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section" id="about">
      <div class="container">
        <div class="card" data-aos="fade-up" data-aos-offset="10">
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card-body">
                <div class="h4 mt-0 title">Deskripsi</div>
                <p>{!! $person->description !!}</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card-body">
                <div class="h4 mt-0 title">Informasi pribadi</div>
                <div class="row">
                  <div class="col-sm-4"><strong class="text-uppercase">TTL:</strong></div>
                  <div class="col-sm-8">{{ $person->ttl }}</div>
                </div>
                <div class="row mt-3">
                  <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
                  <div class="col-sm-8">{{ $person->email }}</div>
                </div>
                <div class="row mt-3">
                  <div class="col-sm-4"><strong class="text-uppercase">Sebagai:</strong></div>
                  <div class="col-sm-8">@if($person->role == 2) Admin @else Author @endif di example Web</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
@endsection