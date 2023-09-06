@extends('layouts.backend.app')

@section('content')
<section class="section">
<div class="section-header">
   <h1>{{ __('Additional Css & Js') }}</h1>
</div>

<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        <h4>{{ __('Custom css and js') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('seller.custom_css_js.update') }}" method="POST" class="ajaxform">
                @csrf
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('CSS Code') }}</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea name="css" id="css" cols="30" rows="15" class="form-control">{{ $css }}</textarea>
                        <small>{{ __('Write your css code without <style> </style> tags') }}</small>

                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('JS Code') }}</label>
                    <div class="col-sm-12 col-md-7">
                            <textarea name="js" id="js" cols="30" rows="15" class="form-control">{{ $js }}</textarea>
                        <small>{{ __('Write your js code without <script> </script> tags') }}</small>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                    <button type="submit" class="btn btn-primary basicbtn">{{ __('Save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
</section>
@endsection
