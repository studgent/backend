<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ URL::asset('assets/ico/favicon.png') }}">

    <title>StudGent</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('assets/css/main.css') }}" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><i class="fa fa-map-marker"></i>STUDGENT</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li @if(Request::is('/')) class="active" @endif ><a href="/">HOME</a></li>
            <li @if(Request::is('api')) class="active" @endif ><a href="/api">API</a></li>
            <li @if(Request::is('legal')) class="active" @endif ><a href="/legal">LEGAL</a></li>
            <li><a data-toggle="modal" data-target="#info" href="#info"><i class="fa fa-info-circle"></i></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div id="blue">
        <div class="container">
            <div class="row centered">
                <div class="col-lg-8 col-lg-offset-2">
                <h4><b>STUDGENT</b></h4>
                <p>INTERACTIEVE STADSGIDS VOOR STUDENTEN IN GENT</p>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- blue wrap -->
    @yield('content')
    <!-- FOOTER -->
    <div id="f">
        <div class="container">
            <div class="row centered">
                <a href="https://github.com/studgent"><i class="fa fa-github"></i></a>
        
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- Footer -->


    <!-- MODAL FOR CONTACT -->
    <!-- Modal -->
    <div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="infoLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="infoLabel">Info</h4>
          </div>
          <div class="modal-body">
                <div class="row centered">
                    <p>Project created for University Ghent.</p>
                    <p>
                        Valentin Vaerwyckweg 1<br/>
                        9000 Gent<br/>
                    </p>
                    <div id="mapwrap">
                        <iframe height="300" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?t=m&amp;ie=UTF8&amp;ll=51.0370822,3.6913178&amp;z=15&amp;output=embed"></iframe>
                    </div>    
                </div>
          </div>
          <div class="modal-footer">
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
  </body>
</html>
