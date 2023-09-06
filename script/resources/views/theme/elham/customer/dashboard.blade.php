@extends('theme.elham.customer.app')
@section('customer_content')

<div class="row">
    <div class="col-12">
        @include('theme.elham.components._messages')
        <div class="profile-page-top">
            <div class="profile-details">
                <div class="left">
                    <img src="{{ gravatar(Auth::user()->email) }}" alt="{{ Auth::user()->name }}" class="img-profile">
                </div>
                <div class="right">
                    <div class="row-custom row-profile-username">
                        <h1 class="username">
                            <a href="javascript:void(0)">{{ Auth::user()->name }}</a>
                        </h1>
                        <i class="icon-verified icon-verified-member"></i>
                    </div>
                    <div class="row-custom">
                        <p class="description">{{ __('Hello') }}&nbsp;{{ Auth::user()->name }}
                            ({{ __("You're not") }} <strong>{{ Auth::user()->name  }}</strong>?
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>)
                            </p>
                    </div>
                    <div class="row-custom user-contact">
                        <span class="info">{{ __('Member Since') }}&nbsp;{{ Auth::user()->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="row-custom profile-buttons">
                        <div class="buttons">
                            <button class="btn btn-md btn-outline-gray"><i class="icon-dashboard"></i>{{__('Go to dashboard')}}</button>
                            <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#walletModal"><i class="icon-wallet"></i>{{ __('My wallet') }} ({{ __(currency_name()) }}&nbsp;{{ number_format(Auth::User()->wallet, 2) ?? 0 }}) </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<h1 class="page-title">{{ __('Latest Orders') }}</h1>

<div class="row">
    <div class="col-sm-12">
        <div class="row-custom">
            <div class="profile-tab-content">
                @if(!empty($orders))
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('Order') }}</th>
                            <th scope="col">{{ __('Total') }}</th>
                            <th scope="col">{{ __('Payment') }}</th>
                            <th scope="col">{{ __('Status') }}</th>
                            <th scope="col">{{ __('Date') }}</th>
                            <th scope="col">{{ __('Options') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orders ?? [] as $row)
                                <tr>
                                    <td>#{{ $row->invoice_no }}</td>
                                    <td class="render_currency">{{ number_format($row->total,2) }}</td>
                                    <td>
                                        @php
                                        if($row->payment_status == 1){
                                            $payment_status='Paid';
                                            $payment_badge='badge-success';
                                        }

                                        elseif($row->payment_status == 2){
                                            $payment_status='Pending';
                                            $payment_badge='badge-warning';
                                        }

                                        else{
                                            $payment_status='Payment Fail';
                                            $payment_badge='badge-warning';
                                        }
                                        @endphp
                                        <p><span class="badge {{ $payment_badge }}">
                                            {{ $payment_status }}
                                        </span></p>
                                    </td>
                                    <td>
                                        <p><span class="badge text-white" style="background-color: {{ $row->orderstatus->slug }}">
                                            {{ $row->orderstatus->name }}
                                        </span></p>
                                    </td>
                                    <td>{{ formatDate($row->created_at) }}</td>
                                    <td>
                                        <a href="{{ url('/customer/order/'.$row->id) }}" class="btn btn-sm btn-table-info">{{__('Details')}}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-center">
                    {{ __('No Records Found') }}
                </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
