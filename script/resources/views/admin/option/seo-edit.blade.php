@extends('layouts.backend.app')
@section('title','SEO Option Edit')
@section('head')
@include('layouts.backend.partials.headersection',['title'=>'Edit SEO Information','prev'=> route('admin.seo.index') ])
@endsection

@section('content')
@php
    $value = json_decode($data->value ?? null);
@endphp

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ __('Edit SEO Option') }}</h4>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills d-flex justify-content-center" id="myTab3" role="tablist">
                    @foreach($actives as $lang => $val)
                        <li class="nav-item m-1">
                            <a class="nav-link @if(Session::get('locale') == $lang) active @endif" id="{{ __($lang) }}-tab3" data-toggle="tab" href="#{{ __($lang) }}" role="tab" aria-controls="{{ __($lang) }}" aria-selected="true">{{ __($val) }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="myTabContent2">
                    @foreach ($actives as $lang => $val)
                    <div class="tab-pane fade show @if(Session::get('locale') == $lang) active @endif" id="{{ __($lang) }}" role="tabpanel" aria-labelledby="{{ __($lang) }}-tab3">
                        <form method="POST" action="{{ route('admin.option.seo-update',$data->id) }}" class="ajaxform_with_reload">
                            @method("PUT")
                            @csrf
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Site Name') }}<sup class="text-danger">*</sup></label>
                                    <div class="col-sm-12 col-md-7">
                                        {{-- <input type="text" class="form-control" name="site_name" value="{{old('site_name') ? old('site_name') :$value->site_name}}"> --}}
                                        <input type="text" class="form-control" name="site_name_{{ $lang }}" value="{{ old('site_name_'.$lang) ?? $value->{'site_name_'.$lang} ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Mata Tag Name') }}<sup>*</sup></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" data-role="tagsinput" name="matatag_{{ $lang }}" value="{{ old('matatag_'.$lang) ?? $value->{'matatag_'.$lang} ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Twitter Site Title') }}<sup>*</sup></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="twitter_site_title_{{ $lang }}" value="{{ old('twitter_site_title_'.$lang) ?? $value->{'twitter_site_title_'.$lang} ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Mata Description') }} <sup>*</sup></label>
                                    <div class="col-sm-12 col-md-7" >
                                        <textarea name="matadescription_{{ $lang }}" id="" cols="30" rows="10" class="form-control">{{ old('matadescription_'.$lang) ?? $value->{'matadescription_'.$lang} ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary basicbtn btn-lg w-100" type="submit">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="locale[]" value="{{ $lang }}">
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


