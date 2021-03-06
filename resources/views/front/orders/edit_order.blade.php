
@extends('layouts.app')
@section('metatag')

    <title>{{ getMetaByKey('orders') ? getMetaByKey('orders')->translate()->metatags_title : __('lang.orders') }}</title>

    <meta name="description" content="{{ getMetaByKey('orders') ? getMetaByKey('orders')->translate()->metatags_desc : '' }}">
@endsection
@section('content')
<div class="container my-5">
    <div class="row justify-content-center align-items-center login-form">
        <div class="col-md-12">
              <!--Form with header-->
            <form action="{{ route('orders.update',$order->orders_id) }}" method="post"  enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="card  rounded-0 client-auth-card ">
                    <div class="card-header p-0  ">
                        <div class=" text-white text-center py-2 bg-marine">
                            <h3><i class="fa fa-user"></i> {{ __('lang.edit_order') }} </h3>
                             
                        </div>
                    </div>

                    <div class="card-body p-3">
                        @include('admin::layouts.includes.messages')
                        @if (session()->has('status_danger'))
                            <div class="alert alert-danger text-sm-center">
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h6>{{ session('status_danger') }}</h6>
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <div class="alert alert-success text-sm-center">
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h6>{{ session('success') }}</h6>
                            </div>
                        @endif
                        <h2>{{__('lang.order_data')}}</h2>
                        @if($order->doctors_id == auth('doctor')->user()->doctors_id)
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="orders_treatment_period">{{ __('admin::lang.treatment_period') }}<span class="text-danger">  </span></label>
                            <div class="col-md-9">
                                {{ Form::text('orders_treatment_period',old('orders_treatment_period',isset($order) ? $order->orders_treatment_period : ''),['placeholder'=> __('admin::lang.treatment_period'),'class'=>' form-control'])}}              
                                @if ($errors->first('orders_treatment_period'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_treatment_period') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="orders_treatment_cost">{{ __('admin::lang.treatment_cost') }}<span class="text-danger">  </span></label>
                            <div class="col-md-9">
                                {{ Form::text('orders_treatment_cost',old('orders_treatment_cost',isset($order) ? $order->orders_treatment_cost : ''),['placeholder'=> __('admin::lang.treatment_cost'),'class'=>' form-control'])}}              
                                @if ($errors->first('orders_treatment_cost'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_treatment_cost') }}</div>
                                @endif
                            </div>
                        </div>
       
                      
                        <!-- <div class="form-group row ">
                            <label class="col-md-3 col-form-label" for="orders_prescription_img">{{ __('lang.prescription_img') }}<span class="text-danger">  </span></label>
                            <div class="col-md-9">
                            <input type="file" id="orders_prescription_img" name="orders_prescription_img" >
                            @if ($errors->first('orders_prescription_img'))
                                <div class="invalid-feedback">{{ $errors->first('orders_prescription_img') }}</div>
                            @endif
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="orders_prescription_img">{{ __('admin::lang.prescription_img') }}<span class="text-danger"> *</span></label>
                            <div class="col-md-9">
                                @include('admin::layouts.includes.imagePreview', ['name' => 'orders_prescription_img', 'value' => isset($order) ? $order->orders_prescription_img : null])
                                @if ($errors->first('orders_prescription_img'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_prescription_img') }}</div>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="orders_treatments_program">{{ __('admin::lang.treatments_program') }}<span class="text-danger"> *</span></label>
                            <div class="col-md-9">
                                <textarea id="{{ $locale }}-ckeditor" class="form-control ckeditor {{ $errors->first('orders_treatments_program') ? 'is-invalid' : '' }}"
                                name="orders_treatments_program" rows="9" placeholder="{{ __('admin::lang.treatments_program') }}"
                                >{{ old('orders_treatments_program', isset($order) ? $order->orders_treatments_program : '') }}</textarea>
                                @if ($errors->first('orders_treatments_program'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_treatments_program') }}</div>
                                @endif
                            </div>
                        </div>
                        
                        @endif

                        @if($order->orders_doctor_following == auth('doctor')->user()->doctors_id)
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ __('admin::lang.status') }}<span class="text-danger"> *</span></label>
                            <div class="col-md-9 col-form-label">
                                @php
                                $status = old('orders_status', isset($order) ? $order->orders_status : 'active');
                                @endphp
                                <div class="form-check form-check-inline mr-1">
                                <input class="form-check-input" id="status_0" type="radio" value="0" name="orders_status" {{ $status == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_0">{{ __('admin::lang.status_0') }}</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                <input class="form-check-input" id="status_1" type="radio" value="1" name="orders_status" {{ $status == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_1">{{ __('admin::lang.status_1') }}</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                <input class="form-check-input" id="status_2" type="radio" value="2" name="orders_status" {{ $status == '2' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_2">{{ __('admin::lang.status_2') }}</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                <input class="form-check-input" id="status_3" type="radio" value="3" name="orders_status" {{ $status == '3' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_3">{{ __('admin::lang.status_3') }}</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                <input class="form-check-input" id="status_4" type="radio" value="4" name="orders_status" {{ $status == '4' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_4">{{ __('admin::lang.status_4') }}</label>
                                </div>
                                @if ($errors->first('orders_status'))
                                <div class="invalid-feedback">{{ $errors->first('orders_status') }}</div>
                                @endif
                            </div>
                        </div>
                        <!-- orders_doctor_following_notes -->
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="orders_doctor_following_notes">{{ __('admin::lang.doctor_following_notes') }}<span class="text-danger">  </span></label>
                            <div class="col-md-9">
                                {{ Form::text('orders_doctor_following_notes',old('orders_doctor_following_notes',isset($order) ? $order->orders_doctor_following_notes : ''),['placeholder'=> __('admin::lang.doctor_following_notes'),'class'=>' form-control'])}}              
                                @if ($errors->first('orders_doctor_following_notes'))
                                    <div class="invalid-feedback">{{ $errors->first('orders_doctor_following_notes') }}</div>
                                @endif
                            </div>
                        </div>
                      
   
                        @endif

                       
                 
                        <div class="text-center">
                            <input type="submit" value="{{ __('lang.Save') }}" class="btn text-white bg-marine  btn-block rounded-0 py-2">
                        </div>
         

                    </div>

                </div>
            </form>
            <!--Form with header-->

        </div>
    </div>
</div>
@endsection
@section('script')
<script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
@include('admin::layouts.includes.ckeditor')

 
@endsection
 