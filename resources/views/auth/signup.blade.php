@extends('templates.default')

@section('content')
    <div class="row">
	    <div class="col-lg-6">

          <br>
          <div class="form-box-fieldset">

          <h3>Sign up</h3>
          <br>

	        <form class="form-vertical" role="form" method="post" action="{{ route('auth.signup') }}">
	            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                <label for="email" class="control-label">Your email address</label>
	                <input type="text" name="email" class="form-control" id="email" value="{{ Request::old('email') ?: '' }}">
	                @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
	                @endif
	            </div>
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
	                <label for="first_name" class="control-label">First name</label>
	                <input type="text" name="first_name" class="form-control" id="first_name" value="{{ Request::old('first_name') ?: '' }}">
	                @if ($errors->has('first_name'))
                        <span class="help-block">{{ $errors->first('first_name') }}</span>
	                @endif
	            </div>
                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
	                <label for="last_name" class="control-label">Last name</label>
	                <input type="text" name="last_name" class="form-control" id="last_name" value="{{ Request::old('last_name') ?: '' }}">
	                @if ($errors->has('last_name'))
                        <span class="help-block">{{ $errors->first('last_name') }}</span>
	                @endif
	            </div>
	            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
	                <label for="username" class="control-label">Choose a username</label>
	                <input type="text" name="username" class="form-control" id="username" value="{{ Request::old('username') ?: '' }}">
	                @if ($errors->has('username'))
                        <span class="help-block">{{ $errors->first('username') }}</span>
	                @endif
	            </div>
	            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                <label for="password" class="control-label">Choose a password</label>
	                <input type="password" name="password" class="form-control" id="password" value="">
	                @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
	                @endif
	            </div>
                <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
	                <label for="confirm_password" class="control-label">Confirm password</label>
	                <input type="password" name="confirm_password" class="form-control" id="confirm_password" value="">
	                @if ($errors->has('confirm_password'))
                        <span class="help-block">{{ $errors->first('confirm_password') }}</span>
	                @endif
	            </div>

	            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
	                <label for="role" class="control-label">Choose a role</label>
	                <select class="form-control" name="role">
	                	<option value="">--</option>
					  @foreach($roles as $role)

                         @if(Request::old('role') == $role->id)
                            @php $selected = "selected" @endphp
                         @else
                            @php $selected = "" @endphp
                         @endif
                       
                         <option value="{{ $role->id }}" {{ $selected }}>{{ $role->role_name }}</option>
                      @endforeach
					</select>
					 @if ($errors->has('role'))
                        <span class="help-block">{{ $errors->first('role') }}</span>
	                @endif

	            </div>

	            <div class="form-group">
	                <button type="submit" class="btn btn-primary">Sign up</button>
	            </div>
	            <input type="hidden" name="_token" value="{{ Session::token() }}">
	        </form>

         </div>

	    </div>
    </div> 
@stop