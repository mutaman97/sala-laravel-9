@extends('layouts.backend.app')

@push('css')
<!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/dropzone/dropzone.css') }}">
@endpush

@section('title','Dashboard')

@section('content')
<section class="section">
{{-- section title --}}
   <div class="section-header">
      <a href="{{ url('seller/banner/'.str_replace('_','-',$type)) }}" class="btn btn-primary mr-2">
         <i class="fas fa-arrow-left"></i>
      </a>
      <h1>{{ __('Edit Banner') }}</h1>
   </div>
{{-- /section title --}}
<div class="row">
   <div class="col-lg-12">
       <form class="ajaxform" method="post" action="{{ route('seller.banner.update',$info->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
               {{-- left side --}}
               <div class="col-lg-5">
                  <strong>{{ __('Image') }}</strong>
                  <p>{{ __('Upload banner image here') }}</p>
               </div>
               {{-- /left side --}}
               {{-- right side --}}
               <div class="col-lg-7">
                  <div class="card">
                     <div class="card-body">
                        {{mediasection(['preview'=>$info->preview->content ?? '','value'=>$info->preview->content ?? ''])}}
                     </div>
                  </div>
               </div>
               {{-- /right side --}}
            </div>
            <div class="row">
               {{-- left side --}}
               <div class="col-lg-5">
                  <strong>{{ __('Information') }}</strong>
                  <p>{{ __('Add your banner details and necessary information from here') }}</p>
               </div>
               {{-- /left side --}}
               {{-- right side --}}
               <div class="col-lg-7">
                  <div class="card">
                     <div class="card-body">

                              <div class="from-group row mb-2">
                                 <label for="" class="col-lg-12">{{ __('Title') }} </label>
                                 <div class="col-lg-12">
                                       <input type="text" value="{{ $info->name }}" required name="name" class="form-control">
                                 </div>
                              </div>
                              <div class="from-group row mb-2">
                                 <label for="" class="col-lg-12">{{ __('Description') }} </label>
                                 <div class="col-lg-12">
                                    <textarea class="form-control h-150" name="description">{{ $info->description->content ?? '' }}</textarea>
                                 </div>
                              </div>

                                <div class="from-group row mb-2">
                                    <label for="" class="col-lg-12">{{ __('Banner Width') }} </label>
                                    <div class="input-group col-lg-12">
                                        {{-- <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                        </div> --}}
                                        <input type="number" value="{{ $link->banner_width ?? '' }}" required="" step="any" class="form-control" name="banner_width">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>

                              <div class="from-group row mb-2">
                                 <label for="" class="col-lg-12">{{ __('Banner Link') }} </label>
                                 <div class="col-lg-12">
                                       <input type="text" value="{{ $link->link }}" required name="link" class="form-control">
                                 </div>
                              </div>
                              <div class="from-group row mb-2">
                                 <label for="" class="col-lg-12">{{ __('Button Name') }} </label>
                                 <div class="col-lg-12">
                                       <input type="text" value="{{ $link->button_text }}"  name="button_text" class="form-control">
                                 </div>
                              </div>

                                <div class="from-group row">
                                    <label for="" class="col-lg-12">{{ __('Banner Location') }} </label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="location_1" name="banner_location" value="featured_categories" class="custom-control-input" {{ $link->banner_location == 'featured_categories' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="location_1">{{ __('Featured Categories') }}</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="location_2" name="banner_location" value="latest_products" class="custom-control-input" {{ $link->banner_location == 'latest_products' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="location_2">{{ __('Latest Products') }}</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="location_3" name="banner_location" value="top_rated_products" class="custom-control-input" {{ $link->banner_location == 'top_rated_products' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="location_3">{{ __('Top Rated Products') }}</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="location_4" name="banner_location" value="promotion_area" class="custom-control-input" {{ $link->banner_location == 'promotion_area' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="location_4">{{ __('Promotion Area') }}</label>
                                </div>
                                <div class="form-text text-muted mb-2">{{ __('The banner will be added under the selected section') }}</div>



                                {{-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>{{ trans('location') }}&nbsp;<small>({{ trans('banner_location_exp') }})</small></label>
                                        </div>
                                        <div class="col-sm-12 col-option">
                                            <input type="radio" name="banner_location" value="featured_categories" id="location_1" class="square-purple" {{ $banner->banner_location == 'featured_categories' ? 'checked' : '' }}>
                                            <label for="location_1" class="option-label">{{ trans('featured_categories') }}</label>
                                        </div>
                                        <div class="col-sm-12 col-option">
                                            <input type="radio" name="banner_location" value="special_offers" id="location_2" class="square-purple" {{ $banner->banner_location == 'special_offers' ? 'checked' : '' }}>
                                            <label for="location_2" class="option-label">{{ trans('special_offers') }}</label>
                                        </div>
                                        <div class="col-sm-12 col-option">
                                            <input type="radio" name="banner_location" value="featured_products" id="location_3" class="square-purple" {{ $banner->banner_location == 'featured_products' ? 'checked' : '' }}>
                                            <label for="location_3" class="option-label">{{ trans('featured_products') }}</label>
                                        </div>
                                        <div class="col-sm-12 col-option">
                                            <input type="radio" name="banner_location" value="new_arrivals" id="location_4" class="square-purple" {{ $banner->banner_location == 'new_arrivals' ? 'checked' : '' }}>
                                            <label for="location_4" class="option-label">{{ trans('new_arrivals') }}</label>
                                        </div>
                                    </div>
                                </div> --}}





                              <input type="hidden" name="type" value="{{ $type }}">
                              <div class="row">
                                 <div class="col-lg-12">
                                       <button class="btn btn-primary basicbtn" type="submit">{{ __('Save') }}</button>
                                 </div>
                           </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</section>
{{ mediasingle() }}
@endsection

@push('script')
 <!-- JS Libraies -->
<script src="{{ asset('admin/plugins/dropzone/dropzone.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('admin/plugins/dropzone/components-multiple-upload.js') }}"></script>
<script src="{{ asset('admin/js/media.js') }}"></script>
@endpush

