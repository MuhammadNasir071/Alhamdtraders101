@extends('backend.layouts.master-admin')
@section('body-content')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">All Categories</h4>
                </div>
                <div class="p-4">
                    <div class="table-responsive table--no-card m-b-40">
                        <table id="all_categories_list" class="table table-borderless table-striped table-earning" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $index => $category)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>
                                        <img src="{{ !is_null($category['image']) ? url('Uploads/categories/'.$category['image']) : ''}}" alt="Cate-image" style="width:50px;height:50px;border-radius:50%"></td>
                                    <td>{{$category['name']}}</td>
                                    <td>{{$category['level']}}</td>
                                    <td><div class="badge badge-success">Active</div></td>
                                    {{-- <td>
                                        <a href="{{route('admin.categories.show', $category->id)}}" data-id="{{$category->id}}" class="view-property item pr-2" data-toggle="tooltip" data-placement="buttom" title="View"><i class="zmdi zmdi-eye" style="font-size:17px;"></i></a>
                                        <a href="{{route('admin.categories.edit', $category->id)}}" data-id="{{$category->id}}" class="edit-property item pr-2" data-toggle="tooltip" data-placement="buttom" title="Edit"><i class="zmdi zmdi-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="{{$category->id}}" class="delete-shipping_type" data-toggle="tooltip" data-placement="buttom" title="Delete"><i class="zmdi zmdi-delete" style="font-size:17px;color:red"></i></a>
                                    </td> --}}
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
        $('#all_categories_list').DataTable();
    });
</script>
@endsection
