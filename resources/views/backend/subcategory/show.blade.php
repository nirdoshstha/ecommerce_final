@extends('backend.layouts.master',['page'=>'Show'])

@section('title')
{{$panel}} Show Page
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card">
            <div class="card-header">
                <h3 class="card-title">Show {{ $panel }}</h3>
                <a class="btn btn-info btn-md float-right ml-1" href="{{ route($base_route.'index') }}">
                    <i class="fas fa-list"></i> List
                </a>
                {{--  <a class="btn btn-success btn-md float-right" href="{{ route($base_route.'create') }}">
                    <i class="fas fa-pencil-alt"></i>
                    Create
                </a>  --}}
            </div>
            <table class="table table-striped">
                <tr>
                    <th>Category Name</th>
                    <td>{{ $data['row']->category->name }}</td>
                </tr>
                <tr>
                    <th>Sub Category Name</th>
                    <td>{{ $data['row']->name }}</td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{ $data['row']->slug }}</td>
                </tr>
                <tr>

                    <th>Image</th>
                    <td>
                        @if ($data['row']->image)
                        <img src="{{ asset($img_path.$data['row']->image) }}" alt="image" class="img-fluid" width="80">
                            @else
                                {{ 'Image Not Found' }}
                            @endif
                    </td>
                </tr>
                <tr>
                    <th>Short Description</th>
                    <td>{{ $data['row']->short_description }}</td>
                </tr>
                <tr>
                    <th>Long Description</th>
                    <td>{{ $data['row']->long_description }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><input type="checkbox" {{$data['row']->status=='1' ? 'checked' : ''}}></td>
                </tr>
                <tr>
                    <th>Rank</th>
                    <td>{{ $data['row']->rank }}</td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td>{{ $data['row']->createdBy->name}} ({{$data['row']->created_at->diffForHumans()}})</td>
                </tr>

                <tr>
                    <th>Updated By</th>
                    <td>{{ $data['row']->updatedBy->name ?? 'Not Updated Yet' }} ({{$data['row']->updated_at->diffForHumans()}})</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $data['row']->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $data['row']->updated_at }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
