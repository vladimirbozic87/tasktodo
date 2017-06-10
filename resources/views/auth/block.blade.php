@extends('templates.default')

@section('content')

<div class="left-margin-content">

@if (Session::has('warning'))
  <div class="alert alert-danger" role="alert">
      <strong>{{ Session::get('warning') }}</strong>
  </div>
@endif

</div>

@stop
