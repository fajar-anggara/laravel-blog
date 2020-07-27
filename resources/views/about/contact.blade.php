@extends('about/template')
@section('web')
<div class="page-content">
  <div>
    <div class="profile-page">
      <div class="wrapper">
        <div class="page-header" filter-color="green">
          <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('cv_assets/images/cc-bg-1.jpg') }}');"></div>
          <div class="container">
            <div class="content-center">
              <!-- <div class="h2 title">Anggara web</div>
              <p class="category text-white">Website sederhana hasil latihan laravel</p><a class="btn btn-primary smooth-scroll mr-2" href="#contact" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Go</a><a class="btn btn-primary" href="#" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Download source code</a> -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="card" data-aos="fade-up" data-aos-offset="10" style="width: auto; align-items: center; background-color: rgba(255, 255, 255, 0.7);">
                    <div class="row">
                      <div class="col-12 p-5 text-dark">
                        <div class="card-body text-center">
                          <div class="h4 mt-0 title">Kontak saya</div>
                          <form>
                            <div class="row">
                              <div class="col">
                                <input type="text" placeholder="Nama" style="width: 100%; border-radius: 10px;  border:none ; padding: 8px; margin: 5px;">
                              </div>
                              <div class="col">
                                <input type="email" placeholder="Email" style="width: 100%; border-radius: 10px;  border:none ; padding: 8px; margin: 5px;">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-12">
                                <input type="email" placeholder="akun social media yang bisa dihubungi" style="width: 100%; border-radius: 10px;  border:none ; padding: 8px; margin: 5px;">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <textarea style="width: 100%; border-radius: 10px;  border:none ; padding: 8px; margin: 5px; height: 100px;" placeholder="Kritik saran"></textarea>
                              </div>
                            </div>
                            <a class="btn btn-primary smooth-scroll mr-2" href="#contact" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Submit</a>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="section">
            <div class="container">
              <div class="button-container"><div class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Love me"><i class="fa fa-heart"></i></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section" id="about">
      <div class="container justify-content-center">
        <div class="row">
          <div class="col">
            
          </div>
          <div class="col">
            <div data-aos="fade-up" data-aos-offset="10">
              <div class="row">
                <div class="col p-5">
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            
          </div>
        </div>
        
      </div>
    </div>
    
  </div>
</div>
@endsection