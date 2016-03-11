@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if($errors->has('isRequestSuccess'))
              <div class='alert alert-success'>
                <i class='fa fa-info'></i> New Shippings Recorded
              </div>
            @endif

            @if(\Session::has('isUpdateShippingStatusRequestSuccess'))
              <div class='alert alert-success'>
                <i class='fa fa-info'></i> Update Shipping Completed  
              </div>
            @endif

            <div class="box">
                <div class="box-header">
                  <div class="row" style='margin-bottom: 10px;'>
                    <div class='col-md-10'>
                        <h3 class="box-title">Shippings Table</h3>           
                        <p><small> <i class="glyphicon glyphicon-info-sign"></i> By Clicking Code You Can Add Location</small></p>             
                    </div>
                    <div class='col-md-2'>
                        <div class="box-tools">
                              <a href="{{ route('shippings.new') }}" class='btn btn-sm btn-primary pull-right'><i class='glyphicon glyphicon-plus'></i> NEW SHIPPING</a>
                        </div>
                    </div>
                  </div>
                  <div class='row'>
                    <div class="col-md-12">
                      <form method='GET' action="{{ route('shippings') }}">
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
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>
                        Code
                      </th>
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
                                <td>
                                    <a href="{{ route('shippings.location.new', ['code' => $shipping->code]) }}" title="Click to add current location">{{ $shipping->code }}</a>
                                </td>
                                <td>{{ $shipping->mode }}</td>
                                <td>{{ $shipping->shipper->getName() }}</td>
                                <td>{{ $shipping->consignee->getName() }}</td>
                                <td>{{ $shipping->origin->address }}</td>
                                <td>{{ $shipping->location }}</td>
                                <td>
                                    @if ($shipping->status == \App\Utilities\Constant::SHIPPING_COMPLETE)
                                        <label class="label label-success"> <i class="glyphicon glyphicon-ok-sign"></i> {{ $shipping->status }}</label>
                                    @else
                                        <label class="label label-info"> <i class="glyphicon glyphicon-question-sign"></i> {{ $shipping->status }}</label>
                                    @endif
                                </td>
                                <td>{{ $shipping->created_at }}</td>
                                <td>
                                  @if ($shipping->status == \App\Utilities\Constant::SHIPPING_PENDING)
                                      <a href="{{ route('shippings.update', [ 'id' => $shipping->id ]) }}" class='btn btn-primary btn-sm'><i class='glyphicon glyphicon-save'></i></a>
                                  @endif
                                  <a href="#" class='btn btn-warning btn-sm'><i class='glyphicon glyphicon-edit'></i></a>
                                  <a href="#" class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'></i></a>
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
