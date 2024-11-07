@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'subs')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'subs')

{{-- Content body: main page content --}}
@php
    $formArray=[
'page_title'=>[
    'text'=>"Page Title"
],
'h1',
'h2_orange',
'h2',
'caption',
'caption2',
'appstore_url',
'googleplay_url',
'video_url',
'total_users',
'total_downloads',
'total_household',
'total_cities',
'total_countries',
'metatags',
'keywords',
'description'=>[
    'type'=>"textarea"
],
    ]
@endphp
@section('content_body')
    <form action="{{ route('admin.homes.update', $home) }}" method="post">
        @csrf
        @method('PUT')


@foreach($formArray as $key => $value)
    @if(is_array($value))
        {{-- If the item is an associative array, access its properties --}}
        @if (isset($value['type']) && $value['type'] == 'textarea')
        <x-adminlte-textarea name="content" label="{{$value['text'] ?? ucfirst($key)}}" rows=5 label-class="text-lightblue" igroup-size="sm"
         placeholder="Insert page...">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                </div>
            </x-slot>
            {{ $home->$key }} </x-adminlte-textarea>
        @else
        <x-adminlte-input name="{{$key}}" label="{{ $value['text'] ?? ucfirst($key) }}" placeholder="{{ $value['text'] ?? ucfirst($key) }}" label-class="text-lightblue"
        value="{{ $home->$key }}" enable-old-support>
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    @endif

    @else
        {{-- If the item is a simple string, use it as the name and label --}}
        <x-adminlte-input name="{{$value}}" label="{{ ucfirst(str_replace('_', ' ', $value)) }}" placeholder="{{ ucfirst(str_replace('_', ' ', $value)) }}" label-class="text-lightblue"
        value="{{ $home->$value }}" enable-old-support>
        <x-slot name="prependSlot">
            <div class="input-group-text">
                {{-- <i class="fas fa-user text-lightblue"></i> --}}
            </div>
        </x-slot>
    </x-adminlte-input>
        {{-- <div class="form-group">
            <label for="{{ $key }}">{{ ucfirst(str_replace('_', ' ', $value)) }}</label>
            <input type="text" name="{{ $key }}" id="{{ $key }}" class="form-control" placeholder="{{ ucfirst(str_replace('_', ' ', $value)) }}">
        </div> --}}
    @endif
@endforeach
        {{-- With prepend slot --}}


        {{-- With prepend slot, sm size, and label --}}
        {{-- <x-adminlte-textarea name="content" label="page" rows=5 label-class="text-lightblue" igroup-size="sm"
            placeholder="Insert page...">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                </div>
            </x-slot>
            {{ $page->content }} </x-adminlte-textarea> --}}
        <x-adminlte-button class="btn-flat" type="submit" label="Update" theme="success" icon="fas fa-lg fa-save" />
    </form>
@stop
