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
$formArray = [
    'image',
    'name',
    'title',
    'linkedin',
    'instagram',
    'bio',
]
@endphp
@stop
