@extends('admin.partials.form')

@section('subtitle', 'categories')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'categories')

@section('action')
    {{ route('admin.clients.store') }}
@stop

@section('form_array')
    @php
        $formArray = ['category_name', 'page_id', 'url'];
    @endphp
@stop
