@extends('dashboard.layout.layout')

@push('style')
<style>
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
                                    @foreach ($statuses as $id => $status)
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
@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function() {
        
            var table = $('#{{ $dataTabel }}').DataTable({
                dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-4 d-flex justify-content-md-start justify-content-center'l><'col-sm-12 col-md-4 d-flex justify-content-center'B><'col-sm-12 col-md-4 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count mb-sm-0 mb-3'i><'dt--pagination'p>>",

                lengthMenu: [
                    [10, 25, 50, 100, 200, 500, 2000, 5000, 10000],
                    [10, 25, 50, 100, 200, 500, 2000, 5000, 10000]
                ],
                pageLength: 10, // Default rows per page
                order: [
                    [0, 'desc']
                ],
                "language": {
                    "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
                },
                buttons: {
                    buttons: [{
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
                    ]
                },
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: '{{ url('admin/bookings?type=' . $type) }}',
                columns: [
                
                  {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'order',
                        name: 'order'
                    },

                    {
                        data: 'customer',
                        name: 'customer'


                    },
                    {
                        data: 'customer_phone',
                        name: 'customer_phone'
                    },
                    {
                        data: 'service',
                        name: 'service'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'time',
                        name: 'time'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data:'zone',
                        name:'zone'
                    },
                    {
                        data: 'group',
                        name: 'group'
                    },
                    
                    {

                        data: 'total',
                        name: 'total'
                    },
                    {

                        data: 'status',
                        name: 'status'
                    },
                    {
                    data: 'payment_method',
                    name: 'payment_method',
                    render: function(data, type, row, meta) {
                        return data; // If 'data' contains HTML, it will render it properly in the table.
                    }
                },

                    {
                        data: 'notes',
                        name: 'notes'
                    },
                    {
                        data: 'control',
                        name: 'control',
                        orderable: false,
                        searchable: false
                    },

                ]
            });
    function updateTableData() {
        var status_filter = $('.status_filter').val();
        var zone_filter = $('.zone_filter').val();
        var date = $('.date').val();
        var date2 = $('.date2').val();
        
        // ابدأ بالرابط الأساسي
        var url = '{{ url('admin/bookings?type=' . $type) }}';

        // أضف الفلاتر حسب الحاجة
        if (status_filter && status_filter !== 'all') {
            url += '&status=' + status_filter;
        }

        if (zone_filter && zone_filter !== 'all') {
            url += '&zone=' + zone_filter;
        }

        if (date) {
            url += '&date=' + date;
        }

        if (date2) {
            url += '&date2=' + date2;
        }

        // تحميل البيانات بناءً على الفلاتر
        table.ajax.url(url).load();
    }

    // فعل التحديث عند تغيير الفلاتر
    $('.date, .date2, .status_filter, .zone_filter').change(function() {
        updateTableData();
    });


    // Trigger search update
    $('#searchInput').on('keyup', function() {
        table.draw();
    });



    });


    $(document).on('click', '#add-work-exp', function() {
        let booking_id = $(this).data('id');
        let service_id = $(this).data('service_id');
        let category_id = $(this).data('category_id');
        let visit_id = $(this).data('visit_id');
        let address_id = $(this).data('address_id');
        let type = $(this).data('type');
        let date = $(this).data('date');
        let time = $(this).data('time');
        let group_id = $(this).data('group_id');
        let quantity = $(this).data('quantity');


        $.ajax({
            url: '{{ route('dashboard.getGroupByService') }}',
            type: 'get',
            data: {
                service_id: service_id,
                type: type,
                booking_id: booking_id,
                category_id: category_id,
                address_id: address_id,

                date: date,
                time: time,
                group_id: group_id,
                quantity: quantity,



            },
            success: function(data) {
                console.log(data)

                var select = document.getElementById("edit_group_id");
                var length = select.options.length;
                for (i = length - 1; i >= 0; i--) {
                    select.options[i] = null;
                }
                if (data.length != 0) {
                    $.each(data, function(i, item) {

                        var newOption = new Option(item, i, true, true)
                        if (visit_id) {
                            $('#edit_group_id').append(newOption);
                        } else {
                            $('#group_id').append(newOption);

                        }

                    });
                }
                $('#booking_id').val(booking_id);
                if (visit_id) {
                    $('.visit_Div').append(`<input type="hidden" value="` + visit_id +
                        `" name="visit_id">`);
                    $('#edit_booking_id').val(booking_id);
                    var action = window.location.origin + '/admin/visits/' + visit_id;
                    $('#edit_group_form').attr('action', action);
                }

            }
        });
    });


    $("body").on('change', '#customSwitchStatus', function() {
        let active = $(this).is(':checked');
        let id = $(this).attr('data-id');

        $.ajax({
            url: '{{ route('dashboard.booking_statuses.change_status') }}',
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
                })
            }
        });
    });
</script>
@endpush