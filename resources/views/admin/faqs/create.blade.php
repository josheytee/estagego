@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'FAQs')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'FAQs')

{{-- Content body: main page content --}}
@section('content_body')
    <form action="{{ route('admin.faqs.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- Minimal --}}
        <input type="hidden" name="category_id" value="{{ $category }}">
        <x-adminlte-select-bs name="category_id" label="Category" label-class="text-lightblue" disabled>
            @foreach ($categories as $cat)
                @if ($cat->id == $category)
                    <option value="{{ $cat->id }}" selected>{{ $cat->category_name }}</option>
                @else
                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                @endif
            @endforeach
        </x-adminlte-select-bs>

        <x-adminlte-select-bs name="subcategory_name" label="Sub Category" label-class="text-lightblue">
            @foreach ($subCategories as $subCategory)
                <option value="{{ $subCategory->subcategory_name }}">{{ $subCategory->url }} -
                    {{ $subCategory->subcategory_name }}
                </option>
            @endforeach
        </x-adminlte-select-bs>

        <x-adminlte-input name="question" label="Enter Question" placeholder="Question" label-class="text-lightblue"
            value="" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-note text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>


        <x-adminlte-input-switch name="featured" label="Featured" data-on-text="true" data-off-text="false"
            data-on-color="teal">
        </x-adminlte-input-switch>

        <x-adminlte-input-file-krajee name="image" igroup-size="sm" placeholder="Choose a file...">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-lightblue">
                    <i class="fas fa-upload"></i>
                </div>
            </x-slot>
        </x-adminlte-input-file-krajee>

        <x-adminlte-input name="url" label="Video Link" placeholder="URL" label-class="text-lightblue" value=""
            enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-link text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-button class="btn-flat" type="submit" label="Create" theme="success" icon="fas fa-lg fa-save" />
    </form>
@stop
