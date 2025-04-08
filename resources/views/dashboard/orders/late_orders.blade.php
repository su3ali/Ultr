@extends('dashboard.layout.layout')

@section('sub-header')
<style>
    /* Prevent parent containers from hiding overflow */
    .layout-px-spacing,
    .widget-content,
    .dataTables_wrapper {
        overflow-x: auto !important;
    }

    /* Force minimum table width to avoid column wrapping */
    #html5-extension {
        min-width: 1400px !important;
    }
</style>
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
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('dash.lateOrder') }}</li>
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
<div class="container-fluid px-3">
    <!-- Use container-fluid for full-width responsive behavior -->

    <div class="row my-3">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-3">

                <div class="card-body">

                    {{-- Filters --}}
                    <div class="row g-3 mb-4 align-items-end">
                        <div class="col-md-1">
                            <label for="date_from" class="form-label fw-semibold text-muted">{{ __('dash.date')
                                }}</label>
                        </div>
                        <div class="col-md-4">
                            <label for="date_from">{{ __('dash.from') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                <input type="date" name="date" class="form-control" id="date_from">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="date_to">{{ __('dash.to') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                <input type="date" name="date2" class="form-control" id="date_to">
                            </div>
                        </div>
                    </div>

                    {{-- Responsive Table --}}
                    <div class="table-responsive">
                        <table id="html5-extension" class="table table-hover table-bordered nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <th>رقم الطلب</th>
                                    {{-- <th>رقم الحجز</th> --}}
                                    <th>{{ __('dash.customer_name') }}</th>
                                    <th>{{ __('dash.phone') }}</th>
                                    <th>{{ __('dash.service') }}</th>
                                    <th>{{ __('dash.quantity') }}</th>
                                    {{-- <th>{{ __('dash.cancelled_by') }}</th> --}}
                                    <th>{{ __('dash.price_value') }}</th>
                                    <th>طريقة الدفع</th>
                                    <th>{{ __('dash.zone') }}</th>
                                    <th>{{ __('dash.status') }}</th>
                                    <th> {{ __('dash.date') }} </th>
                                    <th class="no-content">{{ __('dash.actions') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

{{-- @include('dashboard.orders.edit') --}}
@endsection
@push('script')
<script type="text/javascript">
    $(function () {
    $('[title]').tooltip();
});

    $(document).ready(function () {
        var table = $('#html5-extension').DataTable({
            dom: "<'dt--top-section d-flex justify-content-between align-items-center'<'col-sm-12 col-md-4 d-flex justify-content-start'l><'col-sm-12 col-md-4 d-flex justify-content-center'B><'col-sm-12 col-md-4 d-flex justify-content-end'f>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-flex justify-content-between'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'p>>" +
                "<'dt--pages-count text-center mt-2'i>",

            order: [[0, 'desc']],
            scrollX: true,
            autoWidth: false,
            responsive: false,

            columnDefs: [
                { targets: '_all', className: 'text-nowrap' }
            ],

            pageLength: 10,
            lengthMenu: [
                [10, 30, 100, 200],
                [10, 30, 100, 200]
            ],

            language: {
                url: "{{ app()->getLocale() === 'ar' 
                    ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' 
                    : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
            },

            buttons: [
                {
                    extend: 'copy',
                    className: 'btn btn-sm',
                    text: '<i class="fas fa-copy"></i> نسخ'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-sm',
                    text: '<i class="fas fa-file-csv"></i> تصدير إلى CSV'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-sm',
                    text: '<i class="fas fa-file-excel"></i> تصدير إلى Excel'
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm',
                    text: '<i class="fas fa-print"></i> طباعة'
                }
            ],

            processing: true,
            serverSide: false,

            ajax: {
                url: '{{ route('dashboard.order.lateOrders') }}',
                data: function (d) {
                    d.date = $('#date_from').val();
                    d.date2 = $('#date_to').val();
                }
            },

            columns: [
                { data: 'id', name: 'id' },
                // { data: 'booking_id', name: 'booking_id' },
                { data: 'user', name: 'user' },
                { data: 'phone', name: 'phone' },
                { data: 'service', name: 'service' },
                { data: 'quantity', name: 'quantity' },
                // { data: 'cancelled_by', name: 'cancelled_by' },
                { data: 'total', name: 'total' },
                { data: 'payment_method', name: 'payment_method' },
                { data: 'region', name: 'region' },
                { data: 'status', name: 'status' },
                { data: 'date', name: 'date' },
                {
                    data: 'control',
                    name: 'control',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        //  Reload table when date filters change
        $('#date_from, #date_to').on('change', function () {
            table.ajax.reload();
        });

        //  Technician status toggle
        $("body").on('change', '#customSwitchtech', function () {
            let active = $(this).is(':checked');
            let id = $(this).attr('data-id');

            $.ajax({
                url: '{{ route('dashboard.core.technician.change_status') }}',
                type: 'get',
                data: {
                    id: id,
                    active: active
                },
                success: function () {
                    swal({
                        title: "{{ __('dash.successful_operation') }}",
                        text: "{{ __('dash.request_executed_successfully') }}",
                        type: 'success',
                        padding: '2em'
                    });
                }
            });
        });
    });
</script>
@endpush