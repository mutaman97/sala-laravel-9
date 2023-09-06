@extends('theme.elham.customer.app')
@section('customer_content')
<div class="row">
    <div class="col-sm-12">
        <div class="row-custom">
            <div class="profile-tab-content">
                {{-- < ?= view('partials/_messages'); ?> --}}
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
        <div class="row-custom m-t-15">
            <div class="float-right">
                {{ $orders->links('vendor.pagination.theme.elham.paginator') }}
            </div>
        </div>
    </div>
</div>
@endsection
