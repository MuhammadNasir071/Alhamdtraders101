@extends('backend.layouts.master-admin')
@section('body-content')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">All Orders</h4>
                </div>

                <div class="p-4">
                    <div class="table-responsive table--no-card m-b-40">
                        <table id="all_orders_list" class="table table-borderless table-striped table-earning" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orders as $index => $order)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>#{{rand(111, 999).$order['id']}}</td>
                                    <td>{{$order['name']}}</td>
                                    <td>{{$order['email']}}</td>
                                    <td>{{$order['contact']}}</td>
                                    @if ($order['status'] == 'pending')
                                        <td><div class="badge badge-warning">Pending</div></td>
                                    @elseif ($order['status'] == 'cancelled')
                                        <td><div class="badge badge-danger">Cancelled</div></td>
                                    @else
                                        <td><div class="badge badge-success">Success</div></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('admin.orders.show', $order->id) }}" data-id="{{$order->id}}" class="item pr-2" ><i class="zmdi zmdi-eye" style="font-size:17px;"></i></a>
                                        <a href="{{ route('admin.orders.edit', $order->id) }}" data-id="{{$order->id}}" class="item pr-2" ><i class="zmdi zmdi-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@stack('scripts')
@endsection
@section('scripts')

<script>
    $(document).ready( function () {
        $('#all_orders_list').DataTable();
    });
</script>
{{-- <script src="{{asset('backend/custom/order/create.js')}}"></script>
<script src="{{asset('backend/custom/order/delete.js')}}"></script> --}}
@endsection
