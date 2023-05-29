@extends('backend.layouts.master-admin')
@section('body-content')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">All Shipping type</h4>
                </div>
                <div class="p-4">
                    <div class="table-responsive table--no-card m-b-40">
                        <table id="all_shippingType_list" class="table table-borderless table-striped table-earning" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Min Shipping Days</th>
                                    <th>Max Shipping Days</th>
                                    <th>Shipping Cost</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($shippingTypes as $index => $shippingType)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$shippingType['name']}}</td>
                                    <td>{{$shippingType['min_shipping_days']}}</td>
                                    <td>{{$shippingType['max_shipping_days']}}</td>
                                    <td>{{$shippingType['shipping_cost']}}</td>
                                    <td>
                                        <a href="{{route('admin.shippingtype.show', $shippingType->id)}}" data-id="{{$shippingType->id}}" class="view-property item pr-2" data-toggle="tooltip" data-placement="buttom" title="View"><i class="zmdi zmdi-eye" style="font-size:17px;"></i></a>
                                        <a href="{{route('admin.shippingtype.edit', $shippingType->id)}}" data-id="{{$shippingType->id}}" class="edit-property item pr-2" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="zmdi zmdi-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="{{$shippingType->id}}" class="delete-shipping_type" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="zmdi zmdi-delete" style="font-size:17px;color:red"></i></a>
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
        $('#all_shippingType_list').DataTable();
    });
</script>
<script src="{{asset('backend/custom/shippingType/create.js')}}"></script>
<script src="{{asset('backend/custom/shippingType/delete.js')}}"></script>
@endsection
