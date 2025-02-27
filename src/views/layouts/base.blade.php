<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>{{ $app_data['name'].' | '.$page_title }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap -->
    @section('head')

    @if (isset($assets['css']) and count($assets['css']) > 0)
      @foreach ($assets['css'] as $css_file)
        <link href="/packages/whereyart/station-yart5/css/{{ $css_file }}" rel="stylesheet">
      @endforeach
    @endif

    <link href="/packages/whereyart/station-yart5/Flat-UI-Pro-1.2.2/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/packages/whereyart/station-yart5/Flat-UI-Pro-1.2.2/css/flat-ui.css" rel="stylesheet">
    <link href="/packages/whereyart/station-yart5/css/base.css?v10" rel="stylesheet">
    {!! $app_data['css_override_file'] != '' ? '<link href="'.$app_data['css_override_file'].'" rel="stylesheet">' : '' !!}

    <script src="/packages/whereyart/station-yart5/js/jquery-1.11.2.min.js"></script>
    <script src="/packages/whereyart/station-yart5/js/radiocheck.js"></script>
    <script src="/packages/whereyart/station-yart5/Flat-UI-Pro-1.2.2/js/bootstrap.min.js"></script>
    <script src="/packages/whereyart/station-yart5/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="/packages/whereyart/station-yart5/Flat-UI-Pro-1.2.2/js/jquery.ui.touch-punch.min.js"></script>
    <script src="/packages/whereyart/station-yart5/Flat-UI-Pro-1.2.2/js/bootstrap-select.js"></script>
    <script src="/packages/whereyart/station-yart5/Flat-UI-Pro-1.2.2/js/bootstrap-switch.js"></script>
    <script src="/packages/whereyart/station-yart5/Flat-UI-Pro-1.2.2/js/flatui-checkbox.js"></script>
    <script src="/packages/whereyart/station-yart5/Flat-UI-Pro-1.2.2/js/flatui-radio.js"></script>
    <script src="/packages/whereyart/station-yart5/Flat-UI-Pro-1.2.2/js/jquery.tagsinput.js"></script>
    <script src="/packages/whereyart/station-yart5/Flat-UI-Pro-1.2.2/js/jquery.placeholder.js"></script>
    <script src="/packages/whereyart/station-yart5/Flat-UI-Pro-1.2.2/js/application.js"></script>
    <script src="/packages/whereyart/station-yart5/js/station_application.js?v2"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    @if (isset($assets['js']) and count($assets['js']) > 0)
      @foreach ($assets['js'] as $js_file)
        <script src="{{ substr($js_file, 0, 1) == '/' ? $js_file : '/packages/whereyart/station-yart5/js/'.$js_file }}"></script>
      @endforeach
    @endif

    <script type="text/javascript">
      var base_uri    = '{{ $base_uri }}';
      var curr_panel  = '{{ $curr_panel }}';
      var curr_subpanel  = '{{ isset($curr_subpanel) ? $curr_subpanel : '' }}';
      var curr_method = '{{ $curr_method }}';
      var curr_id = '{{ $curr_id }}';

      $(document).ready(function() { $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }}); });
    </script>

  @show

  </head>
  <body>
    
    @if(Auth::check())
    
      <div class="container">
          <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MobileNav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <a class="navbar-brand" href="/">
              <img class="custom-logo" src="/images/whereyart-logo-light.svg" alt="Where Y’Art Works – Shaping Place Through Art">
            </a>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="MobileNav">
              <div id="sidebar-container">
                @include('station::layouts.sidebar')
              </div>
            </div>
          </nav>
          <div id="content-container">
            <div class="row">
              <div class="col-sm-12">
                {{-- for showing flashes via ajax responses --}}
                <div class="empty-flash-holder" style="display: none;"></div>
                @if (isset($app_data['html_prepend_content_file']) && $app_data['html_prepend_content_file'] != '')
                  @include($app_data['html_prepend_content_file'])
                @endif

                @include('station::layouts.header')
                
                @yield('content')
              </div>
            </div>
        </div>
      </div>

    @else

      <div class="container">
        <div class="row row-header">
          <div class="col-md-6 col-md-offset-3">
            @include('station::layouts.header')
            @yield('content')
          </div>
        </div>
      </div>
      <div class="text-center">
          Have an Account? &nbsp; <a href="{{ '/'.$app_data['root_uri_segment'].'/login' }}">Login Here</a>
      </div>

    @endif

    @if (isset($app_data['html_append_file']) && $app_data['html_append_file'] != '')
      @include($app_data['html_append_file'])
    @endif
    
  </body>
</html>
