@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'FAQs')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'FAQs')

{{-- Content body: main page content --}}
@section('content_body')
    <form action="{{ route('admin.faqs.update', $faq) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- Minimal --}}
        <input type="hidden" name="category_id" value="{{ $faq->category_id }}">
        <x-adminlte-select-bs name="category_id" label="Category" label-class="text-lightblue" disabled>
            @foreach ($categories as $cat)
                @if ($cat->id == $faq->category_id)
                    <option value="{{ $cat->id }}" selected>{{ $cat->category_name }}</option>
                @else
                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                @endif
            @endforeach
        </x-adminlte-select-bs>

        <input type="hidden" name="subcategory_id" value="{{ $faq->subcategory_id }}">
        <x-adminlte-select-bs name="subcategory_id" label="Sub Category" label-class="text-lightblue">
            @foreach ($subCategories as $subCategory)
                @if ($subCategory->id == $faq->subcategory_id)
                    <option value="{{ $subCategory->id }}" selected>{{ $subCategory->url }} -
                        {{ $subCategory->subcategory_name }}
                    </option>
                @else
                    <option value="{{ $subCategory->subcategory_name }}">{{ $subCategory->url }} -
                        {{ $subCategory->subcategory_name }}
                    </option>
                @endif
            @endforeach
        </x-adminlte-select-bs>

        <x-adminlte-input name="question" label="Enter Question" placeholder="Question" label-class="text-lightblue"
            value="{{ $faq->question }}" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-note text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>


        <x-adminlte-input-switch name="featured" label="Featured" data-on-text="true" data-off-text="false"
            data-on-color="teal">
        </x-adminlte-input-switch>

        @if ($faq->category->id == 4)
            <x-adminlte-input-file-krajee name="image" igroup-size="sm" placeholder="Choose a file...">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-lightblue">
                        <i class="fas fa-upload"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-file-krajee>

            <x-adminlte-input name="url" label="Video Link" placeholder="URL" label-class="text-lightblue"
                value="{{ $answer ? $answer['url'] : '' }}" enable-old-support>
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-link text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        @else
            <x-adminlte-input name="answer" label="Answer" placeholder="Enter Answer" label-class="text-lightblue"
                value="{{ $answer }}" enable-old-support>
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
