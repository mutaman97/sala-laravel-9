@extends('layouts.backend.app')

@section('title','Page List')

@section('head')
@include('layouts.backend.partials.headersection',['title'=>__(ucfirst(str_replace('_',' ',$type))),'button_name'=> __('Add New'),'button_link'=> route('seller.banner.create','type='.$type)])
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover text-center table-borderless" id="table-2">
                  <thead>
                    <tr>
                      <th><i class="fa fa-image"></i></th>
                      <th>{{ __('Url') }}</th>
                      <th>{{ __('Banner Width') }}</th>
                      <th>{{ __('Banner Location') }}</th>
                      <th>{{ __('Created At') }}</th>
                      <th>{{ __('Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($posts as $row)
                    @php
                    $meta=json_decode($row->slug ?? '');
                    @endphp
                    <tr>
                        <td><img src="{{ asset($row->preview->content ?? '') }}" height="50"></td>
                        <td>{{ url($meta->link ?? '') }}</td>
                        <td>{{ json_decode($row->slug)->banner_width ?? '' }}%</td>
                        <td>{{ __(ucwords(str_replace('_', ' ', json_decode($row->slug)->banner_location  ?? ''))) }}</td>
                        <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                        <td class="">
                            <div class="d-flexjustify-content-center">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('seller.banner.edit', $row->id) }}" data-toggle="tooltip" title="{{ __('Edit') }}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-sm btn-outline-danger delete-confirm ml-2" href="javascript:void(0)" data-id="{{$row->id}}" data-toggle="tooltip" title="{{ __('Delete') }}"><i class="fa fa-trash"></i></a>
                                <!-- Delete Form -->
                                <form class="d-none" id="delete_form_{{ $row->id }}" action="{{ route('seller.category.destroy', $row->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
