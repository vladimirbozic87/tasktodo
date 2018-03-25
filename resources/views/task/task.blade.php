@extends('templates.default')

@section('content')

<div class="left-margin-content">

  <div class="row">
       <!--<div class="col-lg-12">-->

           <form class="form-vertical" role="form" method="post" enctype="multipart/form-data" action="{{ route('task.task', ['username' => $username, 'task_name' => $task->task_name]) }}">

                 <div class="col-lg-6">

                   <div class="form-group{{ $errors->has('task_name') ? ' has-error' : '' }}">
                           <label for="task_name" class="control-label">Task name</label>
                           <input type="text" name="task_name" class="form-control" id="task_name" value="{{ $task->task_name }}" readonly>
                           @if ($errors->has('task_name'))
                                 <span class="help-block">{{ $errors->first('task_name') }}</span>
                           @endif
                   </div>
                   <div class="form-group{{ $errors->has('task_description') ? ' has-error' : '' }}">
                           <label for="task_description" class="control-label">Task description</label>
                           <textarea class="form-control" name="task_description" id="task_description" rows="3" readonly>{{ Request::old('task_description') ?: $task->task_description }}</textarea>
                           @if ($errors->has('task_description'))
                                 <span class="help-block">{{ $errors->first('task_description') }}</span>
                           @endif
                   </div>

                   <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                       <label for="status" class="control-label">Status</label>
                       <select class="form-control" name="status" disabled id="status">
                         <option value="">--</option>
                              @foreach($status as $stat)

                                @if(Request::old('status') == $stat->id)
                                   @php $selected = "selected" @endphp
                                @elseif($task->status == $stat->id)
                                   @php $selected = "selected" @endphp
                                @else
                                   @php $selected = "" @endphp
                                @endif

                                <option value="{{ $stat->id }}" {{ $selected }}>{{ $stat->status_name }}</option>
                              @endforeach
                       </select>
                        @if ($errors->has('status'))
                             <span class="help-block">{{ $errors->first('status') }}</span>
                        @endif

                   </div>

                </div>

                <div class="col-lg-6">

                  @if($task->status == 1)
                     @php $bar = "" @endphp
                     @php $active = "active" @endphp
                  @elseif($task->status == 2)
                     @php $bar = "progress-bar-danger" @endphp
                     @php $active = "" @endphp
                  @elseif($task->status == 3)
                     @php $bar = "progress-bar-info" @endphp
                     @php $active = "" @endphp
                  @elseif($task->status == 4)
                     @php $bar = "" @endphp
                     @php $active = "" @endphp
                  @elseif($task->status == 5)
                     @php $bar = "progress-bar-success" @endphp
                     @php $active = "" @endphp
                  @endif

                  <label for="task_progress" class="control-label">Task progress</label>
                  <div class="progress">
                     <div id="task_progress" class="progress-bar {{ $bar }} progress-bar-striped {{ $active }}" role="progressbar"
                         aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{ $task->progress }}%">
                                            {{ $task->progress }} %
                     </div>
                 </div>

                 <div class="range-slider">
                     <input class="range-slider__range" type="range" value="{{ $task->progress }}" min="0" max="100" name="task_range" id="task_range" disabled>
                 </div>

                 <br>

                 <script>
                     var rangeSlider = function(){
                     var slider = $('.range-slider'),
                         range = $('.range-slider__range'),
                         value = $('.range-slider__value');

                     slider.each(function(){

                         value.each(function(){
                           var value = $('.range-slider__range').attr('value');
                           $(this).html(value);
                         });

                         range.on('input', function(){
                           $('.range-slider__value').html(this.value);

                           $('#task_progress').html(this.value + ' %');
                           $('#task_progress').width(this.value + '%');
                         });
                       });
                   };

                   rangeSlider();
                 </script>

                </div>

                <div class="col-lg-12">

                 @php $url = json_decode($task->task_file_url) @endphp

                 <input id="input-6" name="fileToUpload[]" type="file" multiple class="file-loading">
                	<script>
                	$(document).on('ready', function() {
                		$("#input-6").fileinput({
                			showUpload: false,
                			maxFileCount: 10,
                			mainClass: "input-group-md",
                			showClose: false,
                			showBrowse: false,
                			showRemove: false,
                			showCaption: false,
                			previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                			overwriteInitial: false,
                			initialPreviewAsData: true,
                			initialPreview: [
                           @foreach($url as $valueUrl)
                              {{--"/tasktodo/{{ $valueUrl }}",--}}
                                "{{ $valueUrl }}",
                           @endforeach
                            ],
                			initialPreviewConfig: [
                           @foreach($url as $valueUrl)
                               @php $urlExp = explode("/", $valueUrl); @endphp

                               {caption: "{{ end($urlExp) }}"},
                           @endforeach
                            ],
                			initialPreviewShowDelete: false,
                			fileActionSettings: {
                                    showDrag: false,
                                }
                		});
                	});
                  </script>

                    <br>
                </div>

                <div class="col-lg-6">

                 <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                     <label class="control-label" for="date">Task end date</label>
                     <div class='input-group date'>
                     <input class="form-control" id="date" name="date" disabled placeholder="MM/DD/YYY" type="text" value="{{ Request::old('date') ?: date( "m/d/Y", strtotime($task->task_end)) }}"/>
                     <span class="input-group-addon">
                       <span id="datetimepiker" style="position:absolute"></span>
                       <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                   </div>
                   @if ($errors->has('date'))
                         <span class="help-block">{{ $errors->first('date') }}</span>
                   @endif
                     <script>
                        $(document).ready(function(){
                          var date_input=$('input[name="date"]');
                          var container= "#datetimepiker";
                          var options={
                            format: 'mm/dd/yyyy',
                            container: container,
                            todayHighlight: true,
                            autoclose: true,
                          };
                          date_input.datepicker(options);
                        })
                    </script>
                  </div>

                   <div class="form-gorup">
                           <button type="button" class="btn btn-primary" onclick="enabledEditTask()" id="editTask">Edit</button>
                   </div>
                   <input type="hidden" name="_token" value="{{ Session::token() }}">

                </div>
           </form>

       <!--</div>-->

       <div class="col-lg-12">

           <hr>

           <h3>Comments</h3>

           <?php

               $color = array('info', 'warning', 'success', 'default', 'primary', 'danger');

               $coloring = array();

               foreach($task->comment as $comment){

                  foreach ($color as $key => $value) {

                    if(!isset($coloring[$comment->user->id])){

                        $coloring[$comment->user->id] = $value;
                        unset($color[$key]);
                    }
                  }

               }

            ?>

           <div class="form-group" id="bodyGroup">
                   <label for="body" class="control-label">Task comment</label>
                   <textarea class="form-control" name="body" id="body" rows="3"></textarea>
           </div>

              @if(isset($coloring[Auth::user()->id]))
                  @php $setColoring = $coloring[Auth::user()->id] @endphp
              @elseif(count($coloring) > 0)
                  @php
                    reset($color);
                    $setColoring = current($color);
                  @endphp
              @else
                  @php $setColoring = "info" @endphp
              @endif

           <div class="form-gorup">

               <button type="button" class="btn btn-primary" onclick="setComment({{ $task->id }}, '{{ $setColoring }}')">Submit</button>

               <meta name="csrf-token" content="{{ csrf_token() }}" />

           </div>

           <hr>

             @foreach($task->comment as $comment)

                <div class="panel panel-{{ $coloring[$comment->user->id] }}">
                   <div class="panel-heading"><strong>{{ $comment->user->getNameOrUsername() }}</strong> ({{ $comment->user->getRole() }}) <span style="float:right">{{ $comment->created_at->diffForHumans() }}</span></div>
                   <div class="panel-body">
                       {{ $comment->body }}

                   </div>
                </div>

             @endforeach

             @if(count($task->comment) == 0)
               <div class="alert alert-danger" role="alert" id="noComment">
                  <strong>There are no comments yet</strong>
               </div>
             @endif

           <div id="test"></div>

       </div>

  </div>


</div>

@stop
