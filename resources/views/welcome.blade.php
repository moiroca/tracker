@extends('layouts.app')

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                  <div class='row'>
                    <div class="col-md-12" style='margin-top:100px;'>
                      <form method='GET' action="{{ route('index') }}">

                        <label>Search Shippings <small><a href="{{ route('home') }}"></a></small></label>
                        <div class="input-group">
                          	<input type='text' name='code' placeholder='Search Shipping Using Code...' class='form-control' aria-describedby="basic-addon2">
                          	<span class="input-group-btn">
                                <button type='submit' class="btn btn-default" type="button"><i class='glyphicon glyphicon-search'></i></button>
                            </span>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- /.box-header -->
                @if (isset($shippings))
                	<div class="box-body">
	                  <table id="example2" class="table table-bordered table-hover" style='margin-top: 20px;'>
	                    <thead>
	                    <tr>
	                      <th>Code</th>
	                      <th>Mode </th>
	                      <th>Shipper </th>
	                      <th>Consignee </th>
	                      <th>Origin</th>
	                      <th>Destination</th>
	                      <th>Status</th>
	                      <th>Date Created</th>
	                    </tr>
	                    </thead>
	                    <tbody>
	                        @forelse( $shippings as $shipping )
	                            <tr>
	                                <td>{{ $shipping->code }}</td>
	                                <td>{{ $shipping->mode }}</td>
	                                <td>{{ $shipping->shipper->getName() }}</td>
	                                <td>{{ $shipping->consignee->getName() }}</td>
	                                <td>{{ $shipping->origin->address }}</td>
	                                <td>{{ $shipping->location }}</td>
	                                <td>{{ $shipping->status }}</td>
	                                <td>{{ $shipping->created_at }}</td>
	                            </tr>
	                         @empty
	                         	<tr class='info'>
	                         		<td colspan=8>
	                         			<i class='glyphicon glyphicon-info-sign'></i> No Shipping Found.
 	                         		</td>
	                         	</tr>
	                        @endforelse
	                    </tbody>
	                    <tfoot>
	                    <tr>
	                      <th>Code</th>
	                      <th>Mode </th>
	                      <th>Shipper </th>
	                      <th>Consignee </th>
	                      <th>Origin</th>
	                      <th>Destination</th>
	                      <th>Status</th>
	                      <th>Date Created</th>
	                    </tr>
	                    </tfoot>
	                  </table>
	                </div>
                @endif
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection