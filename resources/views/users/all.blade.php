@extends('templates.default')

@section('content')

<div class="left-margin-content">

  <h3>Users List</h3>

  <hr>

   @foreach($userConn as $conn)
       <div class="alert alert-info" role="alert">
          <strong>{{ $conn->userConnection->getNameOrUsername() }}</strong> ({{ $conn->userConnection->getRole() }})

          <span style="float:right">
               <a style="text-decoration:none" href="{{ route('profile.index', ['username' => $conn->userConnection->username]) }}"><i class="fa fa-user fa-lg"></i> <strong>Profile</strong></a>
               &nbsp; | &nbsp;
               <a style="text-decoration:none" href="{{ route('task.search', ['user' => $conn->userConnection->username]) }}"><i class="fa fa-tasks fa-lg" aria-hidden="true"></i> <strong>Tasks</strong></a>
          </span>
       </div>
   @endforeach



</div>
@stop
