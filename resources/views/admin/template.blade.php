<!doctype html>
<html lang="en">
  <head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">
    <link href="{{ asset('blog_assets/fonts/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_assets/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <script src="{{ asset('admin_assets/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_assets/chartjs/util.js') }}"></script>

    <style type="text/css">
      .author{
        width: 30px;
        border-radius: 50%;
        display: inline-block;
      }
      .none {
        display: none;
      }
      canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
      }
    </style>

  </head>
  <body>
    @php
    
    @endphp
    @if(session('id'))
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-1">
        <div class="container">
          <div class="navbar-brand" data-toggle="collapse" data-target="#collapseExample">
          <i class="fa fa-bars" aria-hidden="true"></i>
          </div>
          <div class="navbar-nav align-items-center">
            <div class="nav-item d-inline">
              <a class="mr-3" href="{{ route('message') }}">
                <div class="badge badge-primary">
                {{ \Illuminate\Support\Facades\DB::table('message')->where('target', 'like', '%'.session('id').'%')->where('is_read', 0)->count() }}
                </div> Pesan 
              </a>
              <div class="navbar-brand" data-toggle="collapse" data-target="#setlog">
                <img class="author" src="{{ asset('storage/'.\App\user::where('id', session('id'))->first()->profil_image) }}">
              </div>
            </div>
          </div>
        </div>
      </nav>
    @endif
    <div style="position: absolute; width: 100%;">
      <div class="container">
        <div class="row row-12">
          <div class="col col-lg-10 col-md-8 col-sm-9">
          </div>
          <div class="col col-lg-2 col-md-4 col-sm-3" style="z-index: 1000">
            <div class="collapse" id="setlog">
              <ul class="list-group">
                <li class="list-group-item">
                  <a href="{{url('admin/profile/'.session('id'))}}"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
                </li>
                <li class="list-group-item">
                  <a href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="wrap">
      <div class="container">
        <div class="row">
          @yield('menu')
          @yield('report')
          @yield('createMenu')
          @yield('adminPost')
          @yield('categories')
          @yield('editPost')
          @yield('user')
          @yield('lorefail')
          @yield('notifandmessage')
          @yield('profile')
        </div>
      </div>
    </div>
    
    <script src="{{ asset('blog_assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('blog_assets/js/jquery-migrate-3.0.0.js') }}"></script>
    <script src="{{ asset('blog_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('blog_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_assets/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin_assets/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin_assets/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin_assets/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin_assets/tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
      tinymce.init({
          selector: ".editor"
      });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('#dataTable').DataTable();
      $('#dataTable2').DataTable();
      $('#dataTable3').DataTable();
    });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        if (screen.width <= 500) {
          $('#widthModal').addClass('');
        }
        else {
          $('#widthModal').addClass('modal-xl');
        };

        $('#register').click(function() {
          $('#dRegister').removeClass('none');
          $('#dLogin').addClass('none');
        });

        $('#login').click(function() {
          $('#dLogin').removeClass('none');
          $('#dRegister').addClass('none');
        });

      });
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>