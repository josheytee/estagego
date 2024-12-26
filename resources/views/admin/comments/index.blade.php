@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'Comments')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Comments')

{{-- Content body: main page content --}}

@section('content_body')

    {{-- Setup data for datatables --}}

    @php
        $heads = [
            'S/N',
            // 'Service',
            'Name',
            'Email',
            'Phone',
            'Website',
            ['label' => 'Comment', 'width' => 30],
            'Show',
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
            'data' => [$comments],
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];
    @endphp

    {{-- Minimal example / fill data using the component slot --}}
    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->name }}</td>
                <td>{{ $comment->phone }}</td>
                <td>{{ $comment->email }}</td>
                <td>{{ $comment->website }}</td>
                <td>{{ $comment->comment }}</td>
                <td>
                    @if ($comment->show)
                        <span class="badge badge-success">Approved</span>
                    @else
                        <span class="badge badge-danger">Banned</span>
                    @endif
                </td>
                <td>
                    @if ($comment->show)
                        <a href="" class="btn btn-danger">
                            <i class="fas fa-ban"></i>
                        </a>
                    @else
                        <a href="" class="btn btn-success">
                            <i class="fas fa-thumbs-up"></i>
                        </a>
                    @endif

                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

    {{-- Compressed with style options / fill data using the plugin config --}}
    {{-- <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$comments" striped hoverable bordered
        compressed /> --}}

@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@endpush
