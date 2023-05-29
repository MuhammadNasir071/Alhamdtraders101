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
                    <h3 class=" text-center pt-3">Product details</h3>
                </div>
                <div class="card-body">
                    {{-- product view --}}
                    <div id="properties" class="">
                        <div class="row mt-2">
                            <div class="col col-4">
                                <img width="350px" height="300px" id="imagePreview" src="{{ !is_null($productDetals[0]['media'][0]['name']) ? url('Uploads/products/'.$productDetals[0]['media'][0]['name']) : asset('backend/images/placeholder_image.png') }}">
                            </div>
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Title: </div>
                                <div class="font-weight-bold p-2">Category: </div>
                                <div class="font-weight-bold p-2">Availablity:</div>
                                <div class="font-weight-bold p-2">Min Price:</div>
                                <div class="font-weight-bold p-2">Max Price:</div>
                            </div>
                            <div class="col col-6">
                                <div class="p-2">{{isset($productDetals[0]->name) ? $productDetals[0]->name : ''}}</div>
                                <div class="p-2">{{isset($productDetals[0]['category']['name']) ? $productDetals[0]['category']['name'] : ''}}</div>
                                @if ($productDetals[0]->availablity == 1)
                                    <div class="badge badge-success p-2">In Stock</div>
                                @else
                                    <div class="badge badge-danger p-2">Out of Stock</div>
                                @endif
                                <div class="p-2">{{isset($productDetals[0]->min_price) ? $productDetals[0]->min_price : ''}}</div>
                                <div class="p-2">{{isset($productDetals[0]->max_price) ? $productDetals[0]->max_price : ''}}</div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row mt-2">
                            <h5>Product Details</h5><br>
                            <div class="mx-3">
                                {!! $productDetals[0]['details'] !!}
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
