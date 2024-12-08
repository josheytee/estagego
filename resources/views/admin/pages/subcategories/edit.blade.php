@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'Sub Categories')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Sub Categories')

{{-- Content body: main page content --}}
@php
    $formArray = ['subcategory_name', 'page_id', 'url'];
@endphp
@section('content_body')
    <form action="{{ route('admin.subcategories.update', $subcategory) }}" method="post">
        @csrf
        @method('PUT')


        <input type="hidden" name="category_id" value="{{ $subcategory }}">
        <x-adminlte-select-bs name="category_id" label="Category" label-class="text-lightblue">
            @foreach ($categories as $cat)
                @if ($cat->id == $subcategory->category_id)
                    <option value="{{ $cat->id }}" selected>{{ $cat->category_name }}</option>
                @else
                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                @endif
            @endforeach
        </x-adminlte-select-bs>

        <x-adminlte-input name="subcategory_name" label="Enter subcategory name" placeholder=" subcategory name"
            label-class="text-lightblue" value="" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-note text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="url" label="URL" placeholder="Enter URL" label-class="text-lightblue" value=""
            enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-note text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-button class="btn-flat" type="submit" label="Update" theme="success" icon="fas fa-lg fa-save" />
    </form>
@stop
