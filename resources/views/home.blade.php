@extends('templates.default')

@section('content')
    <div class="row">
      <div class="col-lg-12" style="height:50px;"></div>
         <div class="col-md-3 col-lg-4 col-md-offset-1 col-lg-offset-0">
            <div class="panel panel-default" style="box-shadow: 0 0 15px black;">
               <div class="panel-heading">Roles</div>
               <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-10">
                       <div class="panel panel-primary">
                          <div class="panel-heading">Project Manager</div>
                       </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-1">
                       <div class="panel panel-success">
                          <div class="panel-heading">Team Leader</div>
                       </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                       <div class="panel panel-info">
                          <div class="panel-heading">Developer</div>
                       </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                       <div class="panel panel-info">
                          <div class="panel-heading">Administrator</div>
                       </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                       <div class="panel panel-info">
                          <div class="panel-heading">Designer</div>
                       </div>
                    </div>
                  </div>

               </div>
            </div>
         </div>

         <div class="col-md-4 col-lg-4">
            <div class="panel panel-default" style="box-shadow: 0 0 15px black;">
               <div class="panel-heading">Projects</div>
               <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-10">
                       <div class="panel panel-primary">
                          <div class="panel-heading">Company</div>
                       </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-1">
                       <div class="panel panel-success">
                          <div class="panel-heading">Projects</div>
                       </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                       <div class="panel panel-warning">
                          <div class="panel-heading">Task</div>
                       </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                       <div class="panel panel-warning">
                          <div class="panel-heading">Task</div>
                       </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                       <div class="panel panel-warning">
                          <div class="panel-heading">Task</div>
                       </div>
                    </div>
                  </div>

               </div>
            </div>
         </div>

         <div class="col-md-4 col-lg-4">
            <div class="panel panel-default" style="box-shadow: 0 0 15px black;">
               <div class="panel-heading">Tasks</div>
               <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-10">
                       <div class="panel panel-info">
                          <div class="panel-heading">Developer</div>
                       </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-1">
                       <div class="panel panel-warning">
                          <div class="panel-heading">Task</div>
                       </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                       <div class="panel panel-success">
                          <div class="panel-heading">Progres</div>
                       </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                       <div class="panel panel-success">
                          <div class="panel-heading">Testing</div>
                       </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                       <div class="panel panel-success">
                          <div class="panel-heading">Production</div>
                       </div>
                    </div>
                  </div>

               </div>
            </div>
         </div>

         <div class="col-lg-12" style="height:30px;"><hr></div>
         <div class="col-lg-12">
            <h1 class="text-center" style="color: white; text-shadow: 2px 2px 8px #000000;">Follow the development of its project on the easiest way so far123</h1>
         </div>
         <div class="col-lg-12" style="height:30px;"><hr></div>
         <div class="col-lg-12" style="height:30px;"></div>

         <div class="col-lg-4 col-lg-offset-4 text-center">
              @if(!Auth::check())
                <a class="btn btn-primary btn-lg btn-block" href="{{ route('auth.signin') }}" role="button">Sign in</a>
                <a class="btn btn-primary btn-lg btn-block" href="{{ route('auth.signup') }}" role="button">Sign up</a>
              @else
                <a class="btn btn-primary btn-lg btn-block" href="{{ route('auth.signout') }}" role="button">Sign out</a>
              @endif
         </div>

         <!--<div class="col-lg-12" style="border:2px solid yellow; height:500px;">efwefwefwe</div>-->
    </div>
@stop
