@extends('layouts.backend.app')

@section('title', __('Support Details'))

@section('head')
    @include('layouts.backend.partials.headersection',['title'=>__('Support Details')],['prev'=> 'partner/support'])
@endsection

@section('content')
    {{--    Deleted h-100 --}}
    {{-- <div class="row d-flex h-100"> --}}
    <div class="row d-flex">
        <div class="col-12 col-md-8 col-lg-6  mx-auto align-items-center ">
            <div class="card chat-box card-primary" id="mychatbox">
                <div class="card-header">
                    <h4><i class="fas fa-circle text-{{ $support->status == 1 ? 'success' : ($support->status == 2 ? 'warning' : 'danger') }} mr-2" title="Online" data-toggle="tooltip"></i>{{ $support->title }}</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ __('Status') }}


                            <span
                                class="text-white badge bg-{{ $support->status == 1 ? 'success' : ($support->status == 2 ? 'warning' : 'danger') }}">
                                {{ $support->status == 1 ? 'Active' : ($support->status == 2 ? 'Pending' : 'Inactive') }}
                        </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ __('Ticket No') }}
                            <span class="badge badge-primary">{{ $support->ticket_no }}</span>
                        </li>
                    </ul>
                </div>
                <div class="card-body chat-content">
                    @foreach ($support->meta as $item)
                        @if ($item->type == 1)
                            <div class="chat-item chat-right">
                                <img src="{{ gravatar($support->user->email) }}" alt="Avatar">
                                <div class="chat-details">
                                    <div class="chat-text">{{ $item->comment }}</div>
                                    <div class="chat-time">{{ $item->created_at->diffforhumans() }}</div>
                                </div>
                            </div>
                        @else
                            <div class="chat-item chat-left">
                                <img src="{{ gravatar("support@sala.sd") }}" alt="Avatar">
                                <div class="chat-details">
                                    <div class="chat-text">{{ $item->comment }}</div>
                                    <div class="chat-time">{{ $item->created_at->diffforhumans() }}</div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="card-footer chat-form">
                    <form action="{{ route('merchant.support.update', $support->id) }}" method="post" enctype="multipart/form-data" class="ajaxform_with_reload">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" name="comment" class="form-control" placeholder="{{ __('Type a message ...') }}">
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <button type="submit" class="btn btn-primary basicbtn"> --}}
                        <button type="submit" class="btn btn-primary">
                                <i class="far fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.nicescroll.min.js') }}"></script>

    <script>
        $(function() {
        $("div .chat-content").niceScroll({
            scrollspeed: 25,
            cursorcolor: "#7952B3",
            // cursorwidth: "8px",
            autohidemode: true,
            railpadding: {top:0,right:0,left:0,bottom:0},
        });

        $("div .chat-content").getNiceScroll(0).doScrollTop($("div .chat-content").get(0).scrollHeight, -1);
        });
    </script>

@endsection
