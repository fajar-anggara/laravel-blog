@extends('about/template')
@section('web')
<div class="page-content">
  <div>
    <div class="profile-page">
      <div class="wrapper">
        <div class="page-header page-header-small" filter-color="green">
          <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('cv_assets/images/cc-bg-1.jpg') }}');"></div>
          <div class="container">
            <div class="content-center">
              <div class="h2 title">example web</div>
              <p class="category text-white">Website sederhana hasil latihan laravel</p><a class="btn btn-primary smooth-scroll mr-2" href="#contact" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Go</a><a class="btn btn-primary" href="#" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Source code</a>
            </div>
          </div>
          <div class="section">
            <div class="container">
              <div class="button-container"><a class="btn btn-default btn-round btn-lg btn-icon" href="#" rel="tooltip" title="Download source code"><i class="fa fa-github"></i></a></div>
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
                <div class="h4 mt-0 title">Tentang</div>
                <p>Web ini dibuat dari hasil latihan saya dalam belajar php mysql bootstrap dan laravel sehingga maaf bila banyak kesalahan disini CMIW :)</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card-body">
                <div class="h4 mt-0 title">Informasi web</div>
                <div class="row mb-3">
                  <div class="col-sm-4"><strong class="text-uppercase">Bahasa Program:</strong></div>
                  <div class="col-sm-8">PHP 7.1</div>
                </div>
                <div class="row">
                  <div class="col-sm-4"><strong class="text-uppercase">DBMS:</strong></div>
                  <div class="col-sm-8">MySql</div>
                </div>
                <div class="row mt-3">
                  <div class="col-sm-4"><strong class="text-uppercase">Framework php:</strong></div>
                  <div class="col-sm-8">Laravel 7.14.1</div>
                </div>
                <div class="row mt-3">
                  <div class="col-sm-4"><strong class="text-uppercase">UI:</strong></div>
                  <div class="col-sm-8">HTML, CSS, Bootstrap</div>
                </div>
                <div class="row mt-3">
                  <div class="col-sm-4"><strong class="text-uppercase">Template:</strong></div>
                  <div class="col-sm-8">Colorlib, Templateflip</div>
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