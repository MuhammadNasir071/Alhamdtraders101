@extends('backend.layouts.master-admin')
@section('body-content')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">All Properties</h4>
                </div>
                <div class="p-4">
                    <div class="table-responsive table--no-card m-b-40">
                        <table id="all_products_list" class="table table-borderless table-striped table-earning" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Availabllity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $index => $product)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$product['name']}}</td>
                                    <td>{{$product['category']['name']}}</td>
                                    @if ($product['availablity'] == 1)
                                        <td><div class="badge badge-success">Available</div></td>
                                    @else
                                        <td><div class="badge badge-danger">Out of Stock</div></td>
                                    @endif
                                    <td>
                                        <a href="{{route('admin.products.show', $product->id)}}" data-id="{{$product->id}}" class="view-product item pr-2" title="View"><i class="zmdi zmdi-eye" style="font-size:17px;"></i></a>
                                        <a href="{{route('admin.products.edit', $product->id)}}" data-id="{{$product->id}}" class="edit-product item pr-2" title="Edit"><i class="zmdi zmdi-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="{{$product->id}}" class="delete-product" title="Delete"><i class="zmdi zmdi-delete" style="font-size:17px;color:red"></i></a>
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
        $('#all_products_list').DataTable();
    });
</script>
<script src="{{asset('backend/custom/products/delete.js')}}"></script>
@endsection
