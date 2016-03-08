@extends('layouts.admin')

@section('content')
	    <div class="row">
	        <div class="col-md-12">
	        	@if($errors->has('isRequestSuccess'))
	              <div class='alert alert-success'>
	                <i class='fa fa-info'></i> New Shipping Location Recorded
	              </div>
	            @endif
	            <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">New Shipping Location</h3>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		            <form role="form" action="{{ route('shippings.location.create') }}" method="POST">
		            	{!! csrf_field() !!}
		              	<div class="box-body">	
		              		<div class='row'>
		              			<div class="col-md-12">
		              				<input type="hidden" class="form-control" name="shipping_code" id="shipping_code" value="{{ $shipping->code }}">
		              				<fieldset>
					                	<legend>Shipping Information</legend>
					                	<div class="form-group {{ ($errors->has('shipping_code')) ? 'has-error' : '' }}">
						                  	<label for="shipping_code">Shipping Code</label>
						                  	<input disabled type="text" class="form-control" placeholder="Enter Shipper First Name" value="{{ $shipping->code }}">
						                	@if ($errors->has('shipping_code'))
									            <span class="help-block">
									               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('shipping_code') }} </strong> 
									            </span>
									        @endif
						                </div>
						                <div class="form-group {{ ($errors->has('shipping_location')) ? 'has-error' : '' }}">
						                  	<label for="shipping_location">Location</label>
						                  	<input type="text" class="form-control" name="shipping_location" id="shipping_location" placeholder="Enter Shipping Location" value="{{ old('shipping_location') }}">
						                	@if ($errors->has('shipping_location'))
									            <span class="help-block">
									               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('shipping_location') }} </strong> 
									            </span>
									        @endif
						                </div>
							        </fieldset>
		              			</div>
		              		</div>
				        </div>
		              	<!-- /.box-body -->

		              	<div class="box-footer">
		               	 	<button type="submit" class="btn btn-primary">Save Location</button>
		              	</div>
		            </form>

		            <!-- Table For Locations -->
			        <table id="example2" class="table table-bordered table-hover">
		        		<thead>
		        			<th> Location </th>
		        			<th> Added By </th>
		        			<th> Date </th>
		        		</thead>
		        		<tbody>
		        			@if (!empty($shippingLocations->count()))
		        				@foreach ($shippingLocations as $shippingLocation)
			        				<tr>
			        					<td> {{ $shippingLocation->location }} </td>
			        					<td> {{ $shippingLocation->actor->getName() }}</td>
			        					<td> {{ $shippingLocation->created_at }} </td>
			        				</tr>
			        			@endforeach
			        			<tr>
		        					<td> {{ $shipping->location }}</td>
		        					<td> {{ $shipping->addedBy->getName() }}</td>
		        					<td> {{ $shipping->created_at }} </td>
		        				</tr>
		        			@else
		        				<tr>
		        					<td> {{ $shipping->location }}</td>
		        					<td> {{ $shipping->addedBy->getName() }}</td>
		        					<td> {{ $shipping->created_at }} </td>
		        				</tr>
		        			@endif
		        		</tbody>
		        	</table>
		         </div>
	        </div>
	    </div>
@endsection
