@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			@if($errors->has('isRequestSuccess'))
				<div class='alert alert-success'>
					<i class='fa fa-info'></i> New User Added
				</div>
			@endif
			<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Users Table</h3>

	              <div class="box-tools">
	              		<a href="{{ route('users.new') }}" class='btn btn-sm btn-primary'><i class='glyphicon glyphicon-plus'></i> NEW USER</a>
	              </div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="example2" class="table table-bordered table-hover">
	                <thead>
	                <tr>
	                  <th>Username</th>
	                  <th>Name </th>
	                  <th>Role</th>
	                  <th>Branch</th>
	                  <th>Date Created</th>
	                  <th>Action</th>
	                </tr>
	                </thead>
	                <tbody>
	                @foreach( $users as $user )
	                	<tr>
	                		<td>{{ $user->username }}</td>
	                		<td>{{ $user->getName() }}</td>
	                		<td>
	                			<ul>
		                			@foreach($user->roles as $userRole)
		                				{{ $userRole->name }}
		                			@endforeach
	                			</ul>
	                		</td>
	                		<td> 
	                			<ul>
		                			@foreach($user->employerBranch as $userBranch)
		                				{{ $userBranch->address }}
		                			@endforeach
	                			</ul>
	                		</td>
	                		<td>{{ $user->created_at }}</td>
	                		<td>
	                			<a href="{{ route('users.edit', ['id' => $user->id]) }}" class='btn btn-info btn-sm'><i class='glyphicon glyphicon-edit'></i></a>
	                			<a href="#" class='btn btn-warning btn-sm'><i class='glyphicon glyphicon-trash'></i></a>
	                		</td>
	                	</tr>
	                @endforeach
	                </tbody>
	                <tfoot>
	                <tr>
	                  <th>Username</th>
	                  <th>Name</th>
	                  <th>Role</th>
	                  <th>Branch</th>
	                  <th>Date Created</th>
	                  <th>Action</th>
	                </tr>
	                </tfoot>
	              </table>
	            </div>
           	 	<!-- /.box-body -->
          	</div>
		</div>
	</div>
@endsection