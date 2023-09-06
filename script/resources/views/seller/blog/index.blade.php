@extends('layouts.backend.app')

@section('title',__('Page List'))

@section('head')
@include('layouts.backend.partials.headersection',['title'=>__('Blogs'),'button_name'=> __('Add New'),'button_link'=> route('seller.blog.create')])
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
                      <th>{{ __('Title') }}</th>
                      <th>{{ __('Url') }}</th>
                      <th>{{ __('Status') }}</th>
                      <th>{{ __('Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($posts as $row)
                    <tr>
                      <td><img height="50" src="{{ asset($row->preview->value ?? '') }}" alt=""></td>
                      <td>{{ $row->title }}</td>
                      <td>{{ url('/page',$row->slug) }}</td>
                      @if($row->status == 1)
                      <td class="text-success">{{ __('Active') }}</td>
                      @endif
                      @if($row->status == 0)
                      <td class="text-danger">{{ __('Inactive') }}</td>
                      @endif

                      <td>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('seller.blog.edit', $row->id) }}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-sm btn-outline-danger delete-confirm ml-2" href="javascript:void(0)" data-id="{{$row->id}}"><i class="fa fa-trash"></i></a>
                            <!-- Delete Form -->
                            <form class="d-none" id="delete_form_{{ $row->id }}" action="{{ route('seller.blog.destroy', $row->id) }}" method="POST">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
