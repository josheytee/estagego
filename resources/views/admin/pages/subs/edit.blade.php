@extends('admin.partials.form')

{{-- Customize layout sections --}}

@section('subtitle', 'subs')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'subs')

@section('action')
    {{ route('admin.subs.update', ['sub' => $model->id]) }}
@stop

@section('method')
    @method("PUT")
@stop


@section('form_array')
@php
    $formArray=[
'image',
'title',
'content'=>['type'=>'textarea']
]
@endphp
@stop

