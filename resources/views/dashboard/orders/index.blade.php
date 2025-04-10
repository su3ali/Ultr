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

<style>
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
</style>

{{-- @include('dashboard.orders.create') --}}
@endsection

@section('content')
<div class="layout-px-spacing">


    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6" style="width: 100%">
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
                            {{-- <th>{{ __('dash.booking_number') }}</th> --}}
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
<!-- Modal for Rescheduling -->
<div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">المواعيد المتاحة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">يرجى اختيار أحد الخيارات:</p>

                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <!-- Keep the same time option -->
                    <label class="option-card">
                        <input type="radio" name="timeChoice" id="keepSameTime" value="same" checked>
                        <div class="option-content">
                            <i class="fas fa-clock"></i>
                            <p>الاحتفاظ بالموعد الأصلي</p>
                        </div>
                    </label>

                    <!-- Select a new time option -->
                    <label class="option-card">
                        <input type="radio" name="timeChoice" id="chooseNewTime" value="new">
                        <div class="option-content">
                            <i class="fas fa-calendar-alt"></i>
                            <p>اختيار وقت جديد</p>
                        </div>
                    </label>
                </div>

                <!-- Available Times Section (Initially Hidden) -->
                <div id="newTimeContainer" class="mt-3 d-none">
                    <p class="text-center">يرجى اختيار وقت جديد من الأوقات المتاحة:</p>
                    <div id="timeButtonsContainer">
                        <!-- Available time buttons will be dynamically added here -->
                    </div>
                    <div id="loadingSpinner" class="d-none text-center mt-3">
                        <i class="fa fa-spinner fa-spin"></i> تحميل البيانات...
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">رجوع</button>
                <button type="button" class="btn btn-primary" id="confirmButton">تأكيد</button>
            </div>
        </div>
    </div>
</div>

@push('script')
<script type="text/javascript">
    // ------------------[ BASE URL ]------------------
    const BASE_URL = @json(
        config('app.env') === 'local' ? config('app.url_local') :
        (config('app.env') === 'dev' ? config('app.url_dev') : config('app.url'))
    );

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

        $('#rescheduleModal').on('hidden.bs.modal', function () {
    $('#timeButtonsContainer').empty();
    $('#newTimeContainer').addClass('d-none');
    $('input[name="timeChoice"][value="same"]').prop('checked', true);
});

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
            return;
        }

        try {
            const res = await fetch(`${BASE_URL}/api/changeOrderSchedule`, {
                method: 'POST',
                headers: { 
                    
                    'Content-Type': 'application/json' ,
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
            debugger;

            if (res.ok && result.status) {
                toastr.success('تم تحديث الموعد بنجاح!');
                successSound.play();
            } else {
                toastr.error(result.message || 'فشل تحديث الموعد.');
                errorSound.play();
            }

        } catch (error) {
            console.error(error);
            toastr.error("حدث خطأ أثناء تحديث الموعد.");
            errorSound.play();
        }
    }

    // ------------------[ Reschedule Modal Handlers ]------------------
    $(document).on('click', '.open-reschedule', async function () {
        orderId = $(this).data('id');
        selectedDay = selectedTime = selectedShiftId = null;
        await fetchOrderInfo();
        // If "new time" option is selected, fetch times immediately
    if ($('#chooseNewTime').is(':checked')) {
        $('#newTimeContainer').removeClass('d-none');
        pageNumber = 0;
        await fetchAvailableTimes();
    }
    });

    $('input[name="timeChoice"]').change(async function () {
        const choice = $(this).val();

        if (choice === 'new') {
            $('#newTimeContainer').removeClass('d-none');
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

    // Disable button and show spinner
    const btn = $(this);
    const originalContent = btn.html();
    btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> جاري المعالجة...');

    await updateOrder();

    // Re-enable button and reset text
    btn.prop('disabled', false).html(originalContent);

    $('#rescheduleModal').modal('hide');
});

</script>
@endpush