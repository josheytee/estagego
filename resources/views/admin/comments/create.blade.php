@extends('layouts.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'Testimonials')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Testimonials')

{{-- Content body: main page content --}}

@section('content_body')
    <form action="{{ route('testimonials.store') }}" method="post">
        @csrf
        {{-- With prepend slot --}}
        <x-adminlte-input name="user" label="User" placeholder="username" label-class="text-lightblue" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="title" label="Title" placeholder="Title" label-class="text-lightblue" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        {{-- With prepend slot, sm size, and label --}}
        <x-adminlte-textarea name="content" label="Testimonial" rows=5 label-class="text-lightblue" igroup-size="sm"
            placeholder="Insert Testimonial...">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-dark">
                    <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-textarea>
        <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save" />
    </form>
@stop
