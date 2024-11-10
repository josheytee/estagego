@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'Experts')
@section('content_header_title', 'Pages')
@section('content_header_subtitle', 'Experts')

{{-- Content body: main page content --}}

@section('content_body')

{{-- Setup data for datatables --}}
@php
$heads = [
'ID',
'Name',
'Title',
'Image',
'Linkedin',
'Instagram',
'Bio',
'Created',
'Updated',
['label' => 'Actions', 'no-export' => true, 'width' => 10],
];

$btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
    <i class="fa fa-lg fa-fw fa-pen"></i>
</button>';
$btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
    <i class="fa fa-lg fa-fw fa-trash"></i>
</button>';
$btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
    <i class="fa fa-lg fa-fw fa-eye"></i>
</button>';

$config = [
'data' => [$experts],
'order' => [[1, 'asc']],
'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach ($experts as $expert)
    <tr>
        <td>{{ $expert->id }}</td>
        <td>{{ $expert->name }}</td>
        <td>{{ $expert->title }}</td>
        <td>
            @if (count($expert->images))
                <img src="{{asset('storage/experts/images/'.$expert->images[0]->path) }}" alt="{{$expert->images[0]->path}}" style="width: 100px; height: 50px; object-fit: cover;">
            @endif
        </td>
        <td>{{ $expert->linkedin }}</td>
        <td>{{ $expert->instagram }}</td>
        <td>{{ $expert->bio }}</td>
        <td>{{ $expert->created_at }}</td>
        <td>{{ $expert->updated_at }}</td>
        <td>
            <a href=" {{ route('admin.experts.edit', $expert) }}" class="btn btn-info">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </a>
        </td>

    </tr>
    @endforeach
    {{-- <input type="hidden" id="csrf" value={{ csrf_token() }}> --}}
</x-adminlte-datatable>

@stop

{{-- Push extra CSS --}}

@push('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
<script>
    function sendDelete(p) {

        event.preventDefault();

        // var choice = confirm(this.getAttribute('data-confirm'));
        var choice = confirm('you sure to delete this item?');

        if (choice) {

            const token = document.querySelector('#csrf').value;
            console.log(token);

            var data = new FormData();
            data.append('_method', 'DELETE');
            data.append('_token', token);
            // data.append('organization', 'place');
            // data.append('requiredkey', 'key');

            var xhr = new XMLHttpRequest();
            xhr.open('POST', p, true);
            xhr.onload = function() {
                // do something to response
                console.log(this.responseText);
                window.location.reload();
            };
            xhr.send(data);
        }

        // });
        // }
    }
</script>
@endpush
