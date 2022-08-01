@extends('backend.layouts.master',['page'=>'List'])

@section('title')
{{$panel}} List
@endsection

@section('content')
<div class="card py-3 px-3">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>S.n</th>
        <th>Category Name</th>
        <th>Sub Category Name</th>
        <th>Product Name</th>
        <th>Offer Price</th>
        <th>Stock</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
          @foreach ($data['row'] as  $datas)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$datas->category->name}}</td>
                    <td>{{$datas->subcategory->name}}</td>
                    <td>{{$datas->name}}</td>
                    <td>{{$datas->offer_price}}</td>
                    <td>{{$datas->stock}}</td>

                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{route($base_route.'show', $datas->id)}}"><i class="fas fa-eye text-success"></i></a><span class="p-2"></span>
                            <a href="{{route($base_route.'edit',$datas->id)}}"><i class="fas fa-edit text-primary"></i></a><span class="p-2"></span>
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
            <th>Category Name</th>
            <th>Sub Category Name</th>
            <th>Product Name</th>
            <th>Offer Price</th>
            <th>Stock</th>
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
