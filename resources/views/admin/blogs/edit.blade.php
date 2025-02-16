@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'Update Blogs')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Update '.$blog->title)

{{-- Content body: main page content --}}

@section('content_body')
    <form action="{{ route('admin.blogs.update', $blog) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- image --}}
        <x-adminlte-input-file-krajee name="image" igroup-size="sm" placeholder="Choose a file...">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-lightblue">
                    <i class="fas fa-upload"></i>
                </div>
            </x-slot>
        </x-adminlte-input-file-krajee>
        {{-- tags --}}

        {{-- With prepend slot --}}
        <x-adminlte-input name="title" label="Title" placeholder="Title" label-class="text-lightblue"
            value="{{ $blog->title }}" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="caption" label="Caption" placeholder="Caption" label-class="text-lightblue"
            value="{{ $blog->caption }}" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="date" label="date" placeholder="date" label-class="text-lightblue" type="date"
            value="{{ $blog->date }}" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-date text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="tags" label="tags" placeholder="Separate tags with comma" label-class="text-lightblue" type="tags"
            value="{{ $blog->tags }}" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>


        <x-adminlte-input-switch name="top_blog" label="top blog">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-lightblue">
                    <i class="fas fa-toggle-on"></i>
                </div>
            </x-slot>
        </x-adminlte-input-switch>


        {{-- With prepend slot, sm size, and label --}}
        <x-adminlte-textarea name="content" label="blog" rows=5 label-class="text-lightblue" igroup-size="sm"
            placeholder="Insert blog...">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                </div>
            </x-slot>
            {{ $blog->content }} </x-adminlte-textarea>
        <x-adminlte-button class="btn-flat" type="submit" label="Update" theme="success" icon="fas fa-lg fa-save" />
    </form>
@stop
