@extends('layouts.backend.app')

@section('title',__('Page List'))

@section('head')
@include('layouts.backend.partials.headersection',['title'=>__('Sliders'),'button_name'=> __('Add New'),'button_link'=> route('seller.slider.create')])
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-2">
                  <thead>
                    <tr>
                      <th><i class="fa fa-image"></i></th>
                      <th>{{ __('Url') }}</th>
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
                      <td>{{ $meta->link ?? '' }}</td>

                      <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                      <td>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('seller.slider.edit', $row->id) }}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-sm btn-outline-danger delete-confirm ml-2" href="javascript:void(0)" data-id="{{$row->id}}"><i class="fa fa-trash"></i></a>
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
