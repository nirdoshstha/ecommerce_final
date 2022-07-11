@extends('backend.layouts.master',['page'=>'Create'])

@section('title')
Create {{$panel}}
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">

        {{Form::open(['route' => $base_route.'store', 'method' => 'post', 'files'=>'true'])}}
            @include($view_path.'includes.main_form')
        {!! Form::close() !!}
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
@endsection
