@extends('backend.layouts.master',['page'=>'List'])

@section('title')
User Registered |Admin
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
          @foreach ($data['row'] as $index=> $users)
                <tr>
                    <td>{{++$index}}</td>
                    <td>{{$users->name}}</td>
                    <td>{{$users->email}}</td>
                    <td>
                        @if($users->user_role=='clients')
                        <button class="btn btn-warning btn-sm">Client</button>
                        @elseif($users->user_role=='vendor')
                        <button class="btn btn-primary btn-sm">Vendor</button>
                        @elseif($users->user_role=='admin')
                        <button class="btn btn-success btn-sm">Admin</button>

                        @endif
                    </td>
                    <td>
                        @if($users->ban_unban=='0')
                            <button class="btn btn-info btn-sm">Unban</button>
                            @elseif($users->ban_unban=='1')
                            <button class="btn btn-danger btn-sm">Banned</button>
                        @endif
                    </td>

                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{route($base_route.'show', $users->id)}}"><i class="fas fa-eye text-success"></i></a>
                            <a href="{{route($base_route.'edit',$users->id)}}"><i class="fas fa-edit text-primary"></i></a>
                            <form action="{{route($base_route.'destroy',$users->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="#" class="delete-confirm"><i class="fas fa-trash-alt text-danger"></i></a>
                            </form>
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
<script>

        $('.delete-confirm').click(function(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest("form").submit();
                  Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                }
              });

        });




</script>
@endsection
