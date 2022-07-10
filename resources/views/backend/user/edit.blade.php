@extends('backend.layouts.master',['page'=>'Edit'])


@section('title')
Edit | Admin
@endsection

@section('content')

    {{ Form::model($data['row'], ['route' => [$base_route.'update', $data['row']->id], 'method'=>'put','files'=>'true']) }}
        @include($view_path.'includes.main_form')
    {!! Form::close() !!}



@endsection

@section('script')
@endsection
