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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('dash.client_orders') }}</li>
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>


    </header>
</div>

{{-- @include('dashboard.orders.create') --}}
@endsection

@section('content')
<div class="layout-px-spacing">


    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6" style="width: 95%">
                <div class="col-md-12  mb-3">


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

                        <!-- Status Filter Section -->
                        <div class="col-md-1">
                            <label for="status_filter" class="form-label">{{ __('dash.status') }}</label>
                        </div>
                        <div class="col-md-3">
                            <select class="select2 status_filter form-control custom-select" name="status_filter"
                                id="status_filter">
                                <option value="all" selected>{{ __('dash.all') }}</option>
                                @foreach ($statuses as $id => $status)
                                <option value="{{ $id }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="col-md-12 text-right mb-3">

                    {{-- <button type="button" id="" class="btn btn-primary card-tools" data-toggle="modal" --}} {{--
                        data-target="#createOrderModel"> --}}
                        {{-- {{__('dash.add_new')}} --}}
                        {{-- </button> --}}

                    {{-- <a href="{{ route('dashboard.orders.create') }}" id="" class="btn btn-primary card-tools">
                        {{ __('dash.add_new') }}
                    </a> --}}

                </div>
                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('dash.order_number') }}</th>
                            <th>{{ __('dash.booking_number') }}</th>
                            <th>{{ __('dash.customer_name') }}</th>
                            <th>{{ __('dash.phone') }}</th>
                            <th>{{ __('dash.service') }}</th>
                            <th>{{ __('dash.quantity') }}</th>
                            <th>{{ __('dash.price_value') }}</th>
                            <th>{{ __('dash.payment_method') }}</th>
                            <th>{{ __('dash.zone') }}</th>
                            <th>{{ __('dash.status') }}</th>
                            <th>{{ __('dash.date') }}</th>

                            <th class="no-content">{{ __('dash.actions') }}</th>
                        </tr>
                    </thead>
                </table>


            </div>
        </div>

    </div>

</div>
{{-- @include('dashboard.orders.edit') --}}
@include('dashboard.orders.partial.show_bookings')
@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function() {
    var table = $('#html5-extension').DataTable({
        dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-4 d-flex justify-content-md-start justify-content-center'l><'col-sm-12 col-md-4 d-flex justify-content-center'B><'col-sm-12 col-md-4 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count mb-sm-0 mb-3'i><'dt--pagination'p>>",
        lengthMenu: [
            [10, 25, 50, 100, 200, 500, 1000, 2000, 5000, 10000, 20000],
            [10, 25, 50, 100, 200, 500, 1000, 2000, 5000, 10000, 20000]
        ],
        pageLength: 10,
        order: [
            [0, 'desc']
        ],
        "language": {
            "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
        },
        buttons: [
            { extend: 'copy', className: 'btn btn-sm', text: '{{ __("dash.copy") }}' },
            { extend: 'csv', className: 'btn btn-sm', text: '{{ __("dash.csv") }}' },
            { extend: 'excel', className: 'btn btn-sm', text: '{{ __("dash.excel") }}' },
            { extend: 'print', className: 'btn btn-sm', text: '{{ __("dash.print") }}' }
        ],
        processing: true,
        responsive: true,
        serverSide: true,
        ajax: {
            url: '{{ route('dashboard.orders.index') }}',
            data: function(d) {
                d.start = d.start;
                d.length = d.length;
            }
        },
        pagingType: 'full_numbers',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'booking_id', name: 'booking_id' },
            { data: 'user', name: 'user' },
            { data: 'phone', name: 'phone' },
            { data: 'service', name: 'service' },
            { data: 'quantity', name: 'quantity' },
            { data: 'total', name: 'total' },
            { data: 'payment_method', name: 'payment_method' },
            { data: 'region', name: 'region' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'control', name: 'control', orderable: false, searchable: false }
        ],
    });

    // Trigger table reload when filters change
    $('.status_filter, input[type="date"]').on('change', function() {
        updateTableData();
    });

    function updateTableData() {
        var status_filter = $('.status_filter').val();
        var date = $('#date_from').val();
        var date2 = $('#date_to').val();
        var url = '{{ route('dashboard.orders.index') }}';

        var queryParams = [];

        if (status_filter && status_filter !== 'all') {
            queryParams.push('status=' + status_filter);
        }
        if (date) {
            queryParams.push('date=' + date);
        }
        if (date2) {
            queryParams.push('date2=' + date2);
        }

        if (queryParams.length > 0) {
            url += '?' + queryParams.join('&');
        }

        table.ajax.url(url).load();
    }

    $('.status_filter').select2();  // Initialize Select2 for status filter
});

</script>
@endpush