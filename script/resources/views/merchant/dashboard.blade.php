@extends('layouts.backend.app')

@section('title','Dashboard')

@section('content')
<section class="section">
	<div class="section-header">
		<h1>{{ __('Dashboard') }}</h1>
	</div>
</section>

@if (session('status'))
<div class="alert alert-success">
    <div class="alert-body">
		<button class="close" data-dismiss="alert">
			<span>&times;</span>
		</button>
        {{ session('status') }}
    </div>
</div>
@endif

@if($total_active_stores == 0)
<div class="alert alert-light">
    <div class="alert-body">
		<button class="close" data-dismiss="alert">
			<span>&times;</span>
		</button>
		<div class="alert-title">{{ __('Congratulations') }}</div>
		    {{ __('Great news! Your registration was successful. Now, take the next step and start building your store by clicking the button below') }}
    </div>
    <a href="{{ route('merchant.domain.create') }}" class="btn btn-outline-primary btn-lg btn-icon icon-left mt-3"><i class="fas fa-store"></i>{{ __('Add Store') }}</a>
</div>
@endif
{{-- TODO --}}
<!--
<form method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <button type="submit" class="btn btn-link">Resend Verification Email</button>
</form>
-->
<div class="row">
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-wrap float-left">
				<div class="card-header">
					<h4>{{ __('Total Stores') }}</h4>
				</div>
				<div class="card-body">
					<span id="total_stores"><img src="{{ asset('uploads/loader.gif') }}"></span>
				</div>
			</div>
            <div class="card-icon bg-primary float-right">
				<i class="fas fa-store"></i>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-wrap float-left">
				<div class="card-header">
					<h4>{{ __('Active Stores') }}</h4>
				</div>
				<div class="card-body">
					<span id="total_active_stores"><img src="{{ asset('uploads/loader.gif') }}"></span>
				</div>
			</div>
            <div class="card-icon bg-primary float-right">
				<i class="fas fa-store-alt"></i>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-wrap float-left">
				<div class="card-header">
					<h4>{{ __('Expire Subscriptions') }}</h4>
				</div>
				<div class="card-body">
					<span id="total_expire_stores"><img src="{{ asset('uploads/loader.gif') }}"></span>
				</div>
			</div>
            <div class="card-icon bg-primary float-right">
				<i class="fas fa-history"></i>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-wrap float-left">
				<div class="card-header">
					<h4>{{ __('My Fund') }}</h4>
				</div>
				<div class="card-body">
					<span id="fund" class="text-primary"><img src="{{ asset('uploads/loader.gif') }}"></span>
                    <span class="text-primary">{{ __(currency_symbol()) }}</span>
				</div>
			</div>
            <div class="card-icon bg-primary float-right">
				<i class="fas fa-wallet"></i>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h4>{{ __('Invoices') }}</h4>
				<div class="card-header-action">
					<a href="{{url('partner/order')}}" class="btn btn-primary">{{ __('View More') }} <i class="fas fa-chevron-right"></i></a>
				</div>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive table-invoice">
					<table class="table table-striped">
						<tr>
							<th>{{ __('Invoice ID') }}</th>
							<th>{{ __('Store') }}</th>
							<th>{{ __('Status') }}</th>
							<th>{{ __('Expire Date') }}</th>
							<th>{{ __('Action') }}</th>
						</tr>
						@foreach($orders as $order)
						<tr>
							<td><a href="{{ url('partner/plan-invoice',$order->id)}}">{{ $order->invoice_no }}</a></td>
							<td class="font-weight-600">
								@isset($order->orderlog->tenant_id)
								<a href="{{ url('partner/domain/edit/'.$order->orderlog->tenant_id ?? '') }}">{{ $order->orderlog->tenant_id ?? '' }}</a>
								@endisset
							</td>
							<td>  @php
                                 $status = [
                                    0 => ['class' => 'badge-danger', 'text' => __('Rejected')],
                                    1 => ['class' => 'badge-primary', 'text' => __('Accepted')],
                                    2 => ['class' => 'badge-warning', 'text' => __('Pending')],
                                    3 => ['class' => 'badge-danger', 'text' => __('Expired')],
                                    4 => ['class' => 'badge-secondary', 'text' => __('Trash')],
                                ][$order->status];
                                @endphp
                                <span class="badge {{ $status['class'] }}">{{ $status['text'] }}</span>
                            </td>
							<td>{{ $order->will_expire }}</td>
							<td>
								<a href="{{ route('merchant.plan.show', $order->id) }}" class="btn btn-primary" data-toggle="tooltip" title="{{ __('View') }}"><i class="fas fa-eye"></i></a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-hero">
			<div class="card-header">
				<div class="card-icon">
					<i class="fas fa-bullhorn"></i>
				</div>
				<h4 id="upcoming_count"></h4>
				<div class="card-description">{{ __('Upcoming Renewal') }}</div>
			</div>
			<div class="card-body p-0">
				<div class="tickets-list">
					<div class="upcoming_renewals_html"></div>

					<a href="{{ url('/partner/domain') }}" class="ticket-item ticket-more">
						{{ __('View All') }}<i class="fas fa-chevron-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="base_url" value="{{ url('/') }}">
@endsection



@push('script')
<script>
    var loginConfirmation = "{{ __('Are you sure want to login with this domainbdgdg?') }}";
    var waitText = "{{ __('Please Wait') }}";
    var stockLimitExceeded = "{{ __('Opps maximum stock limit exceeded') }}";
    var productCode = "{{ __('Product Code') }}";
    var cartText = "{{ __('Add To Cart') }}";
    var stockOut = "{{ __('Out Of Stock') }}";
    var sdgText = "{{ __('SDG') }}";
</script>
<script src="{{ asset('admin/js/merchant.js') }}"></script>
<script src="{{ asset('admin/js/merchantdashboard.js') }}"></script>
@endpush

