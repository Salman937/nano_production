<!DOCTYPE html>
<html>
  
<!-- Mirrored from iamsrinu.com/bluemoon-admin-theme7/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Sep 2015 06:52:42 GMT -->
<head>
    <title>Nano-Production</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="description" content="Blue Moon - Responsive Admin Dashboard" />
    <meta name="keywords" content="Notifications, Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Wrapbootstrap, Bootstrap, bootstrap.gallery" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="shortcut icon" href="img/favicon.ico">
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/new.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/charts-graphs.css') }}" rel="stylesheet">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datepicker.css') }}">

    <link href="{{ asset('fonts/font-awesome.min.css') }}" rel="stylesheet">

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-40304444-1', 'iamsrinu.com');
      ga('send', 'pageview');

    </script>
  </head>

  <body>

    <!-- Header Start -->
    <header>
      <a href="index-2.html" class="logo">
        <img src="img/logo.png" alt="Logo"/>
      </a>
      <div class="pull-right">
        <ul id="mini-nav" class="clearfix">
          <li class="list-box user-profile">
            <a id="drop7" href="#" role="button" class="dropdown-toggle user-avtar" data-toggle="dropdown">
              <img src="img/user5.png" alt="Bluemoon User">
            </a>
            <ul class="dropdown-menu server-activity">
              <li>
                <div class="demo-btn-group clearfix">
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();" class="btn btn-danger">
                      Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>  
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </header>
    <!-- Header End -->

    @yield('content')

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.js') }}"></script>
    
    <!-- jQuery UI JS -->
    <script src="{{ asset('js/jquery-ui-v1.10.3.js') }}"></script>

    <!-- Just Gage -->
    <script src="{{ asset('js/justgage/justgage.js') }}"></script>
    <script src="{{ asset('js/justgage/raphael.2.1.0.min.js') }}"></script>

    <!-- Flot Charts -->
    <script src="{{ asset('js/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('js/flot/jquery.flot.orderBar.min.js') }}"></script>
    <script src="{{ asset('js/flot/jquery.flot.stack.min.js') }}"></script>
    <script src="{{ asset('js/flot/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ asset('js/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('js/flot/jquery.flot.resize.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/custom-index2.js') }}"></script>
    
    <script type="text/javascript">
      //ScrollUp
      $(function () {
        $.scrollUp({
          scrollName: 'scrollUp', // Element ID
          topDistance: '300', // Distance from top before showing element (px)
          topSpeed: 300, // Speed back to top (ms)
          animation: 'fade', // Fade, slide, none
          animationInSpeed: 400, // Animation in speed (ms)
          animationOutSpeed: 400, // Animation out speed (ms)
          scrollText: 'Top', // Text for element
          activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });
      });
    </script>

  </body>

<!-- Mirrored from iamsrinu.com/bluemoon-admin-theme7/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Sep 2015 06:53:12 GMT -->
</html>