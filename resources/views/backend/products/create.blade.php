@extends('backend.layouts.master-admin')
@section('title', 'Al-Hamd Traders - Add Product')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form id="add_product_form" method="post">
                <div class="card">
                    <div class="card-header"><h4>Add Product</h4></div>
                    <div class="card-body">
                        <div class="cart-title mb-2"><h5>Basic Info</h5></div>
                        <div class="row">
                            <div class="col col-md-8">
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Title<font color="red">*</font></label>
                                    <input type="text" id="title" name="title"  class="form-control">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-md-4 d-flex">
                                <div class="form-group mt-4">
                                    <input type="checkbox" id="is_available" name="is_available" value="1" checked>
                                    <label for="is_available" class="m-0">{{__('Is Available?')}}<font color="red"></font></label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="min_price" class="control-label mb-1">Min Price (Rs.)<font color="red">*</font></label>
                                    <input type="number" id="min_price" name="min_price"  class="form-control">
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
                                    <input type="number" id="max_price" name="max_price"  class="form-control">
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
                                        <option value="kilogram">KiloGram</option>
                                        <option value="five-kg">5-KiloGram</option>
                                        <option value="metric-ton">Metric ton</option>
                                        <option value="dozen">Dozen</option>
                                        <option value="pound">Pound</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3" id="category_parent_dev">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="parent_category">{{__('Category')}}</label>
                                    <select class="select form-control category" data-level="0" id="parent_category" name="parent_category">
                                        <option value="0">{{__("Select a category")}}</option>
                                        @if(isset($categories) && count($categories) > 0)
                                            @foreach($categories as $category)
                                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('parent_category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-md-6" id="child_category_div" style="display:none">
                                <div class="form-group">
                                    <label for="child_category">{{__('Child Category')}}</label>
                                    <select class="form-control" id="child_category" name="child_category">
                                        <option value="0">{{__("Select a child-category")}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <p style="font-size:14px">{{__("Note:: Select and upload at least 1 image of your product. Size between 500x500 and 2000x2000 px.")}}</p>
                                <img class="mb-2" width="170px" id="imagePreview" src="{{ asset('backend/images/placeholder_image.png') }}">
                                <div class="form-group">
                                    <input id="upload-photo" name="image" type="file" onchange="loadFile(event)" accept="image/*">
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col col-12" wire:ignore>
                                <div class="form-group">
                                    <label for="description">{{__('Property Description')}}<font color="red">*</font></label>
                                    <textarea type="text" class="form-control" name="description" rows="4" id="description"></textarea>
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
                                                <option value="{{$shipping_type['id']}}">{{$shipping_type['name']}}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-group mx-3">
                        <button type="submit" id="add_product_btn" class="btn btn-outline-info">Add Product</button>
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
