@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'FAQs')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'FAQs')

{{-- Content body: main page content --}}
@php
$formArray = [
// ['category_id' => [
//     'type' => 'select',
//     'data' => '',
//     'key' => '',
//     'value' => ''
// ]],
'category_id',
'subcategory_name',
'question',
'answer',
'featured'
]
@endphp
@section('content_body')
    <form action="{{ route('admin.faqs.update', $faq) }}" method="post">
        @csrf
        @method('PUT')
{{-- Minimal --}}
<x-adminlte-select-bs name="category_id"  label="Category" label-class="text-lightblue" >
    @foreach ($categories as $category)
    <option value="{{$category->id}}">{{$category->category_name}}</option>
    @endforeach
</x-adminlte-select-bs>

<x-adminlte-select-bs name="subcategory_name" label="Sub Category" label-class="text-lightblue">
    @foreach ($subCategories as $subCategory)
    <option value="{{$subCategory->id}}">{{$subCategory->url}} - {{$subCategory->subcategory_name}}</option>
    @endforeach
</x-adminlte-select-bs>


@if ($faq->featured == 'true')
<x-adminlte-input-switch name="featured" label="Featured" data-on-text="true" data-off-text="false"
    data-on-color="teal"  checked>
</x-adminlte-input-switch>
@else
<x-adminlte-input-switch name="featured" label="Featured" data-on-text="true" data-off-text="false"
    data-on-color="teal" >
</x-adminlte-input-switch>

@endif

<x-adminlte-textarea name="answer" label="Answer" rows=5 label-class="text-lightblue" igroup-size="sm"
placeholder="Insert page...">
   <x-slot name="prependSlot">
       <div class="input-group-text bg-dark">
           <i class="fas fa-lg fa-file-alt text-lightblue"></i>
       </div>
   </x-slot>
   {{ $faq->answer }} </x-adminlte-textarea>
        <x-adminlte-button class="btn-flat" type="submit" label="Update" theme="success" icon="fas fa-lg fa-save" />
    </form>
@stop
