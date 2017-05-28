@extends('templates.default')

@section('content')

<div class="left-margin-content">

@include('templates.partials.steps')

<hr>

   <h3>Create Project</h3>

   <div class="row">
        <div class="col-lg-6">

          <form class="form-vertical" role="form" method="post" action="{{ route('company.project') }}">
                  <div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
                          <label for="project_name" class="control-label">Project name</label>
                          <input type="text" name="project_name" class="form-control" id="project_name" value="{{ Request::old('project_name') ?: '' }}">
                          @if ($errors->has('project_name'))
                                <span class="help-block">{{ $errors->first('project_name') }}</span>
                          @endif
                  </div>
                  <div class="form-group{{ $errors->has('project_info') ? ' has-error' : '' }}">
                          <label for="project_info" class="control-label">Project Info</label>
                          <textarea class="form-control" name="project_info" id="project_info" rows="3">{{ Request::old('project_info') ?: '' }}</textarea>
                          @if ($errors->has('project_info'))
                                <span class="help-block">{{ $errors->first('project_info') }}</span>
                          @endif
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
