@extends('templates.default')

@section('content')

<div class="left-margin-content">

<h3>User Profile</h3>

<br>

 <div class="row">
   <div class="col-lg-6">

           <div class="form-group">
               <label for="email" class="control-label">Email address</label>
               <input type="text" name="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
           </div>

           <div class="form-group">
               <label for="first_name" class="control-label">First name</label>
               <input type="text" name="first_name" class="form-control" id="first_name" value="{{ $user->first_name }}" readonly>
           </div>

           <div class="form-group">
               <label for="last_name" class="control-label">Last name</label>
               <input type="text" name="last_name" class="form-control" id="last_name" value="{{ $user->last_name }}" readonly>
           </div>

           <div class="form-group">
               <label for="username" class="control-label">Username</label>
               <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}" readonly>
           </div>

           <div class="form-group">
               <label for="role" class="control-label">Role</label>
               <select class="form-control" name="role" disabled>
                 <option value="">{{ $user->getRole() }}</option>
               </select>
           </div>

   </div>
 </div>

</div>

@stop
