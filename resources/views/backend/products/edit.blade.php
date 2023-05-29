@extends('backend.layouts.master-admin')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form id="update_product_form" method="post" data-id="{{ $product[0]['id'] }}">
                <div class="card">

                    <div class="card-header"><h4>Edit Product</h4></div>
                    <div class="card-body">
                        <div class="cart-title mb-2"><h5>Basic Info</h5></div>
                        <div class="row">
                            <div class="col col-md-8">
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Title<font color="red">*</font></label>
                                    <input type="text" id="title" name="title"  class="form-control" value="{{ $product[0]['name'] }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-md-4 d-flex">
                                <div class="form-group mt-4">
                                    <input type="checkbox" id="is_available" name="is_available" value="1" {{$product[0]->availablity == 1 ? 'checked' : ''}}>
                                    <label for="is_available" class="m-0">{{__('Is Available?')}}<font color="red"></font></label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="min_price" class="control-label mb-1">Min Price (Rs.)<font color="red">*</font></label>
                                    <input type="number" id="min_price" name="min_price" class="form-control" value="{{ $product[0]['min_price'] }}">
                                    @error('min_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="max_price" class="control-label mb-1">Max Price (Rs.)<font color="red">*</font></label>
                                    <input type="number" id="max_price" name="max_price"  class="form-control" value="{{ $product[0]['max_price'] }}">
                                    @error('max_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="weight_unit" class="control-label mb-1">Measurement / Weight Unit<font color="red">*</font></label>
                                    <p style="font-size:14px">Please select the weight-unit of the given price.</p>
                                    <select id="weight_unit" name="weight_unit"  class="form-control">
                                        <option value="kilogram" {{isset($product[0]['weight_unit']) && ($product[0]['weight_unit'] == 'kilogram') ? 'selected' : ''}}>KiloGram</option>
                                        <option value="five-kg" {{isset($product[0]['weight_unit']) && ($product[0]['weight_unit'] == 'five-kg') ? 'selected' : ''}}>5-KiloGram</option>
                                        <option value="metric-ton" {{isset($product[0]['weight_unit']) && ($product[0]['weight_unit'] == 'metric-ton') ? 'selected' : ''}}>Metric ton</option>
                                        <option value="dozen" {{isset($product[0]['weight_unit']) && ($product[0]['weight_unit'] == 'dozen') ? 'selected' : ''}}>Dozen</option>
                                        <option value="pound" {{isset($product[0]['weight_unit']) && ($product[0]['weight_unit'] == 'pound') ? 'selected' : ''}}>Pound</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col">
                                <p style="font-size:14px">{{__("Note:: Select and upload at least 1 image of your product. Size between 500x500 and 2000x2000 px.")}}</p>
                                <img class="mb-2" width="170px" id="imagePreview" src="{{ !is_null($product[0]['media'][0]['name']) ? url('Uploads/products/'.$product[0]['media'][0]['name']) : asset('backend/images/placeholder_image.png') }}">
                                <div class="form-group">
                                    <input id="upload-photo" name="image" type="file" onchange="loadFile(event)" accept="image/*">
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col col-12" wire:ignore>
                                <div class="form-group">
                                    <label for="description">{{__('Property Description')}}<font color="red">*</font></label>
                                    <textarea type="text" class="form-control" name="description" rows="4" id="description" value="{{ $product[0]['details']  }}">{!! $product[0]['details'] !!}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="shipping_type">{{__('Shipping type')}}<font color="red">*</font></label>
                                    <select name="shipping_type" id="shipping_type" class="form-control">
                                        <option disabled>{{__('Select shipping type...')}}</option>
                                            @if(isset($shipping_types) && count($shipping_types) > 0)
                                                @foreach($shipping_types as $shipping_type)
                                                <option value="{{$shipping_type['id']}}" {{$product[0]['shipping_type_id'] == $shipping_type['id'] ? 'selected="selected"' : ''}}>{{$shipping_type['name']}}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-group mx-3">
                        <button type="submit" id="update_product_btn" class="btn btn-outline-info">Update</button>
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
 <script src="{{asset('backend/custom/products/create.js')}}"></script>
@endsection
