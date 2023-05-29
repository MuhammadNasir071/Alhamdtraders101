@extends('backend.layouts.master-admin')
@section('body-content')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">All Queries</h4>
                </div>
                <div class="p-4">
                    <div class="table-responsive table--no-card m-b-40">
                        <table id="all_query_list" class="table table-borderless table-striped table-earning" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($queries as $index => $query)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$query['name']}}</td>
                                    <td>{{$query['email']}}</td>
                                    <td>{{$query['subject']}}</td>
                                    <td>
                                        <a href="{{route('admin.queries.show', $query->id)}}" data-id="{{$query->id}}" class="view-query item pr-2" title="View"><i class="zmdi zmdi-eye" style="font-size:17px;"></i></a>
                                        <a href="javascript:void(0)" data-id="{{$query->id}}" class="delete-query"><i class="zmdi zmdi-delete" title="Delete" style="font-size:17px;color:red"></i></a>
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
        $('#all_query_list').DataTable();
    });
</script>
<script src="{{asset('backend/custom/queries/delete.js')}}"></script>
@endsection
