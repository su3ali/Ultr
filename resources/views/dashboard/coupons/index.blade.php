@extends('dashboard.layout.layout')
<style>
    .nav-pills .nav-link {
        border-radius: 0.5rem;
        transition: all 0.3s ease;
        color: #2B68A6;
        padding: 0.6rem 1.2rem;
        font-size: 15px;
    }

    .nav-pills .nav-link.active {
        background-color: #2B68A6 !important;
        color: white !important;
        box-shadow: 0 0.25rem 0.75rem rgba(43, 104, 166, 0.3);
    }

    .nav-pills .nav-link:hover {
        background-color: #e9f3ff;
        color: #2B68A6;
    }

    .nav-link i {
        margin-inline-end: 5px;
    }

    .form-check-inline {
        margin-right: 1rem;
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
                            <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">{{__('dash.home')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('dash.coupons')}}</li>
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


                <div class="d-flex justify-content-start mb-3">
                    <ul class="nav nav-pills" id="couponTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" id="client-tab" data-type="client" href="#" role="tab">
                                <i class="fas fa-user me-1"></i> {{ __('dash.clients_coupons') }}
                            </a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link fw-bold" id="employee-tab" data-type="employee" href="#" role="tab">
                                <i class="fas fa-user-tie me-1"></i> {{ __('dash.employees_coupons') }}
                            </a>
                        </li>
                    </ul>
                </div>



                <div id="employeeFilterSection" class="mb-4 d-none">
                    <label for="employee_filter" class="form-label fw-semibold">
                        {{ __('dash.filter_by_empyloyee') }}
                    </label>
                    <select id="employee_filter" class="form-control" style="max-width: 300px;">
                        <option value="">{{ __('dash.all') }}</option>
                        @foreach($employees as $id => $title_ar)
                        <option value="{{ $id }}">{{ $title_ar }}</option>
                        @endforeach
                    </select>
                </div>



                <div class="col-md-12 text-right mb-3">

                    <a href="{{route('dashboard.coupons.create')}}" id="" class="btn btn-primary card-tools">
                        {{__('dash.add_new')}}
                    </a>

                </div>
                <div class="table-responsive">
                    <table id="html5-extension" class="table table-hover non-hover">
                        <thead>
                            <tr>
                                <th>رقم الكوبون</th>
                                <th>العنوان</th>
                                <th>الكود</th>
                                <th>عدد الاستخدام</th>
                                <th>القيمة</th>
                                <th>الصوره</th>
                                <th>تاريخ التفعيل</th>
                                <th>تاريخ الانتهاء</th>
                                <th>حالة النشاط</th>
                                <th class="no-content">{{__('dash.actions')}}</th>

                            </tr>
                        </thead>
                    </table>
                </div>


            </div>
        </div>

    </div>

</div>
@endsection

@push('script')
<script type="text/javascript">
    let currentType = 'client';

    function loadCouponsTable(type = 'client') {
        $('#html5-extension').DataTable().destroy();

        const employeeId = $('#employee_filter').val();

        $('#html5-extension').DataTable({
            dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            order: [[0, 'desc']],
            language: {
                url: "{{ app()->getLocale() == 'ar' 
                    ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' 
                    : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
            },
            buttons: [
                { extend: 'copy', className: 'btn btn-sm', text: 'نسخ' },
                { extend: 'csv', className: 'btn btn-sm', text: 'تصدير إلى CSV' },
                { extend: 'excel', className: 'btn btn-sm', text: 'تصدير إلى Excel' },
                { extend: 'print', className: 'btn btn-sm', text: 'طباعة' }
            ],
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: {
                url: '{{ route('dashboard.coupons.index') }}',
                data: {
                    type: type,
                    employee_id: type === 'employee' ? employeeId : ''
                }
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'code', name: 'code' },
               { data: 'used_count', name: 'used_count' },
                { data: 'value', name: 'value' },
                { data: 'image', name: 'image' },
                { data: 'start', name: 'start' },
                { data: 'end', name: 'end' },
                { data: 'status', name: 'status' },

                
                { data: 'control', name: 'control', orderable: false, searchable: false }
            ]
        });
    }

    $(document).ready(function () {
        loadCouponsTable();

        // Tab switching
        $('#couponTabs a').on('click', function (e) {
            e.preventDefault();
            $('#couponTabs a').removeClass('active');
            $(this).addClass('active');

            currentType = $(this).data('type');
            $('#employeeFilterSection').toggleClass('d-none', currentType !== 'employee');
            loadCouponsTable(currentType);
        });

        // Employee filter (only triggers if employee tab is active)
        $('#employee_filter').on('change', function () {
            if (currentType === 'employee') {
                loadCouponsTable(currentType);
            }
        });

        // Toggle status switch
        $("body").on('change', '#customSwitchStatus', function () {
            let active = $(this).is(':checked');
            let id = $(this).data('id');

            $.ajax({
                url: '{{ route('dashboard.coupons.change_status') }}',
                type: 'get',
                data: { id: id, active: active },
                success: function (data) {
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


$(document).ready(function () {
    // Restore previous tab if exists
    const lastTab = localStorage.getItem('couponTab') || 'client';
    $(`#couponTabs a[data-type="${lastTab}"]`).click();

    $('#couponTabs a').on('click', function (e) {
        e.preventDefault();
        const type = $(this).data('type');
        localStorage.setItem('couponTab', type);

        $('#couponTabs a').removeClass('active');
        $(this).addClass('active');

        currentType = type;
        $('#employeeFilterSection').toggleClass('d-none', type !== 'employee');
        loadCouponsTable(type);
    });
});

</script>


@endpush