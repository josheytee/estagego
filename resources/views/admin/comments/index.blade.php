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
            ['label' => 'Actions', 'no-export' => true, 'width' => 15],
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
                    <a href="{{ route('admin.comments.acknowledge', $comment) }}"
                        class="btn {{ !$comment->show ? ' btn-success' : ' btn-danger' }}">
                        @if ($comment->show)
                            <i class="fas fa-ban"></i>
                        @else
                            <i class="fas fa-thumbs-up"></i>
                        @endif
                    </a>
                    <a href=" {{ route('admin.comments.edit', $comment) }}" class="btn btn-info">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </a>
                    <a onclick="sendDelete('{{ route('admin.comments.destroy', $comment) }}')" href="#"
                        data-method="DELETE" data-confirm="Are you sure to delete this item?"
                        class="btn btn-danger pull-right delete">
                        <i class="fa fa-trash"></i>
                    </a>

                </td>

            </tr>
        @endforeach
        <input type="hidden" id="csrf" value={{ csrf_token() }}>
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
