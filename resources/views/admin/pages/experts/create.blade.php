@extends('admin.partials.form')

@section('subtitle', 'Experts')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Experts')

@section('action')
    {{ route('admin.experts.store') }}
@stop

@section('form_array')
@php
$formArray=[
    'image',
    'name',
    'title',
    'linkedin',
    'instagram',
    'bio',
]
@endphp
@stop
