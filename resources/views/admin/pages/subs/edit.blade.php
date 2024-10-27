@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'subs')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'subs')

{{-- Content body: main page content --}}

@section('content_body')
    <form action="{{ route('subs.update', $page) }}" method="post">
        @csrf
        @method('PUT')

        {{-- With prepend slot --}}
        <x-adminlte-input name="Image" label="Image" placeholder="username" label-class="text-lightblue"
            value="{{ $page->image }}" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="title" label="Title" placeholder="Title" label-class="text-lightblue"
            value="{{ $page->title }}" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        {{-- With prepend slot, sm size, and label --}}
        <x-adminlte-textarea name="content" label="page" rows=5 label-class="text-lightblue" igroup-size="sm"
            placeholder="Insert page...">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                </div>
            </x-slot>
            {{ $page->content }} </x-adminlte-textarea>
        <x-adminlte-button class="btn-flat" type="submit" label="Update" theme="success" icon="fas fa-lg fa-save" />
    </form>
@stop
