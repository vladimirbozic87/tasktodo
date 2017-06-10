@extends('templates.default')

@section('content')

<div class="left-margin-content">

<h3>Task line</h3>

<hr>

  <div class="row">

   @foreach($tasks as $task)

     <div class="col-lg-4">
       <div class="panel panel-primary">
          <div class="panel-heading"><strong>{{ $task->task_name }}</strong></div>
          <div class="panel-body">
              {{ $task->task_description }}

              <div class="progress" style="margin-bottom:0px;margin-top:5px;">
                 <div class="progress-bar progress-bar-striped active" role="progressbar"
                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{ $task->progress }}%">
                                        {{ $task->progress }} %
                 </div>
             </div>


          </div>
       </div>

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
     {!! $tasks->render() !!}
   </div>

</div>

@stop
