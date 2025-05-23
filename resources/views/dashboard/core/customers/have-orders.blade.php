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
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.home') }}">{{ __('dash.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('dash.clients_orders') }}
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

                        <a href="{{ route('dashboard.core.customer.create') }}"
                            class="btn btn-primary">{{ __('dash.add_new') }}</a>


                    </div>
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('dash.name') }}</th>
                                <th>{{ __('dash.zone') }}</th>
                                <th>{{ __('dash.phone') }}</th>
                                <th>{{ __('dash.orders_numbers') }}</th>
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
            $('#html5-extension').DataTable({
                dom: "<'dt--top-section d-flex justify-content-between align-items-center'<'col-sm-12 col-md-4 d-flex justify-content-start'l><'col-sm-12 col-md-4 d-flex justify-content-center'B><'col-sm-12 col-md-4 d-flex justify-content-end'f>>" +
                    "<'table-responsive'tr>" + // Table rows
                    "<'dt--bottom-section d-flex justify-content-between'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'p>>" +
                    "<'dt--pages-count text-center mt-2'i>", // Entry count at the bottom-center

                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm',
                        text: '<i class="fas fa-copy"></i> نسخ' // Adding a copy icon
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm',
                        text: '<i class="fas fa-file-csv"></i> تصدير إلى CSV' // Adding a CSV icon
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm',
                        text: '<i class="fas fa-file-excel"></i> تصدير إلى Excel' // Adding an Excel icon
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm',
                        text: '<i class="fas fa-print"></i> طباعة' // Adding a print icon
                    }
                ],

                order: [
                    [0, 'desc']
                ],
                language: {
                    url: "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
                },
                processing: true,
                serverSide: true,
                ajax: '{{ route('dashboard.core.customer.orders') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'region',
                        name: 'region'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'orders_numbers',
                        name: 'orders_numbers'
                    },

                ],
                pageLength: 10,
                lengthMenu: [
                    [10, 100, 500, 1000, 5000, 10000, 20000],
                    [10, 100, 500, 1000, 5000, 10000, 20000]
                ]
            });
        });




        $("body").on('change', '#customSwitch4', function() {
            let active = $(this).is(':checked');
            let id = $(this).attr('data-id');

            $.ajax({
                url: '{{ route('dashboard.core.customer.change_status') }}',
                type: 'get',
                data: {
                    id: id,
                    active: active
                },
                success: function(data) {
                    swal({
                        title: "{{ __('dash.successful_operation') }}",
                        text: "{{ __('dash.request_executed_successfully') }}",
                        type: 'success',
                        padding: '2em'
                    });
                }
            });
        });
    </script>
@endpush
