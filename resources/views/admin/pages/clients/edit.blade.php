@extends('admin.partials.form')

{{-- Customize layout sections --}}

@section('subtitle', 'Clients')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Clients')

@section('action')
    {{ route('admin.clients.update', ['client' => $model->id]) }}
@stop

@section('method')
    @method("PUT")
@stop


@section('form_array')
@php
$formArray = [
   'name',
// 'logo',
'content',
'home_content',
'image'

]
@endphp
@stop
