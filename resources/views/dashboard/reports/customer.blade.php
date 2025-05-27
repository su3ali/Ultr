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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('dash.customers_reports') }}
                            </li>
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>


    </header>
</div>
@endsection
<style>
    .whatsapp-link {
        color: #0074cc;
        /* Default color */
        text-decoration: none;
        /* Remove underline */
    }

    .whatsapp-link:hover {
        color: #25d366;
        /* Color on hover (WhatsApp green) */
    }
</style>
@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="col-md-12 text-right mb-3">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="row">
                                <!-- Date Range Section -->
                                <div class="col-md-1">
                                    <label for="date_from" class="form-label">{{ __('dash.date') }}</label>
                                </div>
                                <div class="col-md-4">
                                    <label for="date_from">{{ __('dash.from') }}</label>
                                    <div class="input-group custom-date-picker">
                                        <input type="date" name="date" class="form-control custom-input" id="date_from">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="date_to">{{ __('dash.to') }}</label>
                                    <div class="input-group custom-date-picker">
                                        <input type="date" name="date2" class="form-control custom-input" id="date_to">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('dash.name') }}</th>
                            <th>{{ __('dash.city') }}</th>
                            <th>{{ __('dash.phone') }}</th>
                            <th>{{ __('dash.orders_count') }}
                            <th>{{ __('dash.created_at') }}</th>
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
    $(document).ready(function () {
        const table = $('#html5-extension').DataTable({
            dom: "<'dt--top-section d-flex justify-content-between align-items-center'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4 text-center'B><'col-sm-12 col-md-4'f>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-flex justify-content-between'<'col-md-6'l><'col-md-6'p>>" +
                "<'dt--pages-count text-center mt-2'i>",

            buttons: [
                {
                    extend: 'copy',
                    className: 'btn btn-sm',
                    text: @json(__('dash.copy'))
                },
                {
                    extend: 'csv',
                    className: 'btn btn-sm',
                    text: @json(__('dash.csv'))
                },
                {
                    extend: 'excel',
                    className: 'btn btn-sm',
                    text: @json(__('dash.excel'))
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm',
                    text: @json(__('dash.print'))
                }
            ],

            order: [[0, 'desc']],

            language: {
                url: "{{ app()->getLocale() === 'ar'
                    ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json'
                    : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
            },

            processing: true,
            serverSide: true,

            ajax: {
                url: '{{ route('dashboard.customer.report') }}',
                data: function (d) {
                    d.date = $('#date_from').val();
                    d.date2 = $('#date_to').val();
                }
            },

            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'city_name', name: 'city_name' },
                { data: 'phone', name: 'phone' },
                { data: 'orders_count', name: 'orders_count' },
                { data : 'created_at', name:'created_at'},
            ],

            pageLength: 10,
            lengthMenu: [
                [10, 100, 500, 1000, 5000, 10000, 20000],
                [10, 100, 500, 1000, 5000, 10000, 20000]
            ]
        });

        //  Reload on date change
        $('#date_from, #date_to').on('change', function () {
            table.ajax.reload();
        });

        //  Toggle customer status
        
    });
</script>
@endpush