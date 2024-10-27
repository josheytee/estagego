@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'Site Manager')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Site Manager')

{{-- Content body: main page content --}}

@section('content_body')

{{-- Setup data for datatables --}}
@php
$heads = [
'ID',
'Name',
'Tagline',
['label' => 'Description', 'width' => 15],
'address',
'facebook',
'instagram',
'telegram',
'whatsapp',
'email',
'phone',
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
'data' => [$abouts],
'order' => [[1, 'asc']],
'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach ($abouts as $about)
    <tr>
        <td>{{ $about->id }}</td>
        <td>{{ $about->name }}</td>
        <td>{{ $about->tagline }}</td>
        <td>{{ $about->description }}</td>
        <td>{{ $about->address }}</td>
        <td>{{ $about->facebook }}</td>
        <td>{{ $about->instagram }}</td>
        <td>{{ $about->telegram }}</td>
        <td>{{ $about->whatsapp }}</td>
        <td>{{ $about->email }}</td>
        <td>{{ $about->phone }}</td>
        <td>
            <a href=" {{ route('services.edit', $about) }}" class="btn btn-info">
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
