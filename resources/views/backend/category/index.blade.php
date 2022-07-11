@extends('backend.layouts.master',['page'=>'List'])

@section('title')
{{$panel}} List
@endsection

@section('content')
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>S.n</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Image</th>
        <th>Rank</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
          @foreach ($data['row'] as  $datas)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$datas->name}}</td>
                    <td>{{$datas->slug}}</td>
                    <td>
                        @if ($datas->image)
                        <img src="{{ asset($img_path.$datas->image) }}" alt="image" class="img-fluid" width="60">
                            @else
                                {{ 'Image Not Found' }}
                            @endif


                        </td>
                    <td>{{$datas->rank}}</td>

                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{route($base_route.'show', $datas->id)}}"><i class="fas fa-eye text-success"></i></a>
                            <a href="{{route($base_route.'edit',$datas->id)}}"><i class="fas fa-edit text-primary"></i></a>
                            <form action="{{route($base_route.'destroy',$datas->id)}}" method="POST">
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
        <th>Slug</th>
        <th>Image</th>
        <th>Rank</th>
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
