@extends('layouts.backend.app')

@section('title', __('My Profile'))

@section('head')
    @include('layouts.backend.partials.headersection',['title'=>__('My Profile')],['prev'=> 'partner/dashboard'])
@endsection

@section('content')


<div class="section-body">
    <h2 class="section-title">{{ __('Hi') }}, {{ ucfirst(Auth::user()->name) }}</h2>
    <p class="section-lead">
        {{__('Change information about yourself on this page')}}
    </p>
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" src="{{ gravatar(Auth::user()->email) }}" class="rounded-circle profile-widget-picture">



                    <div class="profile-widget-items">


                        @if(Auth::user()->role_id == 1)
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">{{ __('Registered') }}</div>
                                <div class="profile-widget-item-value">{{ $info->created_at->diffForHumans() }}</div>
                            </div>
                        @elseif (Auth::user()->role_id == 2)
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">{{ __('Registered') }}</div>
                                <div class="profile-widget-item-value">{{ $info->created_at->diffForHumans() }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">{{ __('Total Stores') }}</div>
                                <div class="profile-widget-item-value">{{ $storesCount }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">{{ __('My Fund') }}</div>
                                <div class="profile-widget-item-value">{{ $fund }} {{ __(currency_symbol()) }}</div>
                            </div>
                        @elseif (Auth::user()->role_id == 3)
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">{{ __('Registered') }}</div>
                                <div class="profile-widget-item-value">{{ $info->created_at->diffForHumans() }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">{{ __('Total Earnings') }}</div>
                                <div class="profile-widget-item-value">{{ $totalEarnings }} {{ __(currency_symbol()) }}</div>
                            </div>
                        @elseif (Auth::user()->role_id == 5)
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">{{ __('Registered') }}</div>
                                <div class="profile-widget-item-value">{{ $info->created_at->diffForHumans() }}</div>
                            </div>
                        @endif


                    </div>
                </div>
                <div class="profile-widget-description">
                    {{-- <div class="profile-widget-name">
                        {{ ucfirst(Auth::user()->name) }}
                        <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div>
                            {{ __('Admin') }}
                        </div>
                    </div> --}}
                    {{-- {{__('Welcome! You can edit your profile from this page.') }} --}}
                </div>
                {{-- <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">
                        Follow Ujang On
                    </div>
                    <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-github mr-1">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div> --}}
                <form method="post" class="ajaxform_with_reset" action="{{ route('admin.users.passup') }}">
                    @csrf
                    <div class="card-header">
                        <h4>{{ __('Change Password') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-12">
                                <label>{{ __('Old Password') }}</label>
                                <input type="password" name="current" id="oldpassword" class="form-control"  placeholder="{{ __('Enter Old Password') }}" required="">
                                <div class="invalid-feedback">
                                    Please fill in the first name
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>{{ __('New Password') }}</label>
                                <input type="password" name="password" id="password" class="form-control"  placeholder="{{ __('Enter New Password') }}" required="">
                                <div class="invalid-feedback">
                                    Please fill in the first name
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>{{ __('Enter New Password Again') }}</label>
                                <input type="password" name="password_confirmation" id="password1" class="form-control"   placeholder="{{ __('Enter Again') }}" required="">
                                <div class="invalid-feedback">
                                    Please fill in the last name
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary basicbtn">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form method="post" id="ajaxform"  action="{{ route('admin.users.genupdate') }}">
                    @csrf
                    <div class="card-header">
                        <h4>{{ __('Edit Your Profile') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>{{ __('Name') }}</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $info->name }}" required="">
                                <div class="invalid-feedback">
                                    Please fill in the first name
                                </div>
                            </div>
                            {{-- <div class="form-group col-md-6 col-12">
                                <label>{{ __('Last Name') }}</label>
                                <input type="text" class="form-control" value="Maman" required="">
                                <div class="invalid-feedback">
                                    Please fill in the last name
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7 col-12">
                                <label>{{ __('Email') }}</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email"  value="{{ $info->email }}" required="">
                                <div class="invalid-feedback">
                                    Please fill in the email
                                </div>
                            </div>
                            <div class="form-group col-md-5 col-12">
                                <label>{{ __('Phone') }}</label>
                                <input type="tel" name="phone_number" class="form-control" required placeholder="0123456789" value="{{ $info->phone ?? '' }}">
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="form-group col-12">
                                <label>Bio</label>
                                <textarea class="form-control summernote-simple">Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="form-group mb-0 col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="subscribed_to_newsletter" class="custom-control-input" {{ $info->subscribed_to_newsletter ? 'checked' : '' }} id="newsletter">
                                    <label class="custom-control-label" for="newsletter">{{ __('Subscribe to newsletter') }}</label>
                                    <div class="text-muted form-text">
                                        {{ __('You will get new information about products, offers and promotions') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary basicbtn">{{ __('Update') }}</button>
                    </div>
                </form>
                <div class="form-divider hr"></div>
            </div>
        </div>
    </div>
</div>

    {{-- </section>
    </div> --}}







{{--
<div class="card">
    <div class="card-body">
       <div class="row">
        <div class="col-md-12">
            </div>
            <div class="col-md-6">
                <form method="post" id="ajaxform"  action="{{ route('admin.users.genupdate') }}">
                    @csrf
                    <h4 class="mb-20">{{ __('Edit Genaral Settings') }}</h4>
                    <div class="custom-form">
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" class="form-control" required placeholder="Enter User's  Name" value="{{ $info->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="text" name="email" id="email" class="form-control" required placeholder="Enter Email"  value="{{ $info->email }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info basicbtn">{{ __('Update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form method="post" class="ajaxform_with_reset" action="{{ route('admin.users.passup') }}">
                    @csrf
                    <h4 class="mb-20">{{ __('Change Password') }}</h4>
                    <div class="custom-form">
                        <div class="form-group">
                            <label for="oldpassword">{{ __('Old Password') }}</label>
                            <input type="password" name="current" id="oldpassword" class="form-control"  placeholder="Enter Old Password" required>
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('New Password') }}</label>
                            <input type="password" name="password" id="password" class="form-control"  placeholder="Enter New Password" required>
                        </div>
                        <div class="form-group">
                            <label for="password1">{{ __('Enter Again Password') }}</label>
                            <input type="password" name="password_confirmation" id="password1" class="form-control"  placeholder="Enter Again" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary basicbtn">{{ __('Change') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
@endsection
