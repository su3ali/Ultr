@extends('dashboard.layout.layout')

@push('style')

<style>
    .coupon-icon {
        color: gold;
        transition: color 0.3s ease;
    }

    .apply-coupon-btn:hover .coupon-icon {
        color: #dc3545;
        /* Bootstrap danger color or pick your own */
    }


    .table>thead>tr>th {
        white-space: unset !important;

    }

    .customer-link {
        text-decoration: none;
        color: #2B68A6;
        /* Blue color for visibility */
        font-weight: bold;
        cursor: pointer;
        /* Changes cursor to a pointer */
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
        /* Smooth transition for hover effect */
    }

    .customer-link:hover {
        color: #2B68A6;
        /* Darker blue on hover */
        text-decoration: underline;
        /* Underline on hover */
    }

    .customer-link i {
        font-size: 0.8em;
        /* Optional smaller icon */
    }

    /* Optional color variations */
    .customer-link.active {
        color: #28a745;
        /* Green for active state */
    }

    .customer-link.disabled {
        color: #6c757d;
        /* Gray for disabled state */
        cursor: not-allowed;
    }

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

    .form-label {
        margin-bottom: 0.25rem;
        display: inline-block !important;
        font-weight: 600;
    }

    .select2-container--default .select2-selection--single {
        height: 40px !important;
        padding: 6px 12px !important;
        font-size: 0.95rem !important;
    }
</style>
@endpush


@php

$dataTabel = 'dataTable-service';
$type = 'service';
if (request()->query('type') && request()->query('type') == 'package') {
$dataTabel = 'dataTable-package';
$type = 'package';
}
@endphp

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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('dash.bookings') }}</li>
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

    <div class="layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="col-md-12 text-right mb-3">

                    {{-- <a href="{{route('dashboard.bookings.create')}}" id="" class="btn btn-primary card-tools"> --}}
                        {{-- {{__('dash.add_new')}} --}}
                        {{-- </a> --}}

                </div>
                <div class="table-responsive">


                    <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link @if ($type == 'service') active @endif" id="service-tab"
                                href="{{ url('admin/bookings?type=service') }}" role="tab" aria-controls="service"
                                aria-selected="true"> {{ __('dash.service_bookings') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @if ($type == 'package') active @endif" id="package-tab"
                                href="{{ url('admin/bookings?type=package') }}" role="tab" aria-controls="package"
                                aria-selected="false"> {{ __('dash.package_bookings') }}</a>
                        </li>
                    </ul>
                    <div class="col-md-12  mb-3">
                        <div class="row">
                            <div class="col-md-1">
                                <label for="inputEmail4">{{ __('dash.date') }}</label>
                            </div>
                            <label>{{ __('dash.from') }}</label>
                            <div class="col-md-4">
                                <input type="datetime-local" name="date" class="form-control date" step="1"
                                    id="inputEmail4">
                            </div>
                            <label>{{ __('dash.to') }}</label>
                            <div class="col-md-4">
                                <input type="datetime-local" name="date2" class="form-control date2" step="1"
                                    id="inputEmail42">
                            </div>
                        </div>
                        <br>
                        <div class="row align-items-end mt-3">
                            <div class="col-md-2">
                                <label>{{ __('dash.zone') }}</label>
                                <select class="form-control zone_filter select2">
                                    <option value="all">{{ __('dash.all') }}</option>
                                    @foreach ($zones as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label>{{ __('dash.status') }}</label>
                                <select class="form-control status_filter select2" name="status_filter">
                                    <option value="all" selected>{{ __('dash.all') }}</option>
                                    @foreach ($visitsStatuses as $id => $status)
                                    <option value="{{ $id }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="tab-content" id="simpletabContent">
                        <div class="tab-pane fade @if ($type == 'service') show active @endif " id="service"
                            role="tabpanel" aria-labelledby="service-tab">
                            @include('dashboard.bookings.partial.service')

                        </div>
                        <div class="tab-pane fade @if ($type == 'package') show active @endif " id="package"
                            role="tabpanel" aria-labelledby="package-tab">
                            @include('dashboard.bookings.partial.contract')
                        </div>
                    </div>


                </div>


            </div>
        </div>

    </div>

</div>

@include('dashboard.bookings.partial.add_group')
@include('dashboard.bookings.partial.couponModal')
@include('dashboard.bookings.partial.change_status')

@endsection
@push('script')

<!-- Bootstrap 5 & Select2 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        // Initialize Select2 for filters outside the modal
    $('.zone_filter').select2({
        width: 'resolve',
        dir: 'rtl',
        placeholder: "اختر المنطقة"
    });

    $('.status_filter').select2({
        width: 'resolve',
        dir: 'rtl',
        placeholder: "اختر الحالة"
    });

    // ------------------[ DataTable Setup ]------------------
    const table = $('#{{ $dataTabel }}').DataTable({
        dom: "<'dt--top-section'<'row'<'col-md-4 text-md-start text-center'l><'col-md-4 text-center'B><'col-md-4 text-md-end text-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count mb-sm-0 mb-3'i><'dt--pagination'p>>",
        lengthMenu: [[10, 25, 50, 100, 200, 500, 2000, 5000, 10000], [10, 25, 50, 100, 200, 500, 2000, 5000, 10000]],
        pageLength: 10,
        order: [[0, 'desc']],
        language: {
            url: "{{ app()->getLocale() == 'ar' 
                ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' 
                : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
        },
        buttons: [
            { extend: 'copy', text: '<i class="fas fa-copy"></i> نسخ', className: 'btn btn-sm' },
            { extend: 'csv', text: '<i class="fas fa-file-csv"></i> CSV', className: 'btn btn-sm' },
            { extend: 'excel', text: '<i class="fas fa-file-excel"></i> Excel', className: 'btn btn-sm' },
            { extend: 'print', text: '<i class="fas fa-print"></i> طباعة', className: 'btn btn-sm' }
        ],
        processing: true,
        responsive: true,
        serverSide: true,
        ajax: '{{ url('admin/bookings?type=' . $type) }}',
        columns: [
            { data: 'id' }, { data: 'order' }, { data: 'customer' },
            { data: 'customer_phone' }, { data: 'service' },
            { data: 'date' }, { data: 'time' }, { data: 'quantity' },
            { data: 'zone' }, { data: 'group' }, { data: 'total' },
            { data: 'status' }, { data: 'payment_method' },
            { data: 'notes' },
            { data: 'control', orderable: false, searchable: false }
        ]
    });

    // ------------------[ Filter Update ]------------------
    function updateTableData() {
        let url = '{{ url('admin/bookings?type=' . $type) }}';
        const filters = {
            status: $('.status_filter').val(),
            zone: $('.zone_filter').val(),
            date: $('.date').val(),
            date2: $('.date2').val()
        };

        for (const key in filters) {
            if (filters[key] && filters[key] !== 'all') {
                url += `&${key}=${filters[key]}`;
            }
        }

        table.ajax.url(url).load();
    }

    $('.date, .date2, .status_filter, .zone_filter').on('change', updateTableData);
    $('#searchInput').on('keyup', function () { table.draw(); });

    // ------------------[ Coupon Modal + Select2 ]------------------
    $('#couponModal').on('shown.bs.modal', function () {
        $('#client_coupon_id, #employee_coupon_id').select2({
            dropdownParent: $('#couponModal'),
            width: '100%',
            dir: 'rtl'
        });
    });

    $(document).on('click', '.apply-coupon-btn', function () {
        $('#coupon_order_id').val($(this).data('order_id'));
        $('#coupon_booking_id').val($(this).data('booking_id'));
        $('#couponModal').modal('show');
    });

$('#applyCouponForm').on('submit', function (e) {
    e.preventDefault();

    const code = $('#client_coupon_id').val() || $('#employee_coupon_id').val();
    const booking_id = $('#coupon_booking_id').val();
    const force_apply = $('#forceApplyCoupon').is(':checked') ? 1 : 0;

    $.ajax({
        url: '{{ route("dashboard.bookings.applyCoupon") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            code: code,
            booking_id: booking_id,
            force_apply: force_apply 
        },
        success: function (response) {
            $('#couponModal').modal('hide');
            toastr.success(response.message);
            $('#html5-extension').DataTable().ajax.reload();
        },
        error: function (xhr) {
            const res = xhr.responseJSON;
            toastr.error(res.message || 'فشل تطبيق الكوبون');
            console.error(res);
        }
    });
});



    $('.coupon-type').on('change', function () {
        const type = $(this).val();
        if (type === 'client') {
            $('#client_coupon_group').removeClass('d-none');
            $('#employee_coupon_group').addClass('d-none').find('select').val('').trigger('change');
        } else {
            $('#employee_coupon_group').removeClass('d-none');
            $('#client_coupon_group').addClass('d-none').find('select').val('').trigger('change');
        }
    });

    $('#couponModal').on('hidden.bs.modal', function () {
        $('input[name="coupon_type"][value="client"]').prop('checked', true).trigger('change');
        $('#client_coupon_id, #employee_coupon_id').val(null).trigger('change');
    });

    // ------------------[ Group Assignment Logic ]------------------
    $(document).on('click', '#add-work-exp', function () {
        const {
            id: booking_id,
            service_id, category_id, visit_id, address_id,
            type, date, time, group_id, quantity
        } = $(this).data();

        $.ajax({
            url: '{{ route('dashboard.getGroupByService') }}',
            type: 'get',
            data: { booking_id, service_id, category_id, address_id, type, date, time, group_id, quantity },
            success: function (data) {
                const select = visit_id ? $('#edit_group_id') : $('#group_id');
                select.empty();

                
                

                $.each(data, (i, item) => {
                    select.append(new Option(item, i));
                });

                $('#booking_id').val(booking_id);
                if (visit_id) {
                    $('.visit_Div').html(`<input type="hidden" name="visit_id" value="${visit_id}">`);
                    $('#edit_booking_id').val(booking_id);
                    $('#edit_group_form').attr('action', `${window.location.origin}/admin/visits/${visit_id}`);
                }
            }
        });
    });

    // ------------------[ Toggle Booking Status ]------------------
    $("body").on('change', '#customSwitchStatus', function () {
        const id = $(this).data('id');
        const active = $(this).is(':checked');
        $.get('{{ route('dashboard.booking_statuses.change_status') }}', { id, active }, function () {
            Swal.fire('{{ __("dash.successful_operation") }}', '{{ __("dash.request_executed_successfully") }}', 'success');
        });
    });

    // ------------------[ Change Booking Status Modal ]------------------
    $(document).on('click', '.change-status-btn', function () {
        $('#bookingId').val($(this).data('id'));
        $('#newStatus').val($(this).data('current-status'));
        $('#changeStatusModal').modal('show');
    });

    $('#changeStatusForm').on('submit', function (e) {
        e.preventDefault();
        $.post('{{ route("dashboard.booking.changeStatus") }}', $(this).serialize(), function () {
            $('#changeStatusModal').modal('hide');
            table.ajax.reload();
            Swal.fire('تم التحديث!', 'تم تغيير حالة الطلب بنجاح.', 'success');
        }).fail(() => {
            Swal.fire('خطأ!', 'حدث خطأ أثناء تغيير الحالة.', 'error');
        });
    });

});
</script>
@endpush