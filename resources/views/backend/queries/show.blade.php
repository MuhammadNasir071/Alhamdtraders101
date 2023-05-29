@extends('backend.layouts.master-admin')
@section('body-content')

<style>
    .font-weight-bold{
        /* color: red; */
    }
</style>
 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h3 class=" text-center pt-3">Query</h3>
                </div>
                <div class="card-body">
                    {{-- query view --}}
                    <div id="query" class="">
                        <div class="row mt-2 pb-5">
                            <div class="col col-3">
                                <div class="font-weight-bold p-2">Customer Name : </div>
                                <div class="font-weight-bold p-2">Email :</div>
                                <div class="font-weight-bold p-2">Subject : </div>
                                <div class="font-weight-bold p-2">Postal Code :</div>
                                <div class="font-weight-bold p-2">Messege : </div>
                            </div>
                            {{-- <div class="col col-1"></div> --}}
                            <div class="col col-7">
                                <div class="p-2">{{isset($query->name) ? $query->name : ''}}</div>
                                <div class="p-2">{{isset($query->email) ? $query->email : ''}}</div>
                                <div class="p-2">{{isset($query->subject) ? $query->subject : ''}}</div>
                                <div class="p-2">
                                    <div class="badge badge-success">{{isset($query->postal_code) ? $query->postal_code : ''}}</div>
                                </div>
                                <div class="p-2">{{isset($query->message) ? $query->message : ''}}</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stack('scripts')
@endsection
@section('scripts')
@endsection
