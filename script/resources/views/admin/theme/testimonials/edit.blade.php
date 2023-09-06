@extends('layouts.backend.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ __('Edit Testimonial') }}</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Edit Testimonial') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.settings.testimonial.update',$testimonial->id) }}" method="POST" class="ajaxform" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Partner Name') }}</label>
                                        <input type="text" name="partner_name" placeholder="Partner Name" class="form-control" value="{{ $testimonial->title }}">
                                    </div>
                                </div>
                                @php
                                    $info = json_decode($testimonial->meta->value );
                                @endphp
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Partner Position') }}</label>
                                        <input type="text" name="partner_position" placeholder="Partner Position" class="form-control" value="{{ $info->partner_position }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Testimonial') }}</label>
                                        <textarea name="testimonial" placeholder="Testimonial" class="form-control" value="{{ $info->testimonial }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Store URL') }}</label>
                                        <input type="text" name="store_url" placeholder="Store URL" class="form-control" value="{{ $info->store_url }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="image">{{ __('Store Image') }}</label>
                                        <input type="file" class="form-control" name="store_image">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option {{ $testimonial->status == 1 ? 'selected' : '' }} value="1">{{ __('Active') }}</option>
                                            <option {{ $testimonial->status == 0 ? 'selected' : '' }} value="0">{{ __('Deactive') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="button-btn float-right">
                                        <button type="submit" class="btn btn-primary btn-lg">{{ __('Update') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
