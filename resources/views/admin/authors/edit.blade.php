@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'Update Blogs')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Update '.$author->first_name)

{{-- Content body: main page content --}}

@section('content_body')
    <form action="{{ route('admin.authors.update', $author) }}" method="post">
        @csrf
        @method('PUT')
        {{-- image --}}

        {{-- tags --}}

        {{-- With prepend slot --}}
        <x-adminlte-input name="first_name" label="first_name" placeholder="First Name" label-class="text-lightblue"
            value="{{ $author->first_name }}" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="last_name" label="Last Name" placeholder="Last Name" label-class="text-lightblue"
            value="{{ $author->last_name }}" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="company" label="Company" placeholder="Company" label-class="text-lightblue"
            value="{{ $author->company }}" enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
         <x-adminlte-button class="btn-flat" type="submit" label="Update" theme="success" icon="fas fa-lg fa-save" />
    </form>
@stop
