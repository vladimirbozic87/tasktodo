@extends('templates.default')

@section('content')

<div class="left-margin-content">

@include('templates.partials.steps')

<hr>

   <h3>Create Task</h3>

   <div class="row">
        <div class="col-lg-6">

            <div class="alert alert-warning" role="alert">
               For User: <strong>{{ $user->getNameOrUsername() }}</strong>
            </div>

            <form class="form-vertical" role="form" method="post" enctype="multipart/form-data" action="{{ route('task.index') }}">
                    <div class="form-group{{ $errors->has('task_name') ? ' has-error' : '' }}">
                            <label for="task_name" class="control-label">Task name</label>
                            <input type="text" name="task_name" class="form-control" id="task_name" value="{{ Request::old('task_name') ?: '' }}">
                            @if ($errors->has('task_name'))
                                  <span class="help-block">{{ $errors->first('task_name') }}</span>
                            @endif
                    </div>
                    <div class="form-group{{ $errors->has('task_description') ? ' has-error' : '' }}">
                            <label for="task_description" class="control-label">Task description</label>
                            <textarea class="form-control" name="task_description" id="task_description" rows="3">{{ Request::old('task_description') ?: '' }}</textarea>
                            @if ($errors->has('task_description'))
                                  <span class="help-block">{{ $errors->first('task_description') }}</span>
                            @endif
                    </div>

                   <div class="form-group{{ $errors->has('fileToUpload.*') ? ' has-error' : '' }}">
                    <label class="control-label">Select File</label>
                          <input id="input-6" name="fileToUpload[]" type="file" multiple class="file-loading">
                          @if ($errors->has('fileToUpload.*'))
                                <span class="help-block">{{ $errors->first('fileToUpload.*') }}</span>
                          @endif
                    <script>
                      $(document).on('ready', function() {
                        $("#input-6").fileinput({
                          showUpload: false,
                          maxFileCount: 10,
                          mainClass: "input-group-md"
                        });
                      });
                    </script>
                  </div>

                  <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                      <label class="control-label" for="date">Task end date</label>
                      <div class='input-group date'>
                      <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" value="{{ Request::old('date') ?: '' }}"/>
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
                            <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>

        </div>
   </div>

</div>

@stop
