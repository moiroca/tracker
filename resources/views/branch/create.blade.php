@extends('layouts.admin')

@section('content')
	    <div class="row">
	        <div class="col-md-12">
	            <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">New Branch</h3>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		            <form role="form" action="{{ route('branch.create') }}" method="POST">
		            	{!! csrf_field() !!}
		              	<div class="box-body">	
			                <fieldset>
			                	<legend>Branch Information</legend>
			                	<div class="form-group {{ ($errors->has('address')) ? 'has-error' : '' }}">
				                  	<label for="address">Address</label>
				                  	<input type="text" class="form-control" name="address" id="address" placeholder="Enter Branch Addresss" value="{{ old('address') }}">
				                	@if ($errors->has('address'))
							            <span class="help-block">
							               <i class="glyphicon glyphicon-remove-sign"></i><strong> {{ $errors->first('address') }} </strong> 
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
