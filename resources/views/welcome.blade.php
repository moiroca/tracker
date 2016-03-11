@extends('layouts.app')

@section('content')
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">MTN Cargo Forwarding</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#track">Track</a>
                    </li>
                    <li>
                        <a href="#services">About</a>
                    </li>
                    <li>
                        <a href="/login">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Full Width Image Header -->
    <header class="header-image">
        <div class="headline">
            <div class="container">
                <h2>MTN Cargo Forwarding</h2>
                <h3>Fast and reliable forwarding company in the Philippines.</h3>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container" id="track">
    	<div class="row">
	        <div class="col-lg-12">
	            <div class="box">
	                <div class="box-header">
	                  <div class='row'>
	                    <div class="col-md-12" style='margin-top:100px;'>
	                      <form method='GET' action="{{ route('index') }}">

	                        <label>Search Shippings <small><a href="{{ route('home') }}"></a></small></label>
	                        <div class="form-group form-group-lg">
	                          	<input type='text' name='code' placeholder='Search Shipping Using Code...' class='form-control' aria-describedby="basic-addon2">
	                          	
	                        </div>
	                      </form>
	                    </div>
	                  </div>
	                </div>
	                <!-- /.box-header -->
	                @if (isset($shipping))
	                	<div class="box-body">
	                		<div class="row">
	                			<div class="col-md-12">
	                				<p>Shipper Name : <b>{{ $shipping->shipper->getName() }}</b> </p>
	                				<p>Shipping Code : <b>{{ $shipping->code }}</b> </p>
	                			</div>
	                		</div>
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
				        					<td> {{ $shipping->origin->address }}</td>
				        					<td> {{ $shipping->addedBy->getName() }}</td>
				        					<td> {{ $shipping->created_at }} </td>
				        				</tr>
				        			@else
				        				<tr>
				        					<td> {{ $shipping->origin->address }}</td>
				        					<td> {{ $shipping->addedBy->getName() }}</td>
				        					<td> {{ $shipping->created_at }} </td>
				        				</tr>
				        			@endif
				        		</tbody>
				        	</table>
		                </div>
	                @endif
	                <!-- /.box-body -->
	            </div>
	        </div>
	    </div>
    </div>
    <!-- /.container -->

    <footer>
    	<center><small>Copyright @2016</small></center>
    </footer>
@endsection