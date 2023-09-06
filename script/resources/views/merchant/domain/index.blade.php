@extends('layouts.backend.app')

@section('title',__('My Stores'))

@section('head')
@include('layouts.backend.partials.headersection',['title'=>__('Manage Store')])
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			@if (Session::has('message') || Session::has('success'))
			<div class="card-header">
				@if (Session::has('success'))
				<div class="alert alert-success">
					{{ Session::get('success') }}
				</div>
				@endif

				@if (Session::has('message'))
				<div class="col-12 col-md-12 col-lg-12">
					<div class="alert alert-{{ Session::get('type') }}">{{ Session::get('message') }}</div>
				</div>
				@endif
			</div>
			@endif
			<div class="card-body">
				<div class="d-flex align-items-center justify-content-between mb-3">
					<h5>{{ __('Manage Store') }}</h5>
					<div class="section-header-button">
						<a href="{{ route('merchant.domain.create') }}" class="btn btn-primary btn-lg">{{__('Add Store')}}</a>
					</div>
				</div>

				<div class="store-section">
					<div class="table-responsive" style="min-height:400px;">
						<table class="store_all table table-hover">
							<thead>
								<tr>
									<th>{{ __('Store Name') }}</th>
									<th>{{ __('Plan') }}</th>
									<th>{{ __('Will Expire') }}</th>
									<th>{{ __('Auto Renew') }}</th>
									<th>{{ __('Status') }}</th>
									<th>{{ __('Registered At') }}</th>
									<th>{{ __('Actions') }}</th>
								</tr>
							</thead>
							<tbody>
								@foreach($posts as $row)
								<tr>
									<td>{{ $row->id }}</td>
									<td>{{ $row->orderwithplan->plan->name ?? '' }}</td>
									<td>@if($row->will_expire < date('Y-m-d'))
										<span class="badge badge-warning">{{ __('Subscription Expired') }}</span>
										@else
										{{ $row->will_expire }}
										@endif
									</td>
									<td><span class="badge badge-{{ $row->auto_renew == 1 ? 'success' : 'warning' }}">{{ $row->auto_renew == 1 ? __('Enabled') : __('Disabled') }}</span></td>
									<td>
										@if($row->status == 1)
										<span class="badge badge-success">{{ __('Active') }} </span>
										@elseif($row->status == 2)
										<span class="badge badge-warning">{{ __('Pending') }}   </span>
										@else
										<span class="badge badge-danger">{{ __('Inactive') }}   </span>
										@endif
									</td>
									<td>
										{{ $row->created_at->diffforHumans()  }}
									</td>
									<td>
										@if($row->status == 1)
                                            <div class="dropdown d-inline">
                                                <button class="btn btn-primary dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{ __('Settings') }}
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item has-icon" href="{{ route('merchant.domain.edit',$row->id) }}"><i class="fas fa-store-alt"></i> {{ __('Store Info') }}</a>
                                                    <a class="dropdown-item has-icon" href="{{ route('merchant.domain.domainConfig',$row->id) }}"><i class="fas fa-fingerprint"></i>{{ __('Domain Configuration') }}</a>
                                                    <a class="dropdown-item has-icon" href="{{ route('merchant.domain.transfer',$row->id) }}"><i class="fas fa-user"></i> {{ __('Transfer Ownership') }}</a>
                                                    <a class="dropdown-item has-icon" href="{{ route('merchant.domain.renew',$row->id) }}"><i class="fas fa-sync"></i> {{ __('Renew Subscription') }}</a>
                                                    <a class="dropdown-item has-icon" href="{{ route('merchant.domain.plan',$row->id) }}"><i class="fas fa-sort-amount-up"></i>{{ __('Upgrade Plan') }}</a>
                                                    <a class="dropdown-item has-icon" href="{{ route('merchant.domain.developer',$row->id) }}"><i class="fas fa-cog"></i> {{ __('Developer Settings') }}</a>
                                                    <a class="dropdown-item has-icon login-confirm" data-id="{{ $row->id }}" href="#"><i class="fas fa-running"></i> {{ __('Login') }}</a>
                                                    <form class="d-none" id="login_form_{{ $row->id }}" action="{{ route('merchant.domain.login', $row->id) }}" method="POST">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        @endif

                                        @if($row->status == 3)
                                        <div class="dropdown d-inline">
                                            <button class="btn btn-outline-warning dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ __('Settings') }}
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item has-icon" href="{{ route('merchant.domain.renew',$row->id) }}"><i class="fas fa-sync"></i> {{ __('Renew Subscription') }}</a>
                                                <a class="dropdown-item has-icon" href="{{ route('merchant.domain.plan',$row->id) }}"><i class="fas fa-sort-amount-up"></i>{{ __('Upgrade Plan') }}</a>
                                            </div>
                                        </div>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{ $posts->links('vendor.pagination.bootstrap-4') }}
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('script')
<script>
    var loginConfirmation = "{{ __('Are you sure want to login with this store?') }}";
    var yesIwant = "{{ __('Yes, i want to login!') }}";
    var cancelText = "{{ __('Cancel') }}";
    var pleaseWait = "{{ __('Please Wait...') }}";
    var customDomainError = "{{ __('Custom domain is not supported in this plan, please upgrade the store plan') }}";
    var urlUnavailable = "{{ __('Sorry This Store URL is Unavailable') }}";
</script>
<script src="{{ asset('admin/js/merchant.js') }}"></script>
@endpush
