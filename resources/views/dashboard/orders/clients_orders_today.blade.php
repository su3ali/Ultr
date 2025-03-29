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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('dash.client_orders_today') }}
                            </li>
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>


    </header>
</div>



<!-- Modal for Rescheduling -->
<div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">يرجى اختيار أحد الخيارات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="d-flex justify-content-center gap-3 flex-wrap">

                    <input type="hidden" id="orderId" name="order_id">
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


{{-- @include('dashboard.orders.create') --}}
@endsection
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
    }

    .option-card:hover {
        border-color: #999999;
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
    }

    /* Hide the actual radio button */
    .option-card input {
        display: none;
    }

    /* Style when selected */
    .option-card input:checked+.option-content {
        border-color: #fff;
        background-color: #999999;
        color: #fff;

        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.5);
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
@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="col-md-12  mb-3">


                    <div class="row">



                        <div class="col-md-1">
                            <label for="inputEmail4">الحالة</label>
                        </div>
                        <div class="col-md-4">
                            <select class="select2 status_filter form-control" name="status_filter">
                                <option value="all" selected>الكل</option>
                                @foreach ($statuses as $id => $status)
                                <option value="{{ $id }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                </div>

                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>رقم الطلب</th>
                            <th>رقم الحجز</th>
                            <th>{{ __('dash.customer_name') }}</th>
                            <th>{{ __('dash.phone') }}</th>
                            <th>{{ __('dash.service') }}</th>
                            <th>{{ __('dash.quantity') }}</th>
                            <th>{{ __('dash.price_value') }}</th>
                            <th>{{ __('dash.payment_method') }}</th>
                            <th>{{ __('dash.zone') }}</th>
                            <th>{{ __('dash.status') }}</th>
                            <th>تاريخ الطلب</th>
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
    const apiUrl = 'http://127.0.0.1:8000/api/get_avail_times_from_date';  // Your actual API URL

    let pageNumber = 0; // Start with the first page of data
    let loadingData = false; // To prevent multiple requests

    // Initialize the variables
    let selectedDay = null;
    let selectedTime = null;
    let selectedShiftId = null;

  
    $(document).on('click', '.btn[data-toggle="modal"]', function () {
    var orderId = $(this).data('id');  // Get the order ID from the clicked button
    $('#orderId').val(orderId);        // Set the value of the hidden input field inside the modal
    console.log('Order ID:', orderId); // Log the order ID for debugging purposes
});




    // Fetch available times function
    async function fetchAvailableTimes() {
        if (loadingData) return;
        loadingData = true;

        document.getElementById("loadingSpinner").classList.remove('d-none');

        const currentDate = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format

        const params = new URLSearchParams({
            date: currentDate,  // Dynamically set today's date
            'services[0][id]': 22,
            'services[0][amount]': 1,
            region_id: 6,
            page_number: pageNumber,
            package_id: 0
        });

        try {
            const response = await fetch(`${apiUrl}?${params.toString()}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                }
            });

            if (!response.ok) {
                throw new Error('Error fetching available times');
            }

            const data = await response.json();
            populateTimeButtons(data.body.times.available_days);
            pageNumber++; 

        } catch (error) {
            console.error('Error fetching available times:', error);
        } finally {
            loadingData = false;
            document.getElementById("loadingSpinner").classList.add('d-none'); 
        }
    }

    // Function to populate time buttons with collapsible day groups
    function populateTimeButtons(availableDays) {
        let container = document.getElementById("timeButtonsContainer");
        container.innerHTML = ''; 

        availableDays.forEach(day => {
            let dayHeader = document.createElement('h6');
            dayHeader.classList.add('fw-bold', 'm-3');
            dayHeader.textContent = `${day.dayName} (${day.day})`;

            let dayContent = document.createElement('div');
            dayContent.classList.add('day-content', 'mb-2', 'p-2');

            if (day.times.length === 0) {
                let noTimesMsg = document.createElement('p');
                noTimesMsg.classList.add('text-danger', 'fw-bold', 'text-center', 'p-2');
                noTimesMsg.textContent = 'لا يوجد مواعيد متاحة في هذا اليوم';
                dayContent.appendChild(noTimesMsg);
            } else {
                day.times.forEach(timeObj => {
                    let timeButton = document.createElement('button');
                    timeButton.classList.add('btn', 'btn-outline-primary', 'btn-lg', 'm-1');
                    timeButton.textContent = timeObj.time;
                    timeButton.setAttribute('data-day', day.day);
                    timeButton.setAttribute('data-time', timeObj.time);
                    timeButton.setAttribute('data-shift-id', timeObj.shift_id);

                    // Add click event to select the time
                    timeButton.onclick = function() {
                        selectTime(day.day, timeObj.time, timeObj.shift_id);
                    };

                    dayContent.appendChild(timeButton);
                });
            }

            container.appendChild(dayHeader);
            container.appendChild(dayContent);
        });

        let showMoreButton = document.createElement('button');
        showMoreButton.classList.add('btn', 'btn-primary', 'btn-sm', 'm-1');
        showMoreButton.textContent = 'عرض المزيد';
        showMoreButton.onclick = function() {
            fetchAvailableTimes(); 
            showMoreButton.style.display = 'none';
        };
        container.appendChild(showMoreButton);
    }

    // Function to handle time selection
    function selectTime(day, time, shiftId) {
        selectedDay = day;
        selectedTime = time;
        selectedShiftId = shiftId;

        // Display selected time in the console (for debugging)
        console.log(`Selected Time: ${time} on ${day}`);
    }

    // Update Order function to pass date, time, and order ID
    async function updateOrder() {
        let orderId = $('#orderId').val(); // Get the order ID from the hidden input field

        if (!orderId) {
            alert("Order ID is missing!");
            return;
        }
        if (!selectedDay || !selectedTime || !selectedShiftId) {
            alert("Please select a valid time");
            return;
        }

        const params = {
            order_id: orderId,  // Use the dynamic order ID
            date: selectedDay,  // Selected day
            time: selectedTime,  // Selected time
            shift_id: selectedShiftId  // Selected shift ID
        };

        try {
            const response = await fetch('/api/changeOrderSchedule', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(params)
            });

            if (!response.ok) {
                throw new Error('Error updating order');
            }

            const data = await response.json();
            debugger;
            alert('Order updated successfully!');
            console.log(data); // Display response if needed

        } catch (error) {
            console.error('Error updating order:', error);
            alert('There was an error updating the order');
        }
    }

    // Add event listener to submit button
    document.getElementById("confirmButton").addEventListener("click", updateOrder);

    // Initialize modal with available times when page is loaded
    document.addEventListener("DOMContentLoaded", fetchAvailableTimes);

    // Handle timeChoice change (new time or same time)
    $(document).ready(function () {
        $('input[name="timeChoice"]').change(function () {
            if ($(this).val() === 'new') {
                $('#newTimeContainer').removeClass('d-none'); // Show available times
                fetchAvailableTimes(); // Fetch available times dynamically
            } else {
                $('#newTimeContainer').addClass('d-none'); // Hide available times
            }
        });

        // Confirm button action
        $('#confirmButton').click(function () {
            let selectedChoice = $('input[name="timeChoice"]:checked').val();

            if (selectedChoice === 'new' && (!selectedDay || !selectedTime || !selectedShiftId)) {
                alert("يرجى اختيار وقت جديد!");
                return;
            }

            alert(selectedChoice === 'same' 
                ? "تم الاحتفاظ بالموعد الأصلي!" 
                : `تم تغيير الموعد إلى: ${selectedTime}`
            );

            $('#rescheduleModal').modal('hide'); // Close modal
        });
    });

    // DataTable Setup
    $(document).ready(function() {
        var table = $('#html5-extension').DataTable({
            dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            order: [
                [0, 'desc']
            ],
            "language": {
                "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
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
            ajax: '{{ route('dashboard.order.ordersToday') }}',
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
            ]
        });

        function updateTableData() {
            var status_filter = $('.status_filter').val();
            var url = '{{ route('dashboard.order.ordersToday') }}';

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

    // Technician Status Change
    $("body").on('change', '#customSwitchtech', function() {
        let active = $(this).is(':checked');
        let id = $(this).attr('data-id');

        $.ajax({
            url: '{{ route('dashboard.core.technician.change_status') }}',
            type: 'get',
            data: { id: id, active: active },
            success: function(data) {
                swal({
                    title: "{{ __('dash.successful_operation') }}",
                    text: "{{ __('dash.request_executed_successfully') }}",
                    type: 'success',
                    padding: '2em'
                })
            }
        });
    });
</script>
@endpush