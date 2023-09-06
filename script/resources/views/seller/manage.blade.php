<!-- Modal Migrate Fresh with demo import -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" class="ajaxform_with_reload" action="{{ route('seller.dashboard.modal') }}">
            @csrf
            <div class="modal-content">
                <div id="alertContainer" class="alert alert-light alert-has-icon">
                    <div class="alert-icon"><i class="far fa-check-circle text-success"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">{{ __('Congratulations') }}</div>
                        {{ __('You Store have been successfully created, Please fill this form to access your controll panel') }}
                    </div>
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Database Migrate Fresh With Demo Import') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Please provide the email and password for your store admin') }}</p>
                    <!-- {{ $instruction->db_migrate_fresh_with_demo ?? '' }} -->
                    <div class="form-group">
                        <label>{{ __('Email') }}<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="{{ __('Email') }}" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Password') }}<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="password" class="form-control" placeholder="{{ __('Password') }}" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>{{ __('Confirm Password') }}<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="password" class="form-control" placeholder="{{ __('Confirm Password') }}" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-text text-muted">{{ __('Warning: This action will completely reinstall the database and import the demo again. All current data will be lost. Are you sure you want to proceed with this action?') }}</div>
                </div>
                <div class="modal-footer  bg-whitesmoke br">
                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-primary basicbtn">{{ __('Submit') }}</button>
                </div>
            </div>
        </form>
    </div>
</div> --}}



<!-- added by mutaman (store info after registeration) -->
<link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" />
<div class="modal fade" id="manage" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('seller.dashboard.modal') }}">
            <div class="modal-content">
                @csrf
                @method('POST')
                <div class="modal-header">
                    <div class="alert alert-light alert-has-icon">
                        <div class="alert-icon"><i class="far fa-check-circle text-success"></i></div>
                        <div class="alert-body">
                            <div class="alert-title">{{ __('Congratulations') }}</div>
                            {{ __('You Store have been successfully created, Please fill this form to access your controll panel') }}
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group row mb-4">
                        <label class="col-lg-12">{{ __('Store Title') }}</label>
                        <div class="col-lg-12">
                            <input type="text" name="site_title" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-lg-12">{{ __('Store Description') }}</label>
                        <div class="col-lg-12">
                            <textarea class="form-control" required="" name="description"></textarea>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                    <label>{{__('Notification & Reply-to Email')}}</label>
                    <input type="email" name="store_email" class="form-control" required="" placeholder="reply@example.com" >
                    </div> --}}
                    <div class="form-group row mb-4">
                        <label class="col-lg-12">{{ __('Store Primary Color') }}</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control colorpickerinput" required name="theme_color">
                            <div class="form-text text-muted">
                                {{ __('This will change the entire color of your store, depending on your brand identity') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Whatsapp Number') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="text-success fab fa-whatsapp fa-5x"></i>
                                </div>
                            </div>
                            <input type="tel" name="whatsapp_no" class="form-control phone-number" maxlength="12" placeholder="249-1234-56789" required>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                    <label>{{__('Order ID Format (Prefix)')}}</label>
                    <input type="text" name="order_prefix" class="form-control" required="" placeholder="#SAL" >
                    </div>
                    <div class="form-group">
                        <label>{{__('Currency Position')}}</label>
                        <select class="form-control" name="currency_position">
                            <option value="left" >{{__('Left')}}</option>
                            <option value="right" >{{__('Right')}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{__('Currency Name')}}</label>
                        <input type="text" name="currency_name" class="form-control" required="" placeholder="SDG" value="SDG" >
                    </div>
                    <div class="form-group">
                        <label>{{__('Currency Icon')}}</label>
                        <input type="text" name="currency_icon" class="form-control" required="" placeholder="SDG" value="SDG" >
                    </div>
                    <div class="form-group">
                    <label>{{__('Tax')}}</label>
                    <input type="text" name="tax" class="form-control" required="" placeholder="0.00" value="0" >
                    </div>

                    <div class="form-group">
                    <label>{{ __('I will sale (shop type)') }}</label>
                    <select class="form-control" name="shop_type">
                        <option value="1">{{ __('I will sale physical products') }}</option>
                        <option value="0" >{{ __('I will sale digital products') }}</option>
                    </select>
                    </div> --}}
                    <div class="form-group row mb-2">
                        <label for="" class="col-lg-12">{{ __('Select Order Method') }}</label>
                        <div class="col-lg-12">
                            <select class="form-control selectric" name="order_method">
                                @if (tenant('push_notification') == 'on')
                                    <option value="fmc" @if ($order_method == 'fmc') selected="" @endif>
                                        {{ __('Real Time Push Notifications') }}
                                    </option>
                                @endif
                                <option value="mail" @if ($order_method == 'mail') selected="" @endif>
                                    {{ __('Mail Notifications') }}
                                </option>
                                <option value="whatsapp" @if ($order_method == 'whatsapp') selected="" @endif>
                                    {{ __('Whatsapp Notifications') }}
                                </option>
                            </select>
                            <div class="form-text text-muted">
                                {{ __('choose your prefered method to recieve your orders, either whatsapp, email or push notifications') }}
                            </div>

                        </div>
                    </div>
                     {{-- <div class="form-group">
                    <label>{{ __('Languages') }}</label>   <br>

                    <select class="form-control select2 col-sm-12" style="min-width:300px" name="lanugage[]" multiple=""vrequired>
                    @foreach ($langlist ?? [] as $key => $row)
                        <option value="{{ $row }},{{ $key }}" {{ $key == Session::get('locale') ? 'selected' : '' }}>{{ $key }}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                        <label>{{ __('Default Language') }}</label>

                        <select class="form-control col-sm-12" name="local" required>
                        @foreach ($langlist ?? [] as $key => $row)
                                <option value="{{ $key }}" {{ Session::get('locale') == $key ? "selected='selected'" : '' }}>{{ $row }}</option>
                        @endforeach
                        </select>
                    </div> --}}

                    <div class="form-group row mb-4">
                        <label class="col-lg-12">{{ __('Default language') }}</label>
                        <div class="col-lg-12">
                            <select class="form-control selectric" name="default_language" id="default_language">
                                @foreach ($languages ?? [] as $row)
                                    <option value="{{ __($row->code) }}">{{ __($row->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer  bg-whitesmoke br">
                    {{-- <button type="button" class="btn btn-outline-warning" data-dismiss="modal">{{ __('Cancel') }}</button> --}}
                    <button type="submit" class="btn btn-primary basicbtn">{{ __('Submit') }}</button>
                </div>
            </div>
        </form>

    </div>
</div>


<!-- For Store Data Modal -->
<script src="{{ asset('admin/assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/select2.min.js') }}"></script>
