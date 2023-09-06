@extends('theme.elham.customer.app')
@section('customer_content')
<div class="row">
    <div class="col-sm-12">
        <div class="row-custom">
            <div class="profile-tab-content">
                {{-- < ?= view('partials/_messages'); ?> --}}
                <form action="{{ route('customer.profile.update') }}" class="ajaxform" method="post" id="form_validate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div id="edit_profile_cover" class="edit-profile-cover edit-cover-no-image">
                            <div class="edit-avatar">
                                <a class="btn btn-md btn-custom btn-file-upload">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                                    </svg>
                                    <input type="file" name="file" size="40" accept=".png, .jpg, .jpeg, .gif" data-img-id="img_preview_avatar" onchange="showImagePreview(this);">
                                </a>
                                <img src="{{ gravatar(Auth::user()->email) }}" alt="{{ gravatar(Auth::user()->name) }}" id="img_preview_avatar" class="img-thumbnail lazyload" width="180" height="180">
                            </div>
                            {{-- <div class="btn-container">
                                <a class="btn btn-md btn-custom btn-file-upload btn-edit-cover">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                                    </svg>
                                    <input type="file" name="image_cover" size="40" accept=".png, .jpg, .jpeg, .gif" data-img-id="edit_profile_cover" onchange="showImagePreview(this, true);">
                                </a>
                                <a class="btn btn-md btn-custom btn-file-upload btn-edit-cover" onclick="deleteCoverImage();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                    </svg>
                                </a>
                            </div> --}}
                        </div>
                        <style>#edit_profile_cover {background-image: url(https://random.imagecdn.app/v1/image?category=background);}</style>
                        <p class="mb-4"><small class="text-muted">*{{ __('Click on the save changes button after selecting your image') }}</small></p>
                    </div>
                    <div class="form-group">
                        <label class="control-label">{{ __('Name') }}</label>
                        <input type="text" name="name" class="form-control form-input" value="{{ auth()->user()->name ?? '' }}" placeholder="{{ __('Name') }}" maxlength="250" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            {{ __('Email Address') }}
                            @if(auth()->user()->email_confirmed == 1)
                            <small class="text-success">({{ __('Confirmed') }})</small>
                            @else
                            <small class="text-danger">(<?= trans("unconfirmed"); ?>)</small>
                            <a href="javascript:void(0)" class="color-link link-underlined font-weight-normal" onclick="sendActivationEmail('< ?= user()->token; ?>', 'profile');">{{ __('Resend activation email') }}</a>
                            <div class="display-inline-block font-weight-normal m-l-5" id="confirmation-result-profile">
                            </div>
                            @endif
                        </label>
                        <input type="email" name="email" class="form-control form-input" value="{{ auth()->user()->email ?? '' }}" placeholder="{{ __('Email Adress') }}" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">{{ __('Phone Number') }}</label>
                        <input type="text" name="phone" class="form-control form-input" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="{{ auth()->user()->phone ?? '' }}" placeholder="{{ __('Phone Number') }}" maxlength="30">
                    </div>

                    <div class="form-group">
                        <label class="control-label">{{ __('Address') }}</label>
                        <input type="text" name="address" class="form-control form-input" value="{{ $meta->address ?? '' }}" placeholder="{{ __('Address') }}" id="location_input" required>
                    </div>


                    <div class="form-group">
                        <label class="control-label">{{ __('Zip Code') }}</label>
                        <input type="text" name="post_code" class="form-control form-input" value="{{ $meta->post_code ?? '' }}" placeholder="{{ __('Zip Code') }}" required>
                    </div>

                    <input type="hidden" name="lat" id="latitude" value="{{ $meta->lat ?? '' }}">
                    <input type="hidden" name="long" id="longitude" value="{{ $meta->long ?? '' }}">

                    <div class="form-group">
                        @if(!empty($order_settings->google_api ?? ''))
                        <div class="col-lg-12 col-12 @if(empty($meta->long ?? '')) none @endif" id="map-area">
                            <label>{{ __('Drag Your Location') }}</label>
                            <div id="map-canvas" class="map-canvas h-300 w-100p"></div>
                        </div>
                        @endif
                    </div>

                    <div class="form-group m-b-30">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="subscribed_to_newsletter" id="subscribed_to_newsletter" class="custom-control-input" {{ auth()->user()->subscribed_to_newsletter ? 'checked' : '' }}>
                            <label for="subscribed_to_newsletter" class="custom-control-label">{{ __('Subscribe to newsletter?') }}</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-md btn-custom basicbtn">{{ __('Save changes') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@if(!empty($order_settings->google_api ?? ''))
@push('js')
 <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $order_settings->google_api ?? '' }}&libraries=places&callback=initialize"></script>
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
<script src="{{ asset('admin/js/user-settings.js') }}"></script>
@endpush
@endif
