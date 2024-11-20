@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'Blogs')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Blogs')

{{-- Content body: main page content --}}

@section('content_body')

{{-- Setup data for datatables --}}
@php
$heads = [
'ID',
'Author',
'Title',
'Caption',
'Image',
['label' => 'Content', 'width' => '30'],
'Date',
'Tags',
'Top Blog',
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
'data' => [$blogs],
'order' => [[1, 'asc']],
'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach ($blogs as $blog)
    <tr>
        <td>{{ $blog->id }}</td>
        <td>{{ $blog->author_id}}</td>
        <td>{{ $blog->title }}</td>
        <td>{{ $blog->caption }}</td>
        
        <td>
            @if (count($blog->images))
            <img src="{{asset('storage/blogs/images/'.$blog->images[0]->path) }}" alt="{{$blog->images[0]->path}}" style="width: 100px; height: 50px; object-fit: cover;">
            @endif
        </td>
        <td>{{ $blog->truncatedContent(30) }}</td>
        <td>{{ $blog->date }}</td>
        <td>{{ $blog->tags }}</td>
        <td>{{ $blog->top_blog }}</td>
        <td>{{ $blog->created_at }}</td>
        <td>{{ $blog->updated_at }}</td>
        <td>
            <a href=" {{ route('admin.blogs.edit', $blog) }}" class="btn btn-info">
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
