@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if($errors->has('isRequestSuccess'))
              <div class='alert alert-success'>
                <i class='fa fa-info'></i> New Shippings Recorded
              </div>
            @endif
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Shippings Table</h3>

                  <div class="box-tools">
                        <a href="{{ route('shippings.new') }}" class='btn btn-sm btn-primary'><i class='glyphicon glyphicon-plus'></i> NEW SHIPPING</a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
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
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach( $shippings as $shipping )
                            <tr>
                                <td>{{ $shipping->code }}</td>
                                <td>{{ $shipping->mode }}</td>
                                <td>{{ $shipping->shipper->getName() }}</td>
                                <td>{{ $shipping->consignee->getName() }}</td>
                                <td>{{ $shipping->origin->address }}</td>
                                <td>{{ $shipping->location }}</td>
                                <td>{{ $shipping->status }}</td>
                                <td>{{ $shipping->created_at }}</td>
                                <td>
                                  <a href="#" class='btn btn-info btn-sm'><i class='glyphicon glyphicon-edit'></i></a>
                                  <a href="#" class='btn btn-warning btn-sm'><i class='glyphicon glyphicon-trash'></i></a>
                                </td>
                            </tr>
                        @endforeach
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
