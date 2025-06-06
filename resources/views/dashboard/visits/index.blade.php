@extends('dashboard.layout.layout')

@section('sub-header')
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">

        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>

        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">

                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 py-2">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">{{ __('dash.home')
                                    }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> {{ __('dash.tech_orders') }}</li>
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>


    </header>
</div>
@endsection

@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="col-md-12  mb-3">


                    <div class="row">



                        <div class="col-md-1">
                            <label for="inputEmail4">{{ __('dash.status') }}</label>
                        </div>
                        <div class="col-md-4">
                            <select class="select2 status_filter form-control" name="status_filter">
                                <option value="all" selected>{{ __('dash.status') }}</option>
                                @foreach ($statuses as $id => $status)
                                <option value="{{ $id }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                </div>
                <div class="col-md-12 text-right mb-3">


                </div>
                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th> {{ __('dash.order_number') }}</th>
                            <th> {{ __('dash.booking_number') }}</th>
                            <th> {{ __('dash.team') }}</th>
                            <th> {{ __('dash.zone') }}</th>
                            <th> {{ __('dash.date') }}</th>
                            <th> {{ __('dash.start_time') }}</th>
                            <th> {{ __('dash.end_time') }}</th>
                            <th> {{ __('dash.duration') }}</th>
                            <th> {{ __('dash.status') }}</th>
                            <th class="no-content">{{ __('dash.actions') }}</th>
                        </tr>
                    </thead>
                </table>


            </div>
        </div>

    </div>

</div>
@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function() {
            var table = $('#html5-extension').DataTable({
                dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-4 d-flex justify-content-md-start justify-content-center'l><'col-sm-12 col-md-4 d-flex justify-content-center'B><'col-sm-12 col-md-4 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count mb-sm-0 mb-3'i><'dt--pagination'p>>",

                lengthMenu: [
                    [10, 25, 50, 100, 200, 500, 1000, 2000, 5000, 10000],
                    [10, 25, 50, 100, 200, 500, 1000, 2000, 5000, 10000]
                ],
                pageLength: 10, // Default rows per page
                order: [
                    [0, 'desc']
                ],

                "language": {
                    "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
                },
                buttons: {
                    buttons: [
                        {
                            extend: 'copy',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.copy") }}'


                        },
                        {
                            extend: 'csv',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.csv") }}'
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.excel") }}'
                        },
                        {
                            extend: 'print',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.print") }}'
                        }
                    ]
                },
                processing: true,
                serverSide: true,
                ajax: '{{ route('dashboard.visits.index') }}',


               

                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'booking_id',
                        name: 'booking_id'
                    },
                    // {data: 'visite_id', name: 'visite_id'},
                   
                    {
                        data: 'group_name',
                        name: 'group_name'
                    },
                    {
                        data: 'region_name',
                        name: 'region_name'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'start_time',
                        name: 'start_time'
                    },
                    {
                        data: 'end_time',
                        name: 'end_time'
                    },
                    {
                        data: 'duration',
                        name: 'duration'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'control',
                        name: 'control',
                        orderable: false,
                        searchable: false
                    },

                ]
            });

            function updateTableData() {
                var status_filter = $('.status_filter').val();
                var url = '{{ route('dashboard.visits.index') }}';

                if (status_filter && status_filter !== 'all') {
                    url += '?status=' + status_filter;
                }

                // Update table data
                table.ajax.url(url).load();

            }
            $('.status_filter').change(function() {
                updateTableData();
            });
        });
</script>
@endpush