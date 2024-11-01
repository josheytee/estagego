@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'Create Authors')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Create Author')

{{-- Content body: main page content --}}

@section('content_body')
    <form action="{{ route('admin.authors.store') }}" method="post">
        @csrf

        {{-- With prepend slot --}}
        <x-adminlte-input name="first_name" label="First Name" placeholder="First Name" label-class="text-lightblue"
          enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="last_name" label="Last Name" placeholder="Last Name" label-class="text-lightblue"
             enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="company" label="Company" placeholder="Company" label-class="text-lightblue"
            enable-old-support>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
          <x-adminlte-button class="btn-flat" type="submit" label="Update" theme="success" icon="fas fa-lg fa-save" />
    </form>
@stop
