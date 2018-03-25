<!DOCTYPE html>
<html lang="en">
    <head>
	   <meta charset="UTF-8">
	   <title>tasktodo</title>

       <meta name="viewport" content="width=device-width, initial-scale=1">

       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

       <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

       {{--<link rel="stylesheet" href="/tasktodo/public/css/navSideMenu.css">--}}
       <link rel="stylesheet" href="{{ asset('/css/navSideMenu.css') }}">

       {{--<link rel="stylesheet" href="/tasktodo/public/css/steps.css">--}}
       <link rel="stylesheet" href="{{ asset('/css/steps.css') }}">

       {{--<link rel="stylesheet" href="/tasktodo/public/css/custome.css">--}}
       <link rel="stylesheet" href="{{ asset('/css/custome.css') }}">

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

       {{--<script src="/tasktodo/public/js/custome.js"></script>--}}
       <script src="{{ asset('/js/custome.js') }}"></script>

       {{--<link rel="stylesheet" href="/tasktodo/public/css/slider.css">--}}
       <link rel="stylesheet" href="{{ asset('/css/slider.css') }}">

       <script>

           $(document).ready(function(){
              $(".collapsed").click(function(){
              $("#products, #service, #new").collapse('hide');
              });
           });

       </script>

       {{--<link href="/tasktodo/public/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />--}}
       <link href="{{ asset('/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />
		   <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  		 {{--<script src="/tasktodo/public/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>--}}
  		 <script src="{{ asset('/js/plugins/canvas-to-blob.min.js') }}" type="text/javascript"></script>
  		 {{--<script src="/tasktodo/public/js/plugins/sortable.min.js" type="text/javascript"></script>--}}
  		 <script src="{{ asset('/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
  		 {{--<script src="/tasktodo/public/js/plugins/purify.min.js" type="text/javascript"></script>--}}
  		 <script src="{{ asset('/js/plugins/purify.min.js') }}" type="text/javascript"></script>
  		 {{--<script src="/tasktodo/public/js/fileinput.min.js"></script>--}}
  		 <script src="{{ asset('/js/fileinput.min.js') }}"></script>
  		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
  	   {{--<script src="/tasktodo/public/themes/fa/theme.js"></script>--}}
  	   <script src="{{ asset('/themes/fa/theme.js') }}"></script>

       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    </head>

    <!--Route::is('home') || Route::is('auth.signin') || Route::is('auth.signup')-->

    @if(!Auth::check())

      <style>
        body  {
          /*background: url(/tasktodo/public/css/businessImg.jpeg) no-repeat center center fixed;*/
          background: url(/css/businessImg.jpeg) no-repeat center center fixed;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
      </style>

    @endif

    <body>

       @include('templates.partials.navigation')

       @if(Auth::check())
          @include('templates.partials.navSideMenu')
       @endif

       <!--<div class="container-fluid" id="wrapper">-->
       <div class="container" id="wrapper">
          @include('templates.partials.alert')
          @yield('content')
       </div>

       <div id="footer">
         <div class="col-lg-4 col-lg-offset-4 text-center">
           <h4 class="text-muted">Copyright (c) 2017</h4>
         </div>
       </div>

    </body>
</html>
