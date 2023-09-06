@extends('layouts.backend.app')

@section('title','Select Payment')

@section('head')
    @include('layouts.backend.partials.headersection',['title'=>'Select Payment'],['prev'=> 'partner/fund'])
@endsection

 @section('content')
<div class="row">
    <div class="col-12">
         <div class="">
            <div class="">
                <div class="row">
                    <div class="col-lg-12">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="card w-100">
                            <ul class="nav nav-pills mx-auto getwaycard" id="myTab3" role="tablist">
                                @foreach ($gateways as $key => $gateway)
                                <li class="nav-item p-3">
                                    <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="getway-tab{{ $gateway->id }}" data-toggle="tab" href="#getway{{ $gateway->id }}" role="tab" aria-controls="home" aria-selected="true">
                                        <div class="card-body">
                                            @if ($gateway->logo)
                                            <img src="{{ asset($gateway->logo) }}" alt="{{ $gateway->name }}" width="100">
                                            @else
                                                {{ $gateway->name }}
                                            @endif
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <div class="card-footer">
                                <div class="tab-content" id="myTabContent2">
                                    @foreach ($gateways as $key => $gateway)
                                        @php $data = json_decode($gateway->data) @endphp
                                        <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="getway{{ $gateway->id }}" role="tabpanel" aria-labelledby="getway-tab{{ $gateway->id }}">
                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Transaction data') }}</label>
                                                    <div class="col-sm-12 col-md-7">

                                                <ul class="list-group">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        {{ __('Amount') }}

                                                        <span>{{ Session::get('deposit_amount') }}</span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        {{ __('Rate') }}
                                                        <span>{{ $gateway->rate }}</span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        {{ __('Charge') }}

                                                        <span>{{ $gateway->charge }}</span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        {{ __('Currency') }}
                                                        <span>{{ $gateway->currency_name ?? '' }}</span>
                                                    </li>
                                                    @php
                                                        $total_amount = (Session::get('deposit_amount') * $gateway->rate) + $gateway->charge;
                                                    @endphp
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        {{ __('Total') }}

                                                        <span>{{ number_format($total_amount,2) }}</span>

                                                    </li>


                                                </ul>
                                                <div class="form-text text-muted">{{ __('Make sure you pay the total amount above') }}</div>

                                                </div>

                                                </div>


                                                <div class="form-divider"></div>

                                            <form action="{{ route('merchant.fund.deposit') }}" method="post" id="payment-form" class="paymentform" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $gateway->id }}">
                                                {{-- <div class="card-body"> --}}
                                                    @if ($gateway->phone_required == 1)
                                                        <div class="form-group row mb-4">
                                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Phone Number') }}</label>
                                                            <div class="col-sm-12 col-md-7">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class="text-primary fas fa-phone fa-5x"></i>
                                                                        </div>
                                                                    </div>
                                                                    <input dir="ltr" type="tel" name="phone" class="form-control phone-number" maxlength="10" placeholder="0123456789" required {{ Session::has('phone') ? 'is-invalid' : '' }}>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if ($gateway->is_auto == 0)
                                                        <div class="form-group row mb-4">
                                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Payment Instructions') }}</label>
                                                            <div class="col-sm-12 col-md-7">
                                                                <p class="form-control" name="comment" required>{{ $gateway->data }}</p>
                                                                <div class="form-text text-muted">{{ __('Please see the above payment instruction to proceed your payment process') }}</div>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="form-group row mb-4">
                                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Screenshot') }}</label>
                                                            <div class="col-sm-12 col-md-7">
                                                                    <input accept="image/*" type="file" name="screenshot" id="image-upload"   required {{ Session::has('screenshot') ? 'is-invalid' : '' }}>
                                                                <br>
                                                                <div class="form-text text-muted">{{ __('Here you should upload screenshot to verify your payment') }}</div>
                                                            </div>

                                                        </div> --}}
                                                        <div class="form-group row mb-4">
                                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Screenshot') }}</label>
                                                            <div class="col-sm-12 col-md-7">
                                                              <div class="custom-file">
                                                                <input type="file" accept="image/*" name="screenshot" id="image-upload" class="custom-file-input" required {{ Session::has('screenshot') ? 'is-invalid' : '' }}>
                                                                <label class="custom-file-label">{{ __('Choose File') }}</label>
                                                              </div>
                                                              <div class="form-text text-muted">{{ __('Here you should upload screenshot to verify your payment') }}</div>
                                                            </div>
                                                          </div>

                                                        <div class="form-group row mb-4">
                                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Comment') }}</label>
                                                            <div class="col-sm-12 col-md-7">
                                                                <textarea class="form-control" name="comment" required placeholder="Enter any extra coments here"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-4">
                                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                            <div class="col-sm-12 col-md-7">
                                                                <button type="submit" class="btn btn-primary" id="submit_btn">{{ __('Submit Payment') }}</button>
                                                            </div>
                                                        </div>
                                                    @endif
                                                {{-- </div> --}}
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
