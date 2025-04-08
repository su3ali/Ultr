@extends('dashboard.layout.layout')

@section('sub-header')
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
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
                            <li class="breadcrumb-item active" aria-current="page">تقرير المبيعات</li>
                        </ol>
                    </nav>
                </div>
            </li>
        </ul>
    </header>
</div>
@endsection
@push('styles')
<style>
    select.select2,
    input[type="datetime-local"] {
        border-radius: 0.5rem;
        height: 42px;
    }

    select.select2:focus,
    input[type="datetime-local"]:focus {
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }
</style>
@endpush


@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <div class="col-12">
            <div class="widget-content widget-content-area br-6">

                {{-- Filters --}}
                <div class="col-12 mb-4">

                    <h5 class="fw-bold text-primary mb-3">
                        <i class="fas fa-sliders-h me-2"></i> {{ __('dash.filters') }}
                    </h5>

                    <div class="p-4 rounded shadow-sm border bg-white">

                        <div class="row g-3 align-items-end">

                            {{-- From Date --}}
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                <label class="form-label text-dark fw-semibold">{{ __('من') }}</label>
                                <input type="datetime-local" name="date" class="form-control date shadow-sm" step="1">
                            </div>

                            {{-- To Date --}}
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                <label class="form-label text-dark fw-semibold">{{ __('إلى') }}</label>
                                <input type="datetime-local" name="date2" class="form-control date2 shadow-sm" step="1">
                            </div>

                            {{-- Payment Method --}}
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                <label class="form-label text-dark fw-semibold">{{ __('طريقة الدفع') }}</label>
                                <select class="select2 payment_method form-control shadow-sm" name="payment_method">
                                    <option value="all" selected>{{ __('dash.all') }}</option>
                                    <option value="cache">{!! __('api.payment_method_cach') !!}</option>
                                    <option value="wallet">{!! __('api.payment_method_wallet') !!}</option>
                                    <option value="visa">{!! __('api.payment_method_visa') !!}</option>
                                    <option value="mada">{!! __('api.payment_method_network') !!}</option>
                                </select>
                            </div>

                            {{-- Service --}}
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                <label class="form-label text-dark fw-semibold">{{ __('dash.service') }}</label>
                                <select class="select2 service_filter form-control shadow-sm" name="service_filter">
                                    <option value="all" selected>{{ __('dash.all') }}</option>
                                    @foreach ($services as $id => $title)
                                    <option value="{{ $id }}">{{ $title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Technician --}}
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                                <label class="form-label text-dark fw-semibold">{{ __('الفني') }}</label>
                                <select class="select2 tech_filter form-control shadow-sm" name="tech_filter">
                                    <option value="all" selected>{{ __('dash.all') }}</option>
                                    @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">
                                        {{ app()->getLocale() === 'ar' ? $group->name_ar : $group->name_en }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Custom Export Buttons --}}
                <div class="d-flex justify-content-center mb-4">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#" id="exportExcel"
                            class="btn btn-outline-success shadow-sm d-inline-flex align-items-center rounded"
                            title="تصدير البيانات كـ Excel">
                            <i class="fas fa-file-excel fs-5" style="margin-inline-end: 3px;"></i>
                            <span class="fw-bold">تصدير</span>
                        </a>


                        <a href="#" id="printReport"
                            class="btn btn-outline-primary shadow-sm d-inline-flex align-items-center rounded"
                            title="طباعة التقرير">
                            <i class="fas fa-print fs-5" style="margin-inline-end: 3px;"></i>
                            <span class="fw-bold">طباعة</span>
                        </a>

                    </div>
                </div>




                {{-- DataTable --}}
                <div class="table-responsive">
                    <table id="html5-extension" class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>رقم الطلب</th>
                                <th>رقم الحجز</th>
                                <th>اسم الفني</th>
                                <th>اسم العميل</th>
                                <th>الخدمة</th>
                                <th>عدد الخدمات</th>
                                <th>المبلغ</th>
                                <th>طريقة الدفع</th>
                                <th>المنطقة</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                {{-- Summary --}}
                <table class="table table-bordered mt-4 bg-white">
                    <tbody>
                        <tr>
                            <th width="50%" class="bg-light">إجمالي المبيعات بدون ضريبة</th>
                            <td id="total">0</td>
                        </tr>
                        <tr>
                            <th class="bg-light">إجمالي الضريبة %15</th>
                            <td id="tax">0</td>
                        </tr>
                        <tr>
                            <th class="bg-light">إجمالي المبيعات</th>
                            <td id="tax_total">0</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    const formatDateTimeForInput = (date) => {
        const pad = (num) => String(num).padStart(2, '0');
        return `${date.getFullYear()}-${pad(date.getMonth() + 1)}-${pad(date.getDate())}T${pad(date.getHours())}:${pad(date.getMinutes())}:${pad(date.getSeconds())}`;
    };

    const getDefaultKsaDates = () => {
        const nowKSA = new Date().toLocaleString("en-US", { timeZone: "Asia/Riyadh" });
        const today = new Date(nowKSA);

        const startOfDay = new Date(today);
        startOfDay.setHours(0, 0, 0, 0);

        const endOfDay = new Date(today);
        endOfDay.setHours(23, 59, 59, 999);

        return {
            start: formatDateTimeForInput(startOfDay),
            end: formatDateTimeForInput(endOfDay)
        };
    };

    const setDefaultDateTimeInputs = () => {
        const dateInput = document.querySelector('input[name="date"]');
        const date2Input = document.querySelector('input[name="date2"]');

        if (!dateInput.value || !date2Input.value) {
            const { start, end } = getDefaultKsaDates();
            dateInput.value = start;
            date2Input.value = end;
        }
    };

    const updateSummary = () => {
        $.ajax({
            url: '{{ route('dashboard.report.updateSummary') }}',
            type: 'GET',
            data: {
                date: $('.date').val(),
                date2: $('.date2').val(),
                payment_method: $('.payment_method').val(),
                service: $('.service_filter').val(),
                tech_filter: $('.tech_filter').val(),
            },
            success: function (data) {
                $('#total').text(data.total.toFixed(2));
                $('#tax').text(data.tax.toFixed(2));
                $('#tax_total').text(data.taxTotal.toFixed(2));
            }
        });
    };

    const updateTableData = (table) => {
        const params = new URLSearchParams();

        let date = $('.date').val();
        let date2 = $('.date2').val();

        if (!date || !date2) {
            const { start, end } = getDefaultKsaDates();
            date = start;
            date2 = end;
            $('.date').val(start);
            $('.date2').val(end);
        }

        params.append('date', date);
        params.append('date2', date2);

        const payment_method = $('.payment_method').val();
        const service_filter = $('.service_filter').val();
        const tech_filter = $('.tech_filter').val();

        if (payment_method && payment_method !== 'all') params.append('payment_method', payment_method);
        if (service_filter && service_filter !== 'all') params.append('service', service_filter);
        if (tech_filter && tech_filter !== 'all') params.append('tech_filter', tech_filter);

        const url = '{{ route('dashboard.report.sales') }}' + '?' + params.toString();
        table.ajax.url(url).load();
        updateSummary();
    };

    $(document).ready(function () {
        const table = $('#html5-extension').DataTable({
            dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-4 d-flex justify-content-md-start justify-content-center'l><'col-sm-12 col-md-4 d-flex justify-content-center'><'col-sm-12 col-md-4 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count mb-sm-0 mb-3'i><'dt--pagination'p>>",
            lengthMenu: [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "الكل"]],
            pageLength: 10,
            order: [[0, 'desc']],
            processing: true,
            serverSide: true,
            responsive: true,
            language: {
                url: "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
            },
            ajax: {
                url: '{{ route('dashboard.report.sales') }}',
                data: function (d) {
                    d.start = d.start;
                    d.length = d.length;
                }
            },
            pagingType: 'full_numbers',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'booking_id', name: 'booking_id' },
                { data: 'tech_name', name: 'tech_name' },
                { data: 'user_name', name: 'user_name' },
                { data: 'service', name: 'service' },
                { data: 'service_number', name: 'service_number' },
                { data: 'price', name: 'price' },
                { data: 'payment_method', name: 'payment_method' },
                { data: 'region', name: 'region' },
                { data: 'created_at', name: 'created_at' },
            ]
        });

        // Set default date inputs and load table with today's data
        setDefaultDateTimeInputs();
        updateTableData(table);

        // Trigger filter changes
        $('.date, .date2, .payment_method, .service_filter, .tech_filter')
            .on('change', () => updateTableData(table));

        // Export Excel
        $('#exportExcel').click(function () {
            const params = new URLSearchParams({
                date: $('.date').val(),
                date2: $('.date2').val(),
                payment_method: $('.payment_method').val(),
                service: $('.service_filter').val(),
                tech_filter: $('.tech_filter').val(),
            }).toString();
            window.location.href = '{{ route("dashboard.report.sales.export.excel") }}' + '?' + params;
        });

        // Print
        $('#printReport').click(function () {
            const params = new URLSearchParams({
                date: $('.date').val(),
                date2: $('.date2').val(),
                payment_method: $('.payment_method').val(),
                service: $('.service_filter').val(),
                tech_filter: $('.tech_filter').val(),
            }).toString();
            window.open('{{ route("dashboard.report.sales.export.print") }}' + '?' + params, '_blank');
        });
    });
</script>
@endpush