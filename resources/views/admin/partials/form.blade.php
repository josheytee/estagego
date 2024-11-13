@extends('layout.admin')

{{-- Customize layout sections --}}
{{-- @section('subtitle', 'Testimonials')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Testimonials') --}}

{{-- Content body: main page content --}}
@section('content_body')
    <form action="@yield('action')" method="post" enctype="multipart/form-data">
        @csrf

        @if (View::hasSection('method'))
            @yield('method')
            @else
            @method('POST')
        @endif

        @yield('form_array')

        @foreach($formArray as $key => $value)
            @if(is_array($value))
                {{-- If the item is an associative array, access its properties --}}
                @if (isset($value['type']) && $value['type'] == 'textarea')
                    <x-adminlte-textarea name="{{ $key }}" label="{{ $value['text'] ?? ucfirst($key) }}" rows=5 label-class="text-lightblue" igroup-size="sm"
                      placeholder="Insert page...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                            </div>
                        </x-slot>
                        {{ $model->$key }}
                    </x-adminlte-textarea>
                @else
                    <x-adminlte-input name="{{ $key }}" label="{{ $value['text'] ?? ucfirst($key) }}" placeholder="{{ $value['text'] ?? ucfirst($key) }}" label-class="text-lightblue"
                        value="{{ $model->$key }}" enable-old-support>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                @endif

            @else
                @if ($value == 'image')
                    <x-adminlte-input-file-krajee name="image" igroup-size="sm" placeholder="Choose a file...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-lightblue">
                                <i class="fas fa-upload"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-file-krajee>
                @else
                    {{-- Simple string field --}}
                    <x-adminlte-input name="{{ $value }}" label="{{ ucfirst(str_replace('_', ' ', $value)) }}" placeholder="{{ ucfirst(str_replace('_', ' ', $value)) }}" label-class="text-lightblue"
                        value="{{ $model->$value }}" enable-old-support>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                @endif
            @endif
        @endforeach

        <x-adminlte-button class="btn-flat" type="submit" label="Update" theme="success" icon="fas fa-lg fa-save" />
    </form>
@stop
