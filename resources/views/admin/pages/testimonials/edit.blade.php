@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'Testimonials')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Testimonials')

{{-- Content body: main page content --}}

@extends('admin.partials.form')

{{-- Customize layout sections --}}

@section('subtitle', 'Experts')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Experts')

@section('action')
    {{ route('admin.experts.update', ['expert' => $model->id]) }}
@stop

@section('method')
    @method("PUT")
@stop


@section('form_array')
@php
    $formArray=[
'name',
'position',
'company',
'content',
'image',
]
@endphp
@stop

