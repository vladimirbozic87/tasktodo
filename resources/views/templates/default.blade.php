<!DOCTYPE html>
<html lang="en">
    <head>
	   <meta charset="UTF-8">
	   <title>tasktodo</title>

       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

       <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

       <link rel="stylesheet" href="/tasktodo/public/css/navSideMenu.css">

       <link rel="stylesheet" href="/tasktodo/public/css/custome.css">

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

       <script>/*
          $(document).ready(function() {

             var docHeight = $(window).height();

             var wrapperHeight = $("#wrapper").height()+170;

             if(docHeight > wrapperHeight){

               var paddingBottom = docHeight - wrapperHeight;

                $("#wrapper").css('padding-bottom', paddingBottom +'px');
             }

          });

        $(window).on('resize', function () {
            var docHeight = $(window).height();

            var wrapperHeight = $("#wrapper").height()+170;

            if(docHeight > wrapperHeight){

              var paddingBottom = docHeight - wrapperHeight;

               $("#wrapper").css('padding-bottom', paddingBottom +'px');
            }

        });*/
       </script>

    </head>

    @if(Route::is('home') || Route::is('auth.signin') || Route::is('auth.signup'))

      <style>
        body  {
          background: url(/tasktodo/public/css/businessImg.jpeg) no-repeat center center fixed;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
      </style>
  
    @endif

    <body>

       @include('templates.partials.navigation')

<!--<div class="container-fluid" id="wrapper"  style="height:100%">
<div class="row" style="height:100%">
<div class="col-lg-2" style="border: 2px solid orange; height:100%">-->

       @if(Auth::check())
          @include('templates.partials.navSideMenu')
       @endif


<!--</div>
<div class="col-lg-8" style="border: 2px solid yellow;">-->

       <div class="container" id="wrapper">
<!--<div class="container-fluid">-->
          @include('templates.partials.alert')
          @yield('content')
       </div>

<!--</div>
</div>
</div>-->
       
       <div id="footer">
         <div class="col-lg-4 col-lg-offset-4 text-center">
           <h4 class="text-muted">Copyright (c) 2017</h4>
         </div>
       </div>

    </body>
</html>
