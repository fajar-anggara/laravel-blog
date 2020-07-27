<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creative CV</title>
    <meta name="description" content="Creative CV is a HTML resume template for professionals. Built with Bootstrap 4, Now UI Kit and FontAwesome, this modern and responsive design template is perfect to showcase your portfolio, skils and experience."/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="{{ asset('blog_assets/fonts/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cv_assets/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cv_assets/styles/main.css') }}" rel="stylesheet">
  </head>
  <body id="top">

    <header>
      <div class="profile-page sidebar-collapse">
        <nav class="navbar navbar-expand-lg fixed-top navbar-transparent bg-primary" color-on-scroll="400">
          <div class="container">
            <div class="navbar-translate"><a class="navbar-brand" href="#" rel="tooltip"></a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-bar bar1"></span><span class="navbar-toggler-bar bar2"></span><span class="navbar-toggler-bar bar3"></span></button>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link smooth-scroll" href="{{url('/')}}">Home</a></li>
              <li class="nav-item"><a class="nav-link smooth-scroll" href="{{ route('about.contact')}}">contact</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    @yield('person')
    @yield('web')
    @yield('contact')
    
    
      <div class="text-center text-muted">
        <p>&copy; Design - <a class="credit" href="https://templateflip.com" target="_blank">TemplateFlip</a></p>
      </div>
    <script src="{{ asset('blog_assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('blog_assets/js/jquery-migrate-3.0.0.js') }}"></script>
    <script src="{{ asset('blog_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('blog_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('cv_assets/js/now-ui-kit.js?v=1.1.0') }}"></script>
    <script src="{{ asset('cv_assets/js/aos.js') }}"></script>
    <script src="{{ asset('cv_assets/scripts/main.js') }}"></script>
  </body>
</html>
