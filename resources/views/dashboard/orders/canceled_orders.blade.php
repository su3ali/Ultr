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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('dash.canceled_orders') }}</li>
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>


    </header>
</div>

{{-- @include('dashboard.orders.create') --}}
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

                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>رقم الطلب</th>
                            {{-- <th>رقم الحجز</th> --}}
                            <th>{{ __('dash.customer_name') }}</th>
                            <th>{{ __('dash.phone') }}</th>
                            <th>{{ __('dash.service') }}</th>
                            <th>{{ __('dash.quantity') }}</th>
                            <th>{{ __('dash.cancelled_by') }}</th>
                            <th>{{ __('dash.price_value') }}</th>
                            <th>{{ __('dash.status') }}</th>
                            <th>{{ __('dash.zone') }}</th>
                            <th>تاريخ إنشاء الطلب</th>
                            <th>تاريخ إلغاء الطلب</th>
                            <th class="no-content">{{ __('dash.actions') }}</th>
                        </tr>
                    </thead>
                </table>


            </div>
        </div>

    </div>

</div>
{{-- @include('dashboard.orders.edit') --}}
@endsection

@push('script')
<script type="text/javascript">
    const canceledOrdersUrl = '{{ route('dashboard.order.canceledOrders') }}';
    const langUrl = "{{ app()->getLocale() == 'ar' 
        ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' 
        : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}";

    $(document).ready(function () {
        const table = $('#html5-extension').DataTable({
            dom: `
                <'dt--top-section d-flex justify-content-between align-items-center'
                    <'col-sm-12 col-md-4 d-flex justify-content-start'l>
                    <'col-sm-12 col-md-4 d-flex justify-content-center'B>
                    <'col-sm-12 col-md-4 d-flex justify-content-end'f>
                >
                <'table-responsive'tr>
                <'dt--bottom-section d-flex justify-content-between'
                    <'col-sm-12 col-md-6'l>
                    <'col-sm-12 col-md-6'p>
                >
                <'dt--pages-count text-center mt-2'i>
            `,
            language: {
                url: langUrl
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
            pageLength: 10,
            order: [[0, 'desc']],
            lengthMenu: [[10, 30, 100, 200], [10, 30, 100, 200]],
            processing: true,
            serverSide: true,
            responsive: true,
            pagingType: 'full_numbers',

            ajax: {
                url: canceledOrdersUrl,
                data: function (d) {
                    const statusFilter = $('.status_filter').val();
                    if (statusFilter && statusFilter !== 'all') {
                        d.status = statusFilter;
                    }
                }
            },

            columns: [
                { data: 'id', name: 'id' },
                { data: 'user', name: 'user' },
                { data: 'phone', name: 'phone' },
                { data: 'service', name: 'service' },
                { data: 'quantity', name: 'quantity' },
                { data: 'cancelled_by', name: 'cancelled_by' },
                { data: 'total', name: 'total' },
                { data: 'status', name: 'status' },
                { data: 'region', name: 'region' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                {
                    data: 'control',
                    name: 'control',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        // Filter handler
        $('.status_filter').on('change', function () {
            table.ajax.reload();
        });
    });
</script>
@endpush