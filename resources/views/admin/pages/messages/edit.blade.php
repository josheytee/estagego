@extends('admin.partials.form')

{{-- Customize layout sections --}}

@section('subtitle', 'Clients')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Clients')

@section('action')
    {{ route('admin.messages.update', ['message' => $model->id]) }}
@stop

@section('method')
    @method("PUT")
@stop


@section('form_array')
@php
$formArray = [
'name',
'email',
'company_name',
'country',
'phone',
'website',
'message',
'agreement',
]
@endphp
@stop
