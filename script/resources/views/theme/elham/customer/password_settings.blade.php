@extends('theme.elham.customer.app')
@section('customer_content')
<div class="row">
    <div class="col-sm-12">
        <div class="row-custom">
            <div class="profile-tab-content">
                {{-- < ?= view('partials/_messages'); ?> --}}
                <form action="{{ route('customer.password.update') }}" class="ajaxform_with_reset" method="post" id="form_validate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label">{{ __('Current Password') }}*</label>
                        <input type="password" name="current" class="form-control form-input" placeholder="{{ __('Name') }}" id="oldpassword" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">{{ __('New Password') }}*</label>
                        <input type="password" name="password" class="form-control form-input" placeholder="{{ __('Enter New Password') }}" id="password">
                    </div>
                    <div class="form-group">
                        <label class="control-label">{{ __('Retype New Password') }}*</label>
                        <input type="password" name="password_confirmation" class="form-control form-input" placeholder="{{ __('Enter Password Again') }}" id="password1" required>
                    </div>
                    <button type="submit" class="btn btn-md btn-custom basicbtn">{{ __('Save changes') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
@endpush
