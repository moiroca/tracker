@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Branches Table</h3>

	              <div class="box-tools">
	              		<a href="{{ route('branch.new') }}" class='btn btn-sm btn-primary'><i class='glyphicon glyphicon-plus'></i> NEW BRANCH</a>
	              </div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="example2" class="table table-bordered table-hover">
	                <thead>
	                <tr>
	                  <th>Address</th>
	                  <th>Date Created</th>
	                  <th>Action</th>
	                </tr>
	                </thead>
	                <tbody>
	                	@foreach($branches as $branch)
	                		<tr>
	                			<td>{{ $branch->address }}</td>
	                			<td>{{ $branch->created_at }}</td>
	                			<td>
                                  <a href="#" class='btn btn-info btn-sm'><i class='glyphicon glyphicon-edit'></i></a>
                                  <a href="#" class='btn btn-warning btn-sm'><i class='glyphicon glyphicon-trash'></i></a>
                                </td>
	                		</tr>
	                	@endforeach
	                </tbody>
	                <tfoot>
	                <tr>
	                  <th>Address</th>
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