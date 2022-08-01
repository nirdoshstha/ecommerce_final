@extends('backend.layouts.master',['page'=>'Edit'])


@section('title')
{{$panel }} Edit
@endsection

@section('content')
<div class="card py-3 px-3">
    {{ Form::model($data['row'], ['route' => [$base_route.'update', $data['row']->id], 'method'=>'put','files'=>'true']) }}
        @include($view_path.'includes.main_form')
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
@endsection
