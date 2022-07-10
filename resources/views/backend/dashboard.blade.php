@extends('backend.layouts.master')

@section('title')
@endsection

@section('content')
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>S.n</th>
        <th>Name</th>
        <th>Email</th>
        <th>User Role</th>
        <th>Ban/Unban</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
          @foreach ($user as $index=> $users)
                <tr>
                    <td>{{++$index}}</td>
                    <td>{{$users->name}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->user_role}}</td>
                    <td>{{$users->ban_unban}}</td>

                    <td>
                        <div class="d-flex justify-content-between">
                            <span class="badge bg-primary">Edit</span>
                            <span class="badge bg-danger">Delete</span>
                        </div>


                    </td>
                </tr>
          @endforeach

      </tbody>
      <tfoot>
      <tr>
        <th>S.n</th>
        <th>Name</th>
        <th>Email</th>
        <th>User Role</th>
        <th>Ban/Unban</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
@endsection

@section('script')
@endsection
