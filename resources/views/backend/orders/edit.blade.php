@extends('backend.layouts.master-admin')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form id="order_edit" method="post" data-id="{{ $order->id }}">
                <div class="card">
                    <div class="card-header"><h4>Update Order</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="id">Order ID</label>
                                    <input type="text" class="form-control" readonly name="id" id="id" value="#00{{$order->id}}">
                                </div>
                            </div>
                            <div class="col col-5 ">
                                <div class="form-group">
                                    <label for="status">Order Status<font color="red">*</font></label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="pending" {{isset($order->status) && ($order->status == 'pending') ? 'selected' : ''}}>Pending</option>
                                        <option value="cancelled" {{isset($order->status) && ($order->status == 'cancelled') ? 'selected' : ''}}>Cancelled</option>
                                        <option value="completed" {{isset($order->status) && ($order->status == 'completed') ? 'selected' : ''}}>Completed</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div><br>
                    <div class="form-group mx-3">
                        <button type="submit" id="update_order_btn" class="btn btn-outline-primary mr-2">Update</button>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
 </div>
 @stack('scripts')
 @endsection
 @section('scripts')
 <script src="{{asset('backend/custom/orders/create.js')}}"></script>
@endsection
