@extends('admin.partials.form')

@section('subtitle', 'Subs')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Subs')

@section('action')
    {{ route('admin.subs.store') }}
@stop

@section('form_array')
@php
$formArray=[
   'image',
'title',
'content'=>['type'=>'textarea']]
@endphp
@stop
