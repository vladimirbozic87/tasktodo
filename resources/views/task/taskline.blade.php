@extends('templates.default')

@section('content')

<div class="left-margin-content">


 <div class="row" style="padding-left:15px;padding-right:15px;">

    <div class="col-lg-12" style="border:1px solid #337ab7;border-radius: 10px;padding-top:15px;">

    <form class="form-vertical" role="form" method="get" action="{{ route('task.search') }}">
     <div class="col-lg-2">
       <div class="form-group">
           <select class="form-control" name="status">
             <option value="" style="color:red">Choose status...</option>
                  @foreach($status as $stat)

                    @if(isset($statusSearch))
                      @if($statusSearch == $stat->status_name)
                         @php $selected = "selected" @endphp
                      @else
                         @php $selected = "" @endphp
                      @endif
                    @else
                      @php $selected = "" @endphp
                    @endif

                    <option value="{{ $stat->status_name }}" {{ $selected }}>{{ $stat->status_name }}</option>
                  @endforeach
           </select>
       </div>
     </div>

     <div class="col-lg-2">
       <div class="form-group">
           <select class="form-control" name="user">
             <option value="" style="color:red">Choose user...</option>
                  @foreach($userConn as $conn)

                    @if(isset($userSearch))
                      @if($userSearch == $conn->userConnection->username)
                         @php $selected = "selected" @endphp
                      @else
                         @php $selected = "" @endphp
                      @endif
                    @else
                      @php $selected = "" @endphp
                    @endif

                    <option value="{{ $conn->userConnection->username }}" {{ $selected }}>{{ $conn->userConnection->first_name }} {{ $conn->userConnection->last_name }}</option>
                  @endforeach
           </select>
       </div>
     </div>

     <div class="col-lg-2">
       <div class="form-group">
           <select class="form-control" name="orderBy">
             <option value="" style="color:red">Order By...</option>

             @if(isset($orderBySearch))
               @if($orderBySearch == "latest")
                  @php $latest = "selected" @endphp
                  @php $oldest = "" @endphp
               @elseif($orderBySearch == "oldest")
                  @php $latest = "" @endphp
                  @php $oldest = "selected" @endphp
               @endif
             @else
             @php $latest = "" @endphp
             @php $oldest = "" @endphp
             @endif

             <option value="latest" {{ $latest }}>Latest</option>
             <option value="oldest" {{ $oldest }}>Oldest</option>
           </select>
       </div>
     </div>

     <div class="col-lg-4">
       <div class="form-group">

              @if(isset($textSearch))
                @php $text = $textSearch @endphp
              @else
                 @php $text = "" @endphp
              @endif

               <input type="text" name="search" class="form-control" id="search" placeholder="Task name" value="{{ $text }}">
       </div>
     </div>

     <div class="col-lg-2">
       <div class="form-gorup">
               <button type="submit" class="btn btn-primary">Search</button>
       </div>
     </div>

     </form>
   </div>

  </div>

  <hr>

  <div class="row">

   @foreach($tasks as $task)

     @if($task->status == 1)
        @php $panel = "primary" @endphp
        @php $bar = "" @endphp
        @php $active = "active" @endphp
     @elseif($task->status == 2)
        @php $panel = "danger" @endphp
        @php $bar = "progress-bar-danger" @endphp
        @php $active = "" @endphp
     @elseif($task->status == 3)
        @php $panel = "info" @endphp
        @php $bar = "progress-bar-info" @endphp
        @php $active = "" @endphp
     @elseif($task->status == 4)
        @php $panel = "default" @endphp
        @php $bar = "" @endphp
        @php $active = "" @endphp
     @elseif($task->status == 5)
        @php $panel = "success" @endphp
        @php $bar = "progress-bar-success" @endphp
        @php $active = "" @endphp
     @endif

     <div class="col-lg-4">
      <a href="{{ route('task.task', ['username' => $username, 'task_name' => $task->task_name]) }}" style="text-decoration: none; color:black;">
       <div class="panel panel-{{ $panel }}" id="linkTask">
          <div class="panel-heading"><strong>{{ $task->task_name }}</strong></div>
          <div class="panel-body">
              {{ $task->task_description }}

              <div class="progress" style="margin-bottom:0px;margin-top:5px;">
                 <div class="progress-bar {{ $bar }} progress-bar-striped {{ $active }}" role="progressbar"
                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{ $task->progress }}%">
                                        {{ $task->progress }} %
                 </div>
             </div>

          </div>
       </div>
      </a>
     </div>

   @endforeach

   @if(count($tasks) == 0)
      <div class="col-lg-12">
        <div class="alert alert-warning" role="alert">
           <strong>You doesn't have any task.</strong>
        </div>
      </div>
   @endif

 </div>

 <hr>

   <div class="col-lg-12 text-center">

         {!! $tasks->appends(Request::except('page'))->render() !!}
   </div>

</div>

@stop
