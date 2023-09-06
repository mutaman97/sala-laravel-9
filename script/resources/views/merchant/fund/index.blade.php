@extends('layouts.backend.app')

@section('title',__('My Wallet'))

@section('head')
    @include('layouts.backend.partials.headersection',['title'=>__('My Wallet')])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ __('Add Money To Your Account') }}</h4>
            </div>
            @if (Session::has('message'))
                    <div class="alert alert-{{ Session::get('type') ?? '' }}">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="form-divider"></div>
            <div class="card-body">
                <div class="current-banlence text-center mb-4">
                    <p class="h4" class="text-dark">{{ __('Current Balance') }}</p>
                    <h4 class="text-primary">{{ __(currency_symbol()) }}&nbsp;{{ number_format(Auth::User()->amount, 2) ?? 0 }}</h4>
                </div>
                <form action="{{ route('merchant.fund.store') }}" method="POST" class="ajaxform">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Enter Your Amount') }}</label>
                        <div class="input-group col-sm-12 col-md-7">
                            {{-- <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                            </div> --}}
                            <input type="number" required="" step="any" class="form-control" name="amount">
                            <div class="input-group-append">
                                <span class="input-group-text">{{ __(currency_symbol()) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></div>
                        <div class="col-sm-12 col-md-7">
                            <div class="custom-control custom-checkbox col-form-label">
                                <input required="" type="checkbox" name="agree" class="custom-control-input" id="agree">
                                <label class="custom-control-label" for="agree">{{ __('I agree with the') }} <a href="{{ url('/page/refund-policy') }}" target="_blank">{{ __('Refund Policy') }}</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></div>
                        <div class="col-sm-12 col-md-7">
                            <div class="buton-btn float-right">
                                <button type="submit" class="btn btn-primary btn-lg">{{ __('Next') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="{{ url('/') }}" id="url">
@endsection

@push('script')
 <script src="{{ asset('admin/js/fund.js') }}"></script>
@endpush
