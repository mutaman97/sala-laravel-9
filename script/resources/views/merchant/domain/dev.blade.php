@extends('layouts.backend.app')

@section('head')
@include('layouts.backend.partials.headersection',['title'=>__('Developer mode'),'prev'=>route('merchant.domain.list')])
@endsection

@section('content')
<section class="section">
  <div class="section-body">
    <h2 class="section-title"><b class="text-danger">{{ __('Caution:') }}</b></h2>
    <p class="section-lead text-danger"><strong>{{ __('this section is for developers if you are not a developer then do not do anything') }}</strong></p>
    <div class="row">
      @if($info->tenancy_db_name != null)
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Database Migrate Fresh With Demo Import') }}</h4>
                </div>
                <div class="card-body">
                    {{-- <p>{{ $instruction->db_migrate_fresh_with_demo ?? '' }}</p> --}}
                    <p>{{ __('Warning: This action will completely reinstall the database and import the demo again. All current data will be lost. Are you sure you want to proceed with this action?') }}</p>
                </div>
                <div class="card-footer bg-whitesmoke">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">{{ __('Proceed') }}</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Databas Fresh Migrate Without Demo Import') }}</h4>
                </div>
                <div class="card-body">
                    <p>{{ __('Warning: This action will completely reinstall the database without importing any demo data. All current data will be lost. Are you sure you want to proceed with this action?') }}</p>
                </div>
                <div class="card-footer bg-whitesmoke">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#freshmigrate">{{ __('Proceed') }}</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Database Migrate For New Table') }}</h4>
                </div>
                <div class="card-body">
                    {{-- <p>{{ $instruction->db_migrate ?? '' }}</p> --}}
                    <p>{{ __('Warning: This action will install a new table if it does not exist in your database. Proceeding with this action may alter your database structure. Are you sure you want to proceed?') }}</p>
                </div>
                <div class="card-footer bg-whitesmoke">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#migrate">{{ __('Proceed') }}</button>
                </div>
            </div>
        </div>
      @endif
      @if(env('CACHE_DRIVER') == 'memcached' ||  env('CACHE_DRIVER') == 'redis')
       <div class="col-sm-6">
            <div class="card">
              <div class="card-header">
                <h4>{{ __('Remove Store Cache') }}</h4>
            </div>
            <div class="card-body">
                {{-- <p>{{ $instruction->remove_cache ?? '' }}</p> --}}
                <p>{{ __('Warning: This action will permanently delete your store\'s cache. Proceeding with this action may result in slower loading times. Are you sure you want to proceed?') }}</p>
            </div>
            <div class="card-footer bg-whitesmoke">
                 <button class="btn btn-primary" data-toggle="modal" data-target="#cache">{{ __('Proceed') }}</button>
            </div>
        </div>
        </div>
        @endif
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Clear Storage') }}</h4>
                </div>
                <div class="card-body">
                    {{-- <p>{{ $instruction->remove_storage ?? '' }}</p> --}}
                    <p>{{ __('Warning: This action will delete uploaded files from your storage') }}</p>
                </div>
                <div class="card-footer bg-whitesmoke">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#remove_storage">{{ __('Proceed') }}</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $info->maintenance_mode !== "null" ? __('Disable Maintenance Mode') : __('Enable Maintenance Mode') }}</h4>
                </div>
                <div class="card-body">
                    @if (($info->maintenance_mode)!="null")
                        <p class="text-danger">{{ __('Maintenance mode is currently enabled, which means that your website is offline and users are unable to access it.') }}</p>
                    @else
                        <p>{{ __('Please be advised that if you enable maintenance mode, your website will be temporarily offline and users will not be able to access it.') }}</p>
                    @endif
                </div>
                <div class="card-footer bg-whitesmoke">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#maintenance_mode">{{ __('Proceed') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<!-- Modal Migrate Fresh with demo import -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" class="ajaxform_with_reload" action="{{ route('merchant.domain.migrate-seed',$info->id) }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Database Migrate Fresh With Demo Import') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Please provide the email and password for your store admin') }}</p>
                    {{-- {{ $instruction->db_migrate_fresh_with_demo ?? '' }} --}}
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
</div>

<!-- Modal Migrate Fresh without demo import -->
<div class="modal fade" id="freshmigrate" tabindex="-1" aria-labelledby="freshmigrate" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" class="ajaxform_with_reload" action="{{ route('merchant.domain.fresh-migrate',$info->id) }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Database Fresh Migrate Without Demo Import') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Please provide the email and password for your store admin') }}</p>
                    {{-- {{ $instruction->db_migrate_fresh_with_demo ?? '' }} --}}
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
                    <div class="form-text text-muted">{{ __('Warning: This action will completely reinstall the database without importing any demo data. All current data will be lost. Are you sure you want to proceed with this action?') }}</div>
                </div>
                <div class="modal-footer  bg-whitesmoke br">
                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-primary basicbtn">{{ __('Submit') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Database Migrate For New Table -->

<div class="modal fade" id="migrate" tabindex="-1" aria-labelledby="migrate" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" class="ajaxform_with_reload" action="{{ route('merchant.domain.migrate',$info->id) }}">
        @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="migrate">{{ __('Database Migrate For New Table') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- {{ $instruction->db_migrate ?? '' }} --}}
        <p>{{ __('Warning: This action will install a new table if it does not exist in your database. Proceeding with this action may alter your database structure. Are you sure you want to proceed?') }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">{{ __('Cancel') }}</button>
        <button type="submit" class="btn btn-primary basicbtn">{{ __('Submit') }}</button>
      </div>
    </form>
    </div>
  </div>
</div>

{{-- <div class="modal fade" id="freshmigrate" tabindex="-1" aria-labelledby="freshmigrate" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" class="ajaxform_with_reload" action="{{ route('merchant.domain.fresh-migrate',$info->id) }}">
        @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="migrate">{{ __('Migrate Database Without Demo Data') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ __('Warning: This action will completely reinstall the database without importing any demo data. All current data will be lost. Are you sure you want to proceed with this action?') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">{{ __('Cancel') }}</button>
        <button type="submit" class="btn btn-primary basicbtn">{{ __('Submit') }}</button>
      </div>
    </form>
    </div>
  </div>
</div> --}}

<div class="modal fade" id="cache" tabindex="-1" aria-labelledby="cache" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" class="ajaxform_with_reload" action="{{ route('merchant.domain.clear-cache',$info->id) }}">
        @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >{{ __('Remove Store Cache') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- {{ $instruction->remove_cache ?? '' }} --}}
        <p>{{ __('Warning: This action will permanently delete your store\'s cache. Proceeding with this action may result in slower loading times. Are you sure you want to proceed?') }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">{{ __('Cancel') }}</button>
        <button type="submit" class="btn btn-primary basicbtn">{{ __('Submit') }}</button>
      </div>
     </form>
    </div>
  </div>
</div>
<div class="modal fade" id="remove_storage" tabindex="-1" aria-labelledby="remove_storage" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" class="ajaxform_with_reload" action="{{ route('merchant.domain.storage.clear',$info->id) }}">
        @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cache">{{ __('Clear Storage') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- {{ $instruction->remove_storage ?? '' }} --}}
        {{ __('Warning: Are you sure you want to delete your stored data? This action cannot be undone and all of your saved information will be permanently lost') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">{{ __('Cancel') }}</button>
        <button type="submit" class="btn btn-primary basicbtn">{{ __('Submit') }}</button>
      </div>
     </form>
    </div>
  </div>
</div>
<div class="modal fade" id="maintenance_mode" tabindex="-1" aria-labelledby="maintenance_mode" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" class="ajaxform_with_reload" action="{{ $info->maintenance_mode !== "null" ? route('merchant.domain.disable.maintenance', $info->id) : route('merchant.domain.enable.maintenance', $info->id) }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="maintenance_mode">
                        {{ $info->maintenance_mode !== "null" ? __('Disable Maintenance Mode') : __('Enable Maintenance Mode') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($info->maintenance_mode !== "null")
                        {{ __('Warning: Disabling maintenance mode may make your website or application available to users before it is fully ready. Are you absolutely sure you want to proceed with disabling maintenance mode?') }}
                    @else
                        {{ __('Warning: Enabling maintenance mode will temporarily make your website or application unavailable to users while you perform necessary updates or maintenance tasks. Are you sure you want to proceed with enabling maintenance mode?') }}
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-primary basicbtn">{{ __('Submit') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection



