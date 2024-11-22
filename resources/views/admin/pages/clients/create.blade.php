@extends('admin.partials.form')

@section('subtitle', 'Client')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Client')

@section('action')
    {{ route('admin.clients.store') }}
@stop

@section('form_array')
@php
$formArray=[

'name',
// 'logo',
'content',
'home_content',
'image'
]
@endphp
@stop
