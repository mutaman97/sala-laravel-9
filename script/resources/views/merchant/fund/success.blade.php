@extends('layouts.backend.app')

@section('title','Payment Success')

@section('head')
@include('layouts.backend.partials.headersection',['title'=>'Payment Success'])
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          @if (Session::has('message'))
          <div class="alert alert-{{ Session::get('type') ?? '' }}">
            {{ Session::get('message') }}
          </div>
          @endif
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tbody>
                      <tr>
                        <td>
                          {{ __('Payment Id') }}
                        </td>
                        <td>
                          {{ $payment_info['payment_id'] }}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          {{ __('Payment Method') }}
                        </td>
                        <td>
                          {{ $payment_info['payment_method'] }}
                        </td>
                      </tr>
                        @php
                            $status = [
                            0 => ['class' => 'badge-danger',  'text' => 'Filed'],
                            1 => ['class' => 'badge-primary', 'text' => 'Active'],
                            2 => ['class' => 'badge-warning', 'text' => 'Pending'],
                            3 => ['class' => 'badge-danger', 'text' => 'Expired']
                            ][$payment_info['payment_status']]
                        @endphp
                      <tr>
                        <td>
                          {{ __('Payment Status') }}
                        </td>
                        <td>
                            {{ $status['text'] }}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          {{ __('Charge') }}
                        </td>
                        <td>
                          {{ $payment_info['charge'] }}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          {{ __('Amount') }}
                        </td>
                        <td>
                          {{ $payment_info['amount'] }}
                        </td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
