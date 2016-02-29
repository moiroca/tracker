@extends('layouts.admin')

@section('content')
	    <div class="row">
	        <div class="col-md-12">
	            <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">New User</h3>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		            <form role="form" action="{{ route('users.create') }}" method="POST">
		            	{!! csrf_field() !!}
		              	<div class="box-body">	
			                <fieldset>
			                	<legend>Basic Information</legend>
			                	<div class="form-group {{ ($errors->has('first_name')) ? 'has-error' : '' }}">
				                  	<label for="first_name">First Name</label>
				                  	<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" value="{{ old('first_name') }}">
				                	@if ($errors->has('first_name'))
							            <span class="help-block">
							               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('first_name') }} </strong> 
							            </span>
							        @endif
				                </div>
				                <div class="form-group {{ ($errors->has('last_name')) ? 'has-error' : '' }}">
					                <label for="last_name">Last Name</label>
					                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" value="{{ old('last_name') }}">
				                	@if ($errors->has('last_name'))
							            <span class="help-block">
							               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('last_name') }} </strong> 
							            </span>
							        @endif
				                </div>
					        </fieldset>
					        <fieldset>
			                	<legend>Contact Information</legend>
			                	<div class="form-group {{ ($errors->has('contact')) ? 'has-error' : '' }}">
				                  	<label for="contact">Contact</label>
				                  	<input type="text" class="form-control" name="contact" id="contact" placeholder="Enter Contact" value="{{ old('contact') }}">
				                	@if ($errors->has('contact'))
							            <span class="help-block">
							               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('contact') }} </strong> 
							            </span>
							        @endif
				                </div>
				                <div class="form-group {{ ($errors->has('address')) ? 'has-error' : '' }}">
				                  	<label for="address">Address</label>
				                  	<input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="{{ old('address') }}">
				                	@if ($errors->has('address'))
							            <span class="help-block">
							               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('address') }} </strong> 
							            </span>
							        @endif
				                </div>
					        </fieldset>
					        <fieldset>
			                	<legend>User Credentials</legend>
			                	<div class="form-group {{ ($errors->has('username')) ? 'has-error' : '' }}">
				                  	<label for="username">Username</label>
				                  	<input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" value="{{ old('username') }}">
				                	@if ($errors->has('username'))
							            <span class="help-block">
							               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('username') }} </strong> 
							            </span>
							        @endif
				                </div>
				                <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
				                  	<label for="password">Password</label>
				                  	<input type="password" class="form-control" name="password" id="password" placeholder="Password">
				                	@if ($errors->has('password'))
							            <span class="help-block">
							               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('password') }} </strong> 
							            </span>
							        @endif
				                </div>
				                <div class="form-group">
				                  <label for="password_confirmation">Confirm Password</label>
				                  <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
				                </div>
					        </fieldset>
					        <fieldset>
					        	<legend>System Information</legend>
					        	<div class="form-group {{ ($errors->has('branch')) ? 'has-error' : '' }}">
					                <label for="branch">Branch</label>
					                <select class="form-control" name="branch" id='branch'>
					                	<option value=''>Select Branch</option>
					                	@foreach($branches as $branch)
					                		<option {{ ( $branch->id == old('branch') ) ? 'selected=selected' : '' }}  value="{{ $branch->id }}">{{ $branch->address }}</option>
					                	@endforeach
					                </select>
					                @if ($errors->has('branch'))
							            <span class="help-block">
							               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('branch') }} </strong> 
							            </span>
							        @endif
				                </div>
					        	<div class="form-group {{ ($errors->has('role')) ? 'has-error' : '' }}">
					                <label for="role">Role</label>
					                <select class="form-control" name="role" id='role'>
					                	<option value=''>Select Role</option>
					                	@foreach($roles as $role)
					                		<option {{ ( $role->id == old('role') ) ? 'selected=selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
					                	@endforeach
					                </select>
					                @if ($errors->has('role'))
							            <span class="help-block">
							               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('role') }} </strong> 
							            </span>
							        @endif
				                </div>
					        </fieldset>
				        </div>
		              	<!-- /.box-body -->

		              	<div class="box-footer">
		               	 	<button type="submit" class="btn btn-primary">Submit</button>
		              	</div>
		            </form>
		         </div>
	        </div>
	    </div>
@endsection
