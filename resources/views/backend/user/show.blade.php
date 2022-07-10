@extends('backend.layouts.master',['page'=>'Show'])

@section('title')
View | Admin
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
                    <th>Name</th>
                    <td>{{ $data['row']->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $data['row']->email }}</td>
                </tr>
                <tr>
                    <th>User Role</th>
                    <td>{{ $data['row']->user_role}}</td>
                </tr>
                <tr>
                    <th>Banned /UnBan</th>
                    <td>{{ $data['row']->ban_unban }}</td>
                </tr>

                <tr>
                    <th>Updated By</th>
                    <td>{{ $data['row']->updated_by ?? 'Not Updated Yet' }} ({{$data['row']->updated_at->diffForHumans()}})</td>
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
