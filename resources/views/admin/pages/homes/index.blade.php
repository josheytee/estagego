@extends('layout.admin')

{{-- Customize layout sections --}}

@section('subtitle', 'Pages')
@section('content_header_title', 'Pages')
@section('content_header_subtitle', 'Homes')

{{-- Content body: main page content --}}

@section('content_body')

    {{-- Setup data for datatables --}}
    @php
        $heads = [
            'ID',
            'Page Title',
            'H1',
            'H2_Orange',
            'H2',
            'Caption',
            'Caption2',
            'Appstore Url',
            'googleplay Url',
            'video Url',
            'Total users',
            'Total downloads',
            'Total household',
            'Total cities',
            'Total countries',
            'etatags',
            'keywords',
            'description',
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
            'data' => [$homes],
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];
    @endphp

    {{-- Minimal example / fill data using the component slot --}}
    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach ($homes as $sub)
            <tr>
                <td>{{ $sub->id }}</td>
                <td>{{ $sub->page_title }}</td>
                <td>{!! $sub->h1 !!}</td>
                <td>{!! $sub->h2_orange !!}</td>
                <td>{!! $sub->h2 !!}</td>
                <td>{!! $sub->caption !!}</td>
                <td>{!! $sub->caption2 !!}</td>
                <td>{{ $sub->appsptore_url }}</td>
                <td>{{ $sub->googleplay_url }}</td>
                <td>{{ $sub->video_url }}</td>
                <td>{{ $sub->total_users }}</td>
                <td>{{ $sub->total_downloads }}</td>
                <td>{{ $sub->total_household }}</td>
                <td>{{ $sub->total_cities }}</td>
                <td>{{ $sub->total_countries }}</td>
                <td>{{ $sub->metatages }}</td>
                <td>{{ $sub->keywords }}</td>
                <td>{{ $sub->description }}</td>
                <td>{{ $sub->created_at }}</td>
                <td>{{ $sub->updated_at }}</td>
                <td>
                    <a href=" {{ route('admin.homes.edit', $sub) }}" class="btn btn-info">
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
