@extends('layouts.backend.app')

@section('content')
<section class="section">
<div class="section-header">
   <h1>{{ __('PWA Settings') }}</h1>
</div>
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        <h4>{{ __('Add your PWA details from here') }}</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('seller.pwa.update') }}" enctype="multipart/form-data" class="ajaxform">
                @csrf
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('APP Title') }}</label>
                    <div class="col-sm-12 col-md-7">
                        <input class="form-control" name="pwa_app_title" value="{{ $pwa->name ?? '' }}" type="text" required="">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('App Name (Short Name)') }}</label>
                    <div class="col-sm-12 col-md-7">
                        <input class="form-control" name="pwa_app_name" value="{{ $pwa->short_name ?? '' }}" type="text" required="">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('APP Background Color (Dont use color code)') }}</label>
                    <div class="col-sm-12 col-md-7">
                        <input class="form-control" name="pwa_app_background_color" value="{{ $pwa->background_color ?? '' }}" type="text" required="">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('APP Theme Color') }}</label>
                    <div class="col-sm-12 col-md-7">
                        <input class="form-control" name="pwa_app_theme_color" value="{{ $pwa->theme_color ?? '' }}" type="text" required="">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('APP Main Language') }}</label>
                    <div class="col-sm-12 col-md-7">
                        <input class="form-control" name="app_lang" value="{{ $pwa->lang ?? '' }}" type="text" required="" placeholder="en-US">
                        <small>{{ __('Example: en-US') }}</small>
                    </div>
                </div>
                {{-- @php
                    dd($pwa);
                @endphp --}}
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('App Icon 128x128') }}</label>
                    <div class="col-sm-12 col-md-7">
                        <input class="form-control" name="app_icon_128x128" type="file" accept="image/.png">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('App Icon 144x144') }}</label>
                    <div class="col-sm-12 col-md-7">
                        <input class="form-control" name="app_icon_144x144" type="file" accept="image/.png">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('App Icon 152x152') }}</label>
                    <div class="col-sm-12 col-md-7">
                        <input class="form-control" name="app_icon_152x152" type="file" accept="image/.png">

                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('App Icon 192x192') }}</label>
                    <div class="col-sm-12 col-md-7">
                        <input class="form-control" name="app_icon_192x192" type="file" accept="image/.png">

                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('App Icon 512x512') }}</label>
                    <div class="col-sm-12 col-md-7">
                        <input class="form-control" name="app_icon_512x512" type="file" accept="image/.png">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('App Icon 256x256') }}</label>
                    <div class="col-sm-12 col-md-7">
                        <input class="form-control" name="app_icon_256x256" type="file" accept="image/.png">

                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <button type="submit" class="btn btn-primary float-left basicbtn">{{ __('Update') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
{{ mediasingle() }}
</section>
@endsection
