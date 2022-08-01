@extends('backend.layouts.master',['page'=>'Create'])

@section('title')
Create {{$panel}}
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection__choice{
        background-color : #1c21ccd0 !important;
    }
</style>
@endsection

@section('content')
{{--  <div class="card">
    <div class="row">
        <div class="col-lg-12 py-3 px-3">
            {{Form::open(['route' => $base_route.'store', 'method' => 'post', 'files'=>'true'])}}
                @include($view_path.'includes.main_form')
            {!! Form::close() !!}
        </div>
    </div>
</div>  --}}

<div class="card">
    {{Form::open(['route' => $base_route.'store', 'method' => 'post', 'files'=>'true'])}}
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Main Page</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">SEO Profile</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Status Select</button>
    </li>
  </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active px-3 py-3" id="home" role="tabpanel" aria-labelledby="home-tab">

                @include($view_path.'includes.main_form')

        </div>
        <div class="tab-pane fade px-3 py-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                @include($view_path.'includes.meta_form')

        </div>
        <div class="tab-pane fade px-3 py-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                @include($view_path.'includes.status_form')

        </div>
    </div>
    <div class="py-4 row d-flex justify-content-center">
        <button class="btn btn-outline-primary">Save Changes</button>
</div>
    {!! Form::close() !!}
    </div>


@endsection

@section('script')
<script>
    $("#name").keyup(function(){
        let name = $(this).val();
        let slug = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        $("#slug").val(slug);
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        //For Search
        $('.select2').select2();

        //For Subcategory get data as per Category
        $('#category_id').on('change', function() {
            let category_id = $(this).val();
            if(category_id.length > 0){
                $.ajax({
                url: "{{route('product.get_sub_category')}}",
                data: {_token: "{{csrf_token()}}", category_id: category_id},
                dataType: "JSON",
                method: "POST",
                success: function(resp) {
                $('#sub_category_id').children('option').not(':first').remove();
                    $.each(resp, (key, value) => {
                        $('#sub_category_id').append('<option value=' + key + '>' + value + '</option>');
                    })
                    },
                })
            }
            else{
                $('#sub_category_id').children('option').not(':first').remove();
            }
            });

            //Multiple Image
            var y=1;
            $('#addMoreImage').click(function(){
                var max_limit =5;
                if(y<max_limit){
                y++;
                $("#image_wrapper tr:last").after(
                    '<tr>'+
                    '<td><input type="file" name="image_field[]" class="form-control" value=""></td>'+
                    '<td><input type="text" name="image_name[]" class="form-control" value=""></td>'+
                    '<td><a class="btn btn-block btn-danger sa-warning remove_multi_image "><i class="fa fa-trash"></i></a></td>'+
                    '</tr>'
                    );
                }
                else{
                    alert('Maximun add Image limit is 5');
                }
            });

            //Remove Multiple Images

             $(document).on("click",".remove_multi_image",function(){
                y--;
                 $(this).parents("tr").remove();
             });

    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
