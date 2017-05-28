@if(Auth::check())
   @php $class = "left-margin-content" @endphp
@else
   @php $class = "" @endphp
@endif


@if (Session::has('info'))
  <div class="alert alert-info {{ $class }}" role="alert">
     <strong>{{ Session::get('info') }}</strong>
  </div>
@endif

@if (Session::has('danger'))
  <div class="alert alert-danger {{ $class }}" role="alert">
     <strong>{{ Session::get('danger') }}</strong>
  </div>
@endif
