@extends('admin.partials.form')

{{-- Customize layout sections --}}

@section('subtitle', 'Comment')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Comment')

@section('action')
    {{ route('admin.comments.store') }}
@stop



@section('form_array')
    @php
        $formArray = ['name', 'email', 'phone', 'website', 'comment'];
    @endphp
@stop
