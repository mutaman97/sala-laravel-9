@extends('theme.elham.customer.app')
@section('customer_content')
<div class="row">
    <div class="col-sm-12">
        <div class="row-custom">
            <div class="profile-tab-content">
                {{-- < ?= view('partials/_messages'); ?> --}}
                @if(!empty($posts))
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('Order') }}</th>
                            <th scope="col">{{ __('Rating') }}</th>
                            <th scope="col">{{ __('Comment') }}</th>
                            <th scope="col">{{ __('Date') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($posts ?? [] as $row)
                                <tr>
                                    <td><a href="{{ url('/customer/order/'.$row->order_id) }}">#{{ $row->order->invoice_no }}</a></td>
                                    <td>
                                        <div class="rating">
                                            <i class="{{ $row->rating >= 1 ? 'icon-star' : 'icon-star-o'; }}"></i>
                                            <i class="{{ $row->rating >= 2 ? 'icon-star' : 'icon-star-o'; }}"></i>
                                            <i class="{{ $row->rating >= 3 ? 'icon-star' : 'icon-star-o'; }}"></i>
                                            <i class="{{ $row->rating >= 4 ? 'icon-star' : 'icon-star-o'; }}"></i>
                                            <i class="{{ $row->rating >= 5 ? 'icon-star' : 'icon-star-o'; }}"></i>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $row->comment }}
                                    </td>
                                    <td>{{ $row->updated_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-center">
                    {{ __('No Reviews Found') }}
                </p>
                @endif
            </div>
        </div>
        <div class="row-custom m-t-15">
            <div class="float-right">
                {{ $posts->links('vendor.pagination.theme.elham.paginator') }}
            </div>
        </div>
    </div>
</div>
@endsection
