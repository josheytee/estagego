@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'Testimonials')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Testimonials')

{{-- Content body: main page content --}}
@php
    $formArray=[
'image',
'name',
'title',
'linkedin',
'instagram',
'bio',
]
@endphp
@section('content_body')
    <form action="{{ route('admin.experts.update', $expert) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')


@foreach($formArray as $key => $value)
    @if(is_array($value))
        {{-- If the item is an associative array, access its properties --}}
        @if (isset($value['type']) && $value['type'] == 'textarea')
            <x-adminlte-textarea name="content" label="{{$value['text'] ?? ucfirst($key)}}" rows=5 label-class="text-lightblue" igroup-size="sm"
              placeholder="Insert page...">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                    </div>
                </x-slot>
                {{ $expert->$key }}
            </x-adminlte-textarea>
        @else
            <x-adminlte-input name="{{$key}}" label="{{ $value['text'] ?? ucfirst($key) }}" placeholder="{{ $value['text'] ?? ucfirst($key) }}" label-class="text-lightblue"
                value="{{ $expert->$key }}" enable-old-support>
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-user text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        @endif

    @else
        @if ($value == 'image')
                <x-adminlte-input-file-krajee name="image"/>
        @else
        {{-- If the item is a simple string, use it as the name and label --}}
            <x-adminlte-input name="{{$value}}" label="{{ ucfirst(str_replace('_', ' ', $value)) }}" placeholder="{{ ucfirst(str_replace('_', ' ', $value)) }}" label-class="text-lightblue"
                value="{{ $expert->$value }}" enable-old-support>
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        {{-- <i class="fas fa-user text-lightblue"></i> --}}
                    </div>
                </x-slot>
            </x-adminlte-input>
        @endif
        {{-- <div class="form-group">
            <label for="{{ $key }}">{{ ucfirst(str_replace('_', ' ', $value)) }}</label>
            <input type="text" name="{{ $key }}" id="{{ $key }}" class="form-control" placeholder="{{ ucfirst(str_replace('_', ' ', $value)) }}">
        </div> --}}
    @endif
@endforeach

    {{-- @php
    $config = [
        "height" => "100",
        "toolbar" => [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ],
    ]
    @endphp --}}
        <x-adminlte-button class="btn-flat" type="submit" label="Update" theme="success" icon="fas fa-lg fa-save" />
    </form>
    @stop
    {{-- @section('plugins.summernote', true)

        <x-adminlte-text-editor name="teConfig" label="WYSIWYG Editor" label-class="text-danger"
         igroup-size="sm" placeholder="Write some text..." :config="$config"/>
        <x-adminlte-text-editor name="teDisabled" >
            <b>Lorem ipsum dolor sit amet</b>, consectetur adipiscing elit.
            <br>
            <i>Aliquam quis nibh massa.</i>
        </x-adminlte-text-editor>

    @stop --}}
