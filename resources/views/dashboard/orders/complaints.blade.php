@extends('dashboard.layout.layout')
<style>
    .whatsapp-link {
        color: #292727;
        /* WhatsApp green */
        text-decoration: none;
        position: relative;
        transition: color 0.3s ease;
        /* Smooth color transition */
    }

    .whatsapp-link:hover {
        color: #25d366;
        /* Darker WhatsApp green on hover */
    }

    .whatsapp-link .whatsapp-icon {
        font-size: 18px;
        margin-left: 8px;
        opacity: 0;
        /* Initially hide the icon */
        transition: opacity 0.3s ease;
        /* Smooth transition for the icon */
    }

    .whatsapp-link:hover .whatsapp-icon {
        opacity: 1;
        /* Show icon on hover */
    }

    .whatsapp-link .phone-number {
        display: inline-block;
    }
</style>


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
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('dash.complaints_total') }}</li>
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
                <div class="card p-3 mb-4 shadow-sm rounded">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label for="complaintTypeFilter" class="form-label fw-bold">{{ __('dash.complaint_type')
                                }}</label>
                            <select id="complaintTypeFilter" class="form-select">
                                <option value="">{{ __('dash.all') }}</option>
                                @foreach($complaintTypes as $type)
                                <option value="{{ $type->id }}">
                                    {{ app()->getLocale() == 'ar' ? $type->name_ar : $type->name_en }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="statusFilter" class="form-label fw-bold">{{ __('dash.status') }}</label>
                            <select id="statusFilter" class="form-select">
                                <option value="">{{ __('dash.all') }}</option>
                                @foreach($statuses as $status)
                                <option value="{{ $status->id }}">
                                    {{ app()->getLocale() == 'ar' ? $status->name_ar : $status->name_en }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="dateFilter" class="form-label fw-bold">{{ __('dash.date') }}</label>
                            <input type="date" id="dateFilter" class="form-control">
                        </div>

                        {{-- <div class="col-md-3 d-flex align-items-end">
                            <button class="btn btn-outline-secondary w-100" id="resetFilters">
                                <i class="fas fa-sync-alt me-1"></i> {{ __('dash.reset_filters') }}
                            </button>
                        </div> --}}
                    </div>
                </div>




                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>رقم الشكوى</th>
                            <th>رقم الطلب</th>
                            <th>رقم الحجز</th>
                            <th>{{ __('dash.zone') }}</th>
                            <th>{{ __('dash.customer_name') }}</th>
                            <th>{{ __('dash.tech_name') }}</th>
                            <th>هاتف العميل</th>
                            <th>{{ __('dash.status') }}</th>
                            <th>نوع الشكوى</th>
                            <th>{{ __('dash.created_at') }}</th>
                            <th class="no-content">{{ __('dash.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>



            </div>
        </div>

    </div>

</div>
{{-- @include('dashboard.orders.edit') --}}
@endsection
@push('script')
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#html5-extension').DataTable({
            dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            order: [[0, 'desc']],
            language: {
                url: "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
            },
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn btn-sm', text: 'نسخ' },
                    { extend: 'csv', className: 'btn btn-sm', text: 'تصدير إلى CSV' },
                    { extend: 'excel', className: 'btn btn-sm', text: 'تصدير إلى Excel' },
                    { extend: 'print', className: 'btn btn-sm', text: 'طباعة' }
                ]
            },
            processing: true,
            serverSide: false,
            ajax: {
                url: '{{ route('dashboard.order.complaints') }}',
                data: function (d) {
                    d.complaintType = $('#complaintTypeFilter').val();
                    d.status = $('#statusFilter').val();
                    d.date = $('#dateFilter').val();
                }
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'order_id', name: 'order_id' },
                { data: 'booking_no', name: 'booking_no' },
                { data: 'zone_name', name: 'zone_name' },
                { data: 'customer_name', name: 'customer_name' },
                { data: 'tech_name', name: 'tech_name' },
                { data: 'customer_phone', name: 'customer_phone' },
                { data: 'status', name: 'status' },
                { data: 'complaintType', name: 'complaintType' },
                { data: 'created_at', name: 'created_at' },
                {
                    data: 'control',
                    name: 'control',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        // Reload table on filter change
        $('#complaintTypeFilter, #statusFilter, #dateFilter').on('change', function () {
            table.ajax.reload();
        });
    });


    $('#resetFilters').on('click', function () {
    $('#complaintTypeFilter').val('');
    $('#statusFilter').val('');
    $('#dateFilter').val('');
    table.ajax.reload();
});

</script>
@endpush