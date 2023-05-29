@extends('backend.layouts.master-admin')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form id="shipping_types" method="post" data-id="{{ $shippingType->id }}">
                <div class="card">
                    <div class="card-header"><h4>Edit Shipping type</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="name">Name<font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$shippingType->name}}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-5 d-flex align-items-center">
                                <div class="form-group">
                                    <input type="checkbox" id="is_active" name="is_active" value="1" checked>
                                    <label for="is_active" class="m-0">Is Active?<font color="red"></font></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="shipping_cost">Shipping Cost<font color="red">* </font> ($)</label>
                                    <input type="number" class="form-control" name="shipping_cost" min="0" id="shipping_cost" value="{{$shippingType->shipping_cost}}">
                                    @error('shipping_cost')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="min_shipping_days">Min Shipping Days<font color="red">*</font></label>
                                    <input type="number" class="form-control shipping_days_validation" name="min_shipping_days" min="0" id="min_shipping_days" value="{{$shippingType->min_shipping_days}}">
                                    @error('min_shipping_days')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="max_shipping_days">Max Shipping Days<font color="red">*</font></label>
                                    <input type="number" class="form-control shipping_days_validation" name="max_shipping_days" min="0" id="max_shipping_days" value="{{$shippingType->max_shipping_days}}">
                                    @error('max_shipping_days')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-group mx-3">
                        <button type="submit" id="update-shipping_type_button" class="btn btn-outline-primary mr-2">Update</button>
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
 <script src="{{asset('backend/custom/shippingType/create.js')}}"></script>
@endsection
