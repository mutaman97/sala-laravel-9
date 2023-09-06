@extends('layouts.backend.app')

@section('title', __('Support'))

@section('head')
    @include('layouts.backend.partials.headersection',['title'=>__('Support Tickets'),'button_name'=> __('Add New Ticket'),'button_link'=>
    route('merchant.support.create')])
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            @if (Session::has('success'))
                <div class="alert alert-danger">{{ Session::get('success') }}</div>
            @endif
            <div class="card-body">
                <div class="store-section">
					<div class="table-responsive" style="min-height:400px;">
                        <table class="store_all table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Ticket No') }}</th>
                                    <th scope="col">{{ __('Title') }}</th>
                                    <th scope="col">{{ __('Comment') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Date / Time') }}</th>
                                    <th scope="col">{{ __('Details') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supports as $key => $support)
                                    <tr>
                                        <td>{{ $support->ticket_no }}</td>
                                        <td>{{ Str::limit($support->title, 15) }}</td>
                                        <td>{{ Str::limit($support->meta[0]->comment, 15) ?? '' }}</td>
                                        <td>
                                            @if ($support->status == 1)
                                                <span class="badge badge-success">{{ __('Active') }}</span>
                                            @elseif($support->status == 2)
                                                <span class="badge badge-warning">{{ __('Pending') }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ __('Inactive') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $support->created_at->isoFormat('LL') }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-primary" href="{{ route('merchant.support.show', $support->id) }}" data-toggle="tooltip" title="{{ __('View') }}"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="float-right">
                    {{ $supports->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="support_status_url" value="{{ route('admin.support.status') }}">
<input type="hidden" id="support_info_url" value="{{ route('admin.support.info') }}">
<input type="hidden" id="ticket_form_url" value="{{ url('admin/support') }}">

<!-- Messenger -->
<div id="fb-root"></div>
<div class="fb-customerchat" attribution="setup_tool" page_id="101516195535411" theme_color="#8d5da7" guest_chat_mode="disabled" greeting_dialog_display="show">
</div>

<script>
    window.fbAsyncInit=function(){FB.init({xfbml:!0,version:"v3.2"})},function(e,t,n){var c,o=e.getElementsByTagName(t)[0];e.getElementById(n)||(c=e.createElement(t),c.id=n,c.src="https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js",o.parentNode.insertBefore(c,o))}(document,"script","facebook-jssdk");
</script>
@endsection

@push('js')
    <script src="{{ asset('admin/assets/js/support.js') }}"></script>
@endpush
