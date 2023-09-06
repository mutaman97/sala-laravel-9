@extends('layouts.backend.app')

@section('title', 'Support')

@section('head')
    @include('layouts.backend.partials.headersection',['title'=>__('Support Details')],['prev'=> 'partner/support'])
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h4>{{ __('Create Support Tickect') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('merchant.support.store') }}" method="post" class="ajaxform_with_reset" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Title') }}</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="title" value="{{ old('title') }}" class="@error('title') is-invalid @enderror form-control" placeholder="{{ __('Enter Your Title') }}">
                            </div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                            <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric">
                                <option>Tech</option>
                                <option>News</option>
                                <option>Political</option>
                            </select>
                            </div>
                        </div> --}}
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ __('Comment') }}</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea name="comment" class="@error('description') is-invalid @enderror form-control" placeholder="{{ __('Message') }}"></textarea>
                            </div>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary basicbtn">{{ __('Submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
