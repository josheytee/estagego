@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'Abouts')
@section('content_header_title', 'Pages')
@section('content_header_subtitle', 'Abouts')

{{-- Content body: main page content --}}

@section('content_body')

{{-- Setup data for datatables --}}


@php
$heads = [
'ID',
'Title1',
'Content1',
['label' => 'Title2', 'width' => 30],
'Content2',
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
        <td>{{ $about->title1 }}</td>
        <td>{{ $about->content1 }}</td>
        <td>{{ $about->title2 }}</td>
        <td>{{ $about->content2 }}</td>
        <td>{{ $about->created_at }}</td>
        <td>{{ $about->updated_at }}</td>
        <td>
            <a href=" {{ route('admin.abouts.edit', $about) }}" class="btn btn-info">
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
