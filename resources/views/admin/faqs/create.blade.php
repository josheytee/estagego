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
        <x-adminlte-select-bs name="category_id" label="Category" label-class="text-lightblue" :disabled="$category == 4">
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" {{ $cat->id == $category ? 'selected' : '' }}>
                    {{ $cat->category_name }}
                </option>
            @endforeach
        </x-adminlte-select-bs>


        <x-adminlte-select-bs name="subcategory_id" label="Sub Category" label-class="text-lightblue">
            @foreach ($subCategories as $subCategory)
                <option value="{{ $subCategory->id }}">{{ $subCategory->url }} -
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

        @if ($category == 4)
            <x-adminlte-input-file-krajee name="image" igroup-size="sm" placeholder="Choose a file...">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-lightblue">
                        <i class="fas fa-upload"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-file-krajee>

            <x-adminlte-input name="url" label="Video Link" placeholder="URL" label-class="text-lightblue"
                value="" enable-old-support>
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-link text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        @else
            <x-adminlte-input name="answer" label="Answer" placeholder="Enter Answer" label-class="text-lightblue"
                value="" enable-old-support>
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-link text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        @endif

        <x-adminlte-button class="btn-flat" type="submit" label="Create" theme="success" icon="fas fa-lg fa-save" />
    </form>
@stop
