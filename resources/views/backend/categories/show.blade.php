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
                    <h3 class=" text-center pt-3">Shipping Type</h3>
                </div>
                <div class="card-body">
                    {{-- shipping type view --}}
                    <div id="shippingType" class="">
                        <div class="row mt-2">
                            <div class="col col-3">
                                <div class="font-weight-bold p-2">Name: </div>
                                <div class="font-weight-bold p-2">Min shipping days:</div>
                                <div class="font-weight-bold p-2">Max shipping days:</div>
                                <div class="font-weight-bold p-2">Shipping cost: </div>
                            </div>
                            <div class="col col-6">
                                <div class="p-2">{{isset($shippingType->name) ? $shippingType->name : ''}}</div>
                                <div class="p-2">{{isset($shippingType->min_shipping_days) ? $shippingType->min_shipping_days : ''}}</div>
                                <div class="p-2">{{isset($shippingType->min_shipping_days) ? $shippingType->min_shipping_days : ''}}</div>
                                <div class="p-2">{{isset($shippingType->shipping_cost) ? $shippingType->shipping_cost: ''}}</div>

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
