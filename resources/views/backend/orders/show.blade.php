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
                    <h3 class=" text-center pt-3">Order Details</h3>
                </div>
                {{-- {{ dd($order) }} --}}
                <div class="card-body">
                    {{-- shipping type view --}}
                    <div id="shippingType" class="">
                        <h5>Product Info</h5>
                        <div class="row mt-2">
                            <div class="col col-4">
                                <img width="350px" height="300px" id="imagePreview" src="{{ !is_null($product[0]['media'][0]['name']) ? url('Uploads/products/'.$product[0]['media'][0]['name']) : asset('backend/images/placeholder_image.png') }}">
                            </div>
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Title: </div>
                                <div class="font-weight-bold p-2">Category: </div>
                                <div class="font-weight-bold p-2">Availablity:</div>
                                <div class="font-weight-bold p-2">Min Price:</div>
                                <div class="font-weight-bold p-2">Max Price:</div>
                            </div>
                            <div class="col col-6">
                                <div class="p-2">{{isset($product[0]->name) ? $product[0]->name : ''}}</div>
                                <div class="p-2">{{isset($product[0]['category']['name']) ? $product[0]['category']['name'] : ''}}</div>
                                <div class="p-2">{{isset($product[0]->Availablity) ? $product[0]->Availablity : ''}}</div>
                                @if ($product[0]->Availablity == 1)
                                    <div class="badge badge-success p-2">Available</div>
                                @else
                                    <div class="badge badge-danger p-2">Out of Stock</div>
                                @endif
                                <div class="p-2">{{isset($product[0]->min_price) ? $product[0]->min_price : ''}}</div>
                                <div class="p-2">{{isset($product[0]->max_price) ? $product[0]->max_price : ''}}</div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <h5>Product Details</h5><br>
                            <div class="mx-3">
                                {!! $product[0]['details'] !!}
                            </div>
                        </div>
                        <hr> <br>
                        <h5>Order Info</h5>
                        <div class="row mt-2">
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Name: </div>
                                <div class="font-weight-bold p-2">Contact:</div>
                                <div class="font-weight-bold p-2">State:</div>
                                <div class="font-weight-bold p-2">Postal Code:</div>
                                <div class="font-weight-bold p-2">Total Price:</div>
                            </div>
                            <div class="col col-3">
                                <div class="p-2">{{isset($order->name) ? $order->name : ''}}</div>
                                <div class="p-2">{{isset($order->contact) ? $order->contact : ''}}</div>
                                <div class="p-2">{{isset($order->state) ? $order->state : ''}}</div>
                                <div class="p-2">{{isset($order->postal_code) ? $order->postal_code : ''}}</div>
                                <div class="p-2">
                                    <div class="badge badge-info">{{isset($order->total_price) ? $order->total_price : ''}}</div>
                                </div>
                            </div>
                            <div class="col col-1"></div>
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Email: </div>
                                <div class="font-weight-bold p-2">Country:</div>
                                <div class="font-weight-bold p-2">City:</div>
                                <div class="font-weight-bold p-2">Quantity:</div>
                                <div class="font-weight-bold p-2">Address:</div>
                            </div>
                            <div class="col col-3">
                                <div class="p-2">{{isset($order->email) ? $order->email : ''}}</div>
                                <div class="p-2">{{isset($order->country) ? $order->country : ''}}</div>
                                <div class="p-2">{{isset($order->city) ? $order->city : ''}}</div>
                                <div class="p-2">
                                    <div class="badge badge-info">{{isset($order->quantity) ? $order->quantity : ''}}</div>
                                </div>
                                <div class="p-2">{{isset($order->address) ? $order->address : ''}}</div>
                            </div>
                        </div>
                        <hr><br>
                        <h5>Shipping Details</h5>
                        <div class="row mt-2">
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Shipping Title: </div>
                                <div class="font-weight-bold p-2">Min Days:</div>
                            </div>
                            <div class="col col-3">
                                <div class="p-2">{{isset($product[0]['shippingType']['name']) ? $product[0]['shippingType']['name'] : ''}}</div>
                                <div class="p-2">{{isset($product[0]['shippingType']['min_shipping_days']) ? $product[0]['shippingType']['min_shipping_days'] : ''}}</div>
                            </div>
                            <div class="col col-1"></div>
                            <div class="col col-2">
                                <div class="font-weight-bold p-2">Shipping Cost: </div>
                                <div class="font-weight-bold p-2">Max Days:</div>
                            </div>
                            <div class="col col-3">
                                <div class="p-2">{{isset($product[0]['shippingType']['shipping_cost']) ? $product[0]['shippingType']['shipping_cost'] : ''}}</div>
                                <div class="p-2">{{isset($product[0]['shippingType']['max_shipping_days']) ? $product[0]['shippingType']['max_shipping_days'] : ''}}</div>
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
