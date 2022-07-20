@extends('backend.layouts.master',['page'=>'Create'])

@section('title')
Create {{$panel}}
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
<div class="card">
<div class="row">
    <div class="col-lg-12 py-3 px-3">
        {{Form::open(['route' => $base_route.'store', 'method' => 'post', 'files'=>'true'])}}
            @include($view_path.'includes.main_form')
        {!! Form::close() !!}
        </div>
    </div>
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
        $('.select2').select2();

    });
    </script>
@endsection
