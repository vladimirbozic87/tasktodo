@extends('templates.default')

@section('content')

<div class="left-margin-content">

@if(Auth::user()->role_id == 1)

@include('templates.partials.steps')

<hr>

   <h3>Create Company</h3>

   <div class="row">
        <div class="col-lg-6">
        <!--<div class="col-lg-4 col-md-5 col-lg-offset-2 col-md-offset-3 col-sm-6 col-sm-offset-3">-->

          <form class="form-vertical" role="form" method="post" action="{{ route('company.index') }}">
                  <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                          <label for="company_name" class="control-label">Company name</label>
                          <input type="text" name="company_name" class="form-control" id="company_name" value="{{ Request::old('company_name') ?: '' }}">
                          @if ($errors->has('company_name'))
                                <span class="help-block">{{ $errors->first('company_name') }}</span>
                          @endif
                  </div>
                  <div class="form-group{{ $errors->has('company_info') ? ' has-error' : '' }}">
                          <label for="company_info" class="control-label">Company Info</label>
                          <textarea class="form-control" name="company_info" id="company_info" rows="3">{{ Request::old('company_info') ?: '' }}</textarea>
                          @if ($errors->has('company_info'))
                                <span class="help-block">{{ $errors->first('company_info') }}</span>
                          @endif
                  </div>

                  <div class="form-gorup">
                          <button type="submit" class="btn btn-primary">Create</button>
                  </div>
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
          </form>

        </div>
   </div>

@else
  <div class="alert alert-danger" role="alert">
      <strong>This account is not confirmed. Please contact your Project Manager</strong>
  </div>
@endif

</div>

@stop
