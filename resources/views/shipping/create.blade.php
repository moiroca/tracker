@extends('layouts.admin')

@section('content')
	    <div class="row">
	        <div class="col-md-12">
	            <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">New Shipping</h3>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		            <form role="form" action="{{ route('shippings.create') }}" method="POST">
		            	{!! csrf_field() !!}
		              	<div class="box-body">	
		              		<div class='row'>
		              			<div class="col-md-6">
		              				<fieldset>
					                	<legend>Shipper Information</legend>
					                	<div class="form-group {{ ($errors->has('shipper_first_name')) ? 'has-error' : '' }}">
						                  	<label for="shipper_first_name">First Name</label>
						                  	<input type="text" class="form-control" name="shipper_first_name" id="shipper_first_name" placeholder="Enter Shipper First Name" value="{{ old('shipper_first_name') }}">
						                	@if ($errors->has('shipper_first_name'))
									            <span class="help-block">
									               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('shipper_first_name') }} </strong> 
									            </span>
									        @endif
						                </div>
						                <div class="form-group {{ ($errors->has('shipper_last_name')) ? 'has-error' : '' }}">
							                <label for="shipper_last_name">Last Name</label>
							                <input type="text" class="form-control" name="shipper_last_name" id="shipper_last_name" placeholder="Enter Shipper Last Name" value="{{ old('shipper_last_name') }}">
						                	@if ($errors->has('shipper_last_name'))
									            <span class="help-block">
									               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('shipper_last_name') }} </strong> 
									            </span>
									        @endif
						                </div>
						                <div class="form-group {{ ($errors->has('shipper_contact')) ? 'has-error' : '' }}">
						                  	<label for="shipper_contact">Contact</label>
						                  	<input type="text" class="form-control" name="shipper_contact" id="shipper_contact" placeholder="Enter Contact" value="{{ old('shipper_contact') }}">
						                	@if ($errors->has('shipper_contact'))
									            <span class="help-block">
									               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('shipper_contact') }} </strong> 
									            </span>
									        @endif
						                </div>
						                <div class="form-group {{ ($errors->has('shipper_address')) ? 'has-error' : '' }}">
						                  	<label for="shipper_address">Address</label>
						                  	<input type="text" class="form-control" name="shipper_address" id="shipper_address" placeholder="Enter Shipper Address" value="{{ old('shipper_address') }}">
						                	@if ($errors->has('shipper_address'))
									            <span class="help-block">
									               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('shipper_address') }} </strong> 
									            </span>
									        @endif
						                </div>
							        </fieldset>
		              			</div>
		              			<div class="col-md-6">
		              				<fieldset>
					                	<legend>Consignee Information</legend>
					                	<div class="form-group {{ ($errors->has('consignee_first_name')) ? 'has-error' : '' }}">
						                  	<label for="consignee_first_name">First Name</label>
						                  	<input type="text" class="form-control" name="consignee_first_name" id="consignee_first_name" placeholder="Enter Consignee First Name" value="{{ old('consignee_first_name') }}">
						                	@if ($errors->has('consignee_first_name'))
									            <span class="help-block">
									               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('consignee_first_name') }} </strong> 
									            </span>
									        @endif
						                </div>
						                <div class="form-group {{ ($errors->has('consignee_last_name')) ? 'has-error' : '' }}">
							                <label for="consignee_last_name">Last Name</label>
							                <input type="text" class="form-control" name="consignee_last_name" id="consignee_last_name" placeholder="Enter Consignee Last Name" value="{{ old('consignee_last_name') }}">
						                	@if ($errors->has('consignee_last_name'))
									            <span class="help-block">
									               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('consignee_last_name') }} </strong> 
									            </span>
									        @endif
						                </div>
						                <div class="form-group {{ ($errors->has('consignee_contact')) ? 'has-error' : '' }}">
						                  	<label for="consignee_contact">Contact</label>
						                  	<input type="text" class="form-control" name="consignee_contact" id="consignee_contact" placeholder="Enter Consignee Contact" value="{{ old('consignee_contact') }}">
						                	@if ($errors->has('consignee_contact'))
									            <span class="help-block">
									               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('consignee_contact') }} </strong> 
									            </span>
									        @endif
						                </div>
						                <div class="form-group {{ ($errors->has('consignee_address')) ? 'has-error' : '' }}">
						                  	<label for="consignee_address">Address</label>
						                  	<input type="text" class="form-control" name="consignee_address" id="consignee_address" placeholder="Enter Consignee Address" value="{{ old('consignee_address') }}">
						                	@if ($errors->has('consignee_address'))
									            <span class="help-block">
									               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('consignee_address') }} </strong> 
									            </span>
									        @endif
						                </div>
							        </fieldset>
		              			</div>
		              		</div>
			                
					        <fieldset>
			                	<legend>Shipping Information</legend>
			                	<div class="form-group {{ ($errors->has('mode')) ? 'has-error' : '' }}">
				                  	<label for="mode">Mode</label>
				                  	<select class="form-control" name="mode" id="mode">
				                  		<option value=''>Select Mode</option>
				                  		@foreach($modes as $mode)
				                  			<option {{ ( $mode == old('mode') ) ? 'selected=selected' : '' }} value="{{ $mode }}">{{ $mode }}</option>
				                  		@endforeach
				                  	</select>
				                	@if ($errors->has('mode'))
							            <span class="help-block">
							               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('mode') }} </strong> 
							            </span>
							        @endif
				                </div>
			                	<div class="form-group {{ ($errors->has('origin')) ? 'has-error' : '' }}">
				                  	<label for="origin">Origin Branch</label>
				                  	<select class="form-control" name="origin" id="origin">
				                  		<option value=''>Select Branch</option>
				                  		@foreach($branches as $branch)
				                  			<option {{ ( $branch->id == old('origin') ) ? 'selected=selected' : '' }} value="{{ $branch->id }}">{{ $branch->address }}</option>
				                  		@endforeach
				                  	</select>
				                  	@if ($errors->has('origin'))
							            <span class="help-block">
							               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('origin') }} </strong> 
							            </span>
							        @endif
				                </div>
				                <div class="form-group {{ ($errors->has('destination_branch')) ? 'has-error' : '' }}">
				                  	<label for="destination_branch">Destination Branch</label>
				                  	<select class="form-control" name="destination_branch" id="destination_branch">
				                  		<option value=''>Select Destination Branch</option>
				                  		@foreach($branches as $branch)
				                  			<option {{ ( $branch->id == old('destination_branch') ) ? 'selected=selected' : '' }} value="{{ $branch->id }}">{{ $branch->address }}</option>
				                  		@endforeach
				                  	</select>
				                  	@if ($errors->has('destination_branch'))
							            <span class="help-block">
							               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('destination_branch') }} </strong> 
							            </span>
							        @endif
				                </div>
				                <div class="form-group {{ ($errors->has('location')) ? 'has-error' : '' }}">
					                <label for="location">Location</label>
					                <input type="text" class="form-control" name="location" id="location" placeholder="Enter Location" value="{{ old('location') }}">
				                	@if ($errors->has('location'))
							            <span class="help-block">
							               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('location') }} </strong> 
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
