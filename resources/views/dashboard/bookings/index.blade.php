@extends('dashboard.layout.layout')

@push('style')

<style>
    details summary {
        cursor: pointer;
        user-select: none;
    }

    details[open] summary {
        color: #0d6efd;
    }

    #log-list li {
        line-height: 1.8;
        font-size: 0.95rem;
    }

    #log-list i.fas.fa-arrow-left {
        transform: rotate(180deg);
        /* flip arrow for RTL */
    }

    #log-list .badge {
        font-size: 0.75rem;
        padding: 0.35em 0.6em;
    }

    #log-list ul {
        direction: rtl;
        text-align: right;
    }

    #log-list li.ms-3 {
        margin-right: 1.5rem;
        font-size: 0.9em;
    }

    #log-list pre {
        font-family: monospace;
        background-color: #f8f9fa;
        direction: ltr;
        text-align: left;
    }




    .table td,
    .table th {
        font-weight: bold !important;
    }

    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

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

    .whatsapp-link {
        color: #0c58aa;
        /* Default color */
        text-decoration: none;
        /* Remove underline */
    }

    .whatsapp-link:hover {
        color: #25d366;
        /* Color on hover (WhatsApp green) */
    }

    /* Styling for the option cards */
    .option-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 180px;
        height: 120px;
        border: 2px solid #ddd;
        border-radius: 12px;
        padding: 10px;
        cursor: pointer;
        text-align: center;
        transition: all 0.3s ease-in-out;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        color: white;
        user-select: none;
        position: relative;
        margin: 2px;
    }

    .option-card:hover {
        border-color: #2B68A6;
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(36, 88, 143, 0.3);
    }

    /* Hide the actual radio button */
    .option-card input {
        display: none;
    }

    .option-card input:checked+.option-content {
        border-color: #fff;
        background-color: #2B68A6;
        color: #fff;
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.5);
    }

    .option-card input:checked+.option-content * {
        color: #fff !important;
        fill: #fff !important;
    }


    /* Icon styling */
    .option-content i {
        font-size: 18px;
        margin-bottom: 8px;
    }

    /* Transition effect */
    .option-content {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: white;
        transition: all 0.3s ease-in-out;
    }

    .dropdown-menu {
        min-width: 220px;
        border-radius: 0.5rem;
        padding: 0.25rem 0;
        font-size: 14px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .dropdown-menu .dropdown-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 16px;
        color: #2c3e50;
        font-weight: 700;
        transition: background-color 0.2s ease;
    }

    .dropdown-menu .dropdown-item i {
        min-width: 18px;
        text-align: center;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #f0f4f7;
        color: #0c63e4;
    }

    .dropdown-toggle::after {
        margin-right: 8px;
    }

    .btn.dropdown-toggle {
        background-color: #4a8df6;
        border-color: #4a8df6;
        color: #fff;
        font-weight: 700;
    }

    .btn.dropdown-toggle:hover {
        background-color: #3a7ee2;
        border-color: #3a7ee2;
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
                    {{-- filter --}}

                    @include('dashboard.bookings.partial.filter')
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


@include('dashboard.bookings.partial.rescheduleModal')
@include('dashboard.bookings.partial.add_group')
@include('dashboard.bookings.partial.couponModal')
@include('dashboard.bookings.partial.change_status')
@include('dashboard.bookings.partial.refundModal')

<div class="modal fade" id="logsModal" tabindex="-1" aria-labelledby="logsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logsModalLabel">سجل النشاط</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>

            </div>
            <div class="modal-body">
                <ul id="log-list" class="list-group">
                    <li class="list-group-item text-center">جاري التحميل...</li>
                </ul>
            </div>
        </div>
    </div>
</div>



@endsection
@push('script')

<!-- Bootstrap 5 & Select2 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    // ------------------[ BASE URL ]------------------
    const BASE_URL = @json(
        config('app.env') === 'local' ? config('app.url_local') :
        (config('app.env') === 'dev' ? config('app.url_dev') : config('app.url'))
    );

    let rescheduleModalInstance;

$(document).ready(function () {
    const modalEl = document.getElementById('rescheduleModal');
    rescheduleModalInstance = new bootstrap.Modal(modalEl, {
        backdrop: 'static',  // optional, prevents closing on backdrop click
        keyboard: false      // optional, disables Esc key
    });
});


    // ------------------[ Toastr Options + Sounds ]------------------
    toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: "toast-top-right",
        timeOut: 5000
    };

    const successSound = new Audio('/audio/success.mp3');
    const errorSound = new Audio('/audio/error.mp3');
    const warningSound = new Audio('/audio/warning.mp3');

    successSound.volume = 0.5;
    errorSound.volume = 0.5;
    warningSound.volume = 0.5;

    // ------------------[ Globals ]------------------
    let orderId = null;
    let selectedDay = null;
    let selectedTime = null;
    let selectedShiftId = null;
    let regionId = null;
    let serviceId = null;
    let amount = null;
    let loadingData = false;
    let pageNumber = 0;

    // ------------------[ DataTable Init ]------------------
    $(document).ready(function () {
        
        const table = $('#html5-extension').DataTable({
            dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-4 d-flex justify-content-md-start justify-content-center'l><'col-sm-12 col-md-4 d-flex justify-content-center'B><'col-sm-12 col-md-4 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count mb-sm-0 mb-3'i><'dt--pagination'p>>",
            lengthMenu: [
                [10, 25, 50, 100, 200, 500, 1000, 2000, 5000, 10000, 20000],
                [10, 25, 50, 100, 200, 500, 1000, 2000, 5000, 10000, 20000]
            ],
            pageLength: 10,
            order: [[0, 'desc']],
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: '{{ route('dashboard.orders.index') }}',
                data: function (d) {
                    d.start = d.start;
                    d.length = d.length;
                }
            },
            pagingType: 'full_numbers',
            columns: [
                { data: 'id', name: 'id' },
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
            buttons: [
                { extend: 'copy', className: 'btn btn-sm', text: '{{ __("dash.copy") }}' },
                { extend: 'csv', className: 'btn btn-sm', text: '{{ __("dash.csv") }}' },
                { extend: 'excel', className: 'btn btn-sm', text: '{{ __("dash.excel") }}' },
                { extend: 'print', className: 'btn btn-sm', text: '{{ __("dash.print") }}' }
            ],
            language: {
                url: "{{ app()->getLocale() === 'ar' 
                    ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' 
                    : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
            }
        });

        $('.status_filter').select2();

        $('.status_filter, input[type="date"]').on('change', function () {
            updateTableData();
        });

        function updateTableData() {
            let url = '{{ route('dashboard.orders.index') }}';
            const status = $('.status_filter').val();
            const date = $('#date_from').val();
            const date2 = $('#date_to').val();

            const queryParams = [];
            if (status && status !== 'all') queryParams.push('status=' + status);
            if (date) queryParams.push('date=' + date);
            if (date2) queryParams.push('date2=' + date2);

            if (queryParams.length > 0) {
                url += '?' + queryParams.join('&');
            }

            table.ajax.url(url).load();
        }


    });

    // ------------------[ Fetch Order Info ]------------------
    async function fetchOrderInfo() {
        try {
            const res = await fetch(`${BASE_URL}/api/getOrderData/${orderId}`);
            const data = await res.json();

            if (data.status === 200) {
                const order = data.body.order;
                selectedDay = order.date;
                selectedTime = order.time;
                selectedShiftId = order.shift_id;
                regionId = data.body.regionId;
                serviceId = order.serviceId;
                amount = order.amount;
            } else {
                toastr.error(data.body?.message || 'تعذر تحميل بيانات الطلب.');
                errorSound.play();
            }
        } catch (error) {
            console.error(error);
            toastr.error("حدث خطأ أثناء تحميل بيانات الموعد.");
            errorSound.play();
        }
    }

    // ------------------[ Fetch Available Times ]------------------
    async function fetchAvailableTimes() {
        if (loadingData) return;
        loadingData = true;
        $('#loadingSpinner').removeClass('d-none');

        try {
            const params = new URLSearchParams({
                date: selectedDay || new Date().toISOString().split('T')[0],
                'services[0][id]': serviceId ?? '',
                'services[0][amount]': amount ?? 1,
                region_id: regionId ?? '',
                page_number: pageNumber,
                package_id: 0
            });

            const response = await fetch(`${BASE_URL}/api/get_avail_times_from_date?${params.toString()}`);
            const data = await response.json();

            if (data?.body?.times?.available_days) {
                populateTimeButtons(data.body.times.available_days);
                pageNumber++;
            }
        } catch (error) {
            console.error('Error fetching times:', error);
            toastr.error('فشل تحميل المواعيد المتاحة.');
            errorSound.play();
        } finally {
            $('#loadingSpinner').addClass('d-none');
            loadingData = false;
        }
    }

    // ------------------[ Populate Time Buttons ]------------------
    function populateTimeButtons(days) {
        const container = $("#timeButtonsContainer").empty();

        days.forEach(day => {
            container.append(`<h6 class="fw-bold m-3">${day.dayName} (${day.day})</h6>`);

            if (day.times.length === 0) {
                container.append('<p class="text-danger text-center fw-bold">لا يوجد مواعيد</p>');
            } else {
                day.times.forEach(t => {
                    const btn = `<button class="btn btn-outline-primary btn-lg m-1"
                        data-day="${day.day}" data-time="${t.time}" data-shift-id="${t.shift_id}">
                        ${t.time}
                    </button>`;
                    container.append(btn);
                });
            }
        });

        $("#timeButtonsContainer button").click(function () {
            $("#timeButtonsContainer button").removeClass('btn-primary').addClass('btn-outline-primary');
            $(this).removeClass('btn-outline-primary').addClass('btn-primary');
            selectedDay = $(this).data('day');
            selectedTime = $(this).data('time');
            selectedShiftId = $(this).data('shift-id');
        });
    }

    // ------------------[ Update Order Schedule ]------------------
 async function updateOrder() {
    if (!orderId || !selectedDay || !selectedTime || !selectedShiftId) {
        toastr.warning("يرجى اختيار موعد صحيح!");
        warningSound.play();
        return false;
    }

    try {
        const res = await fetch(`${BASE_URL}/api/changeOrderSchedule`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                order_id: orderId,
                date: selectedDay,
                time: selectedTime,
                shift_id: selectedShiftId
            })
        });

        const result = await res.json();

        if (res.ok && result.status) {
            toastr.success('تم تحديث الموعد بنجاح!');
            successSound.play();
            return true;
        } else {
            toastr.error(result.message || 'فشل تحديث الموعد.');
            errorSound.play();
            return false;
        }

    } catch (error) {
        console.error(error);
        toastr.error("حدث خطأ أثناء تحديث الموعد.");
        errorSound.play();
        return false;
    }
}



    // ------------------[ Reschedule Modal Handlers ]------------------
    $(document).on('click', '.open-reschedule', async function () {
    orderId = $(this).data('id');
    selectedDay = selectedTime = selectedShiftId = null;

    await fetchOrderInfo();

    if ($('#chooseNewTime').is(':checked')) {
        $('#newTimeContainer').removeClass('d-none');
        pageNumber = 0;
        await fetchAvailableTimes();
    }

    rescheduleModalInstance.show(); // ✅ open it properly
});


    $('input[name="timeChoice"]').change(async function () {
    const choice = $(this).val();

        if (choice === 'new') {
            $('#newTimeContainer').removeClass('d-none');

            pageNumber = 0;
            loadingData = false;
            $('#timeButtonsContainer').empty();

            await fetchAvailableTimes();
        } else {
            $('#newTimeContainer').addClass('d-none');
            await fetchOrderInfo();
        }
    });


$('#confirmButton').click(async function () {
    const selectedChoice = $('input[name="timeChoice"]:checked').val();

    if (selectedChoice === 'new' && (!selectedDay || !selectedTime || !selectedShiftId)) {
        toastr.warning("يرجى اختيار وقت جديد.");
        warningSound.play();
        return;
    }

    const btn = $(this);
    const originalContent = btn.html();
    btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> جاري المعالجة...');

    // Call updateOrder() and capture result
    const isUpdated = await updateOrder();

    btn.prop('disabled', false).html(originalContent);

    // Close modal if update succeeded
    if (isUpdated && rescheduleModalInstance) {
    rescheduleModalInstance.hide();

    // Fix: Remove lingering backdrop manually
    setTimeout(() => {
        $('.modal-backdrop').remove();          // remove overlay
        $('body').removeClass('modal-open');    // restore body scroll
        $('body').css('padding-right', '');     // reset Bootstrap body padding if any
    }, 500); // delay to wait for animation to finish
}


});




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
            { data: 'id' }, 
            // { data: 'order' },
             { data: 'customer' },
            { data: 'customer_phone' }, 
            // { data: 'service' },
            { data: 'date' }, 
            { data: 'start_time' }, 
            { data: 'end_time' }, 
            { data: 'quantity' },
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
            debugger;
            $('#couponModal').modal('hide');
            toastr.success(response.message);
            $('#html5-extension').DataTable().ajax.reload();
        },
        error: function (xhr) {
            debugger;
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
    const isEdit = !!visit_id;
    const select = isEdit ? $('#edit_group_id') : $('#group_id');
    const modal = isEdit ? $('#changeGroupModel') : $('#addGroupModel');

    // Destroy existing select2 instance if already initialized
    if (select.hasClass("select2-hidden-accessible")) {
        select.select2('destroy');
    }

    // Clear and fill new options
    select.empty().append(`<option value="">{{ __('dash.choose') }}</option>`);

            if (Object.keys(data).length === 0) {
            //  Show message when no teams are available
            select.append(`<option disabled selected>{{ __('dash.no_team_available') }}</option>`);
            toastr.warning(`{{ __('dash.no_team_available_at_time') }}`);
        } else {
            $.each(data, (i, item) => {
                select.append(new Option(item, i));
            });
        }


    // Reinitialize select2 inside modal
    select.select2({
        dropdownParent: modal,
        width: '100%',
        placeholder: '{{ __("dash.choose") }}',
        allowClear: true
    });

    // Update hidden fields
    $('#booking_id').val(booking_id);
    if (isEdit) {
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

$('#rescheduleModal').on('hidden.bs.modal', function () {
    $('#timeButtonsContainer').empty();
    $('#newTimeContainer').addClass('d-none');
    $('input[name="timeChoice"][value="same"]').prop('checked', true);
    selectedDay = selectedTime = selectedShiftId = null;
});

$('#rescheduleModal').on('hidden.bs.modal', function () {
    $('.modal-backdrop').remove();
    $('body').removeClass('modal-open').css('padding-right', '');
});

// Modal open handler
$(document).on('click', '.show-logs-btn', function () {
    const bookingId = $(this).data('booking-id');
    const list = $('#log-list');

    list.html('<li class="list-group-item text-center text-muted">جاري التحميل...</li>');

    $.ajax({
        url: `/admin/bookings/${bookingId}/logs`,
        method: 'GET',
        success: function (res) {
            if (res.logs && res.logs.length > 0) {
                const grouped = { Visit: [], Booking: [], Order: [] };

                res.logs.forEach(log => {
                    if (log.model_type?.includes('Visit')) grouped.Visit.push(log);
                    else if (log.model_type?.includes('Booking')) grouped.Booking.push(log);
                    else if (log.model_type?.includes('Order')) grouped.Order.push(log);
                });

                let html = '';

                for (const [type, logs] of Object.entries(grouped)) {
                    if (logs.length === 0) continue;

                    const title = {
                        Visit: 'سجلات الزيارة',
                        Booking: 'سجلات الحجز',
                        Order: 'سجلات الطلب'
                    }[type];

                    const icon = {
                        Visit: 'fa-map-marker-alt',
                        Booking: 'fa-calendar-check',
                        Order: 'fa-shopping-cart'
                    }[type];

                    html += `
                        <details class="mb-3 border rounded shadow-sm p-2">
                            <summary class="text-primary fw-bold fs-6 mb-2">
                                <i class="fas ${icon} me-1"></i>${title} (${logs.length})
                            </summary>
                            <ul class="list-group mt-2">
                                ${logs.map(renderLogCard).join('')}
                            </ul>
                        </details>`;
                }

                list.html(html);
            } else {
                list.html('<li class="list-group-item text-center text-danger">لا يوجد سجلات.</li>');
            }
        },
        error: function () {
            list.html('<li class="list-group-item text-center text-danger">فشل في تحميل السجل.</li>');
        }
    });
});

function formatValue(value) {
    if (value === null || value === undefined) return '-';

    if (typeof value === 'object') {
        return value.name_ar || value.name_en || value.name || 
               Object.values(value).find(v => typeof v === 'string') || '-';
    }

    if (typeof value === 'number') return Number(value).toFixed(2);

    if (typeof value === 'string' && /^\d{2}:\d{2}(:\d{2})?$/.test(value)) {
        const date = new Date(`1970-01-01T${value}`);
        return date.toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
        });
    }

    return String(value);
}

function translateField(key) {
    const map = {
        start_time: 'وقت البداية',
        end_time: 'وقت النهاية',
        group_id: 'الفريق',
        discount: 'الخصم',
        total: 'الإجمالي',
        status: 'الحالة'
    };
    return map[key] || key;
}

function renderLogCard(log) {
    const createdAt = new Date(log.created_at).toLocaleString('en-US', {
        day: '2-digit',
        month: 'short',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        hour12: true
    });

    const user = log.user?.first_name || 'غير معروف';
    const description = log.description || '';

    const modelType = log.model_type || '';
    let modelLabel = 'حجز';
    if (modelType.includes('Visit')) modelLabel = 'زيارة';
    else if (modelType.includes('Order')) modelLabel = 'طلب';

    let changesHtml = '';
    if (log.changes) {
        try {
            const parsed = typeof log.changes === 'string' ? JSON.parse(log.changes) : log.changes;

            const lines = Object.entries(parsed).map(([key, value]) => {
                if (typeof value === 'object' && value !== null && 'from' in value && 'to' in value) {
                    const fromVal = formatValue(value.from);
                    const toVal = formatValue(value.to);

                    if (fromVal !== toVal) {
                        return `
                            <li>
                                <strong>${translateField(key)}</strong>: 
                                <span class="text-danger">من: ${fromVal}</span>
                                <i class="fas fa-arrow-right mx-1" style="transform: rotate(180deg); color:#aaa;"></i>
                                <span class="text-success">إلى: ${toVal}</span>
                            </li>`;
                    }
                }

                if (key === 'from' && parsed.to && typeof value === 'object' && typeof parsed.to === 'object') {
                    const fromVal = formatValue(value);
                    const toVal = formatValue(parsed.to);

                    if (fromVal !== toVal) {
                        return `
                            <li>
                                <strong>${translateField('status')}</strong>: 
                                <span class="text-danger">من: ${fromVal}</span>
                                <i class="fas fa-arrow-right mx-1" style="transform: rotate(180deg); color:#aaa;"></i>
                                <span class="text-success">إلى: ${toVal}</span>
                            </li>`;
                    }
                }
                return '';
            }).join('');

            changesHtml = `
                <details class="mt-2">
                    <summary class="text-muted small fw-bold">تفاصيل التغييرات</summary>
                    <ul class="mt-2 small text-muted ps-3 pe-2">${lines || '<li>لا تغييرات فعلية</li>'}</ul>
                </details>`;
        } catch (e) {
            changesHtml = `
                <details class="mt-2">
                    <summary class="text-muted small">بيانات التغيير</summary>
                    <pre class="bg-light p-2 rounded small text-danger">تعذر قراءة التغييرات</pre>
                </details>`;
        }
    }

    return `
        <li class="list-group-item border rounded mb-3 shadow-sm log-card">
            <div class="d-flex justify-content-between flex-wrap">
                <div>
                    <span class="badge bg-secondary me-1">${modelLabel}</span>
                    <p class="fw-bold mb-1 mt-2">${description}</p>
                    ${changesHtml}
                </div>
                <div class="text-end text-muted small mt-2" style="min-width: 160px;">
                    <div>بواسطة: ${user}</div>
                    <div>${createdAt}</div>
                </div>
            </div>
        </li>`;
}


    
</script>
@endpush