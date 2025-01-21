@extends('dashboard.layout.layout')

@section('sub-header')
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">

        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg></a>

        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">

                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 py-2">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">{{ __('dash.dashboard')
                                    }}</a></li>
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

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row widget-statistic">

                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                    <a href="{{ route('dashboard.core.customer.index') }}" class="widget-link">
                        <div class="widget widget-one_hybrid widget-followers">
                            <div class="widget-heading p-4 rounded-lg bg-white shadow-sm">
                                <div class="d-flex align-items-center">
                                    <!-- Icon Container -->
                                    <div class="w-icon bg-primary text-white rounded-circle p-3 shadow-sm me-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-users">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                    </div>

                                    <!-- Title and Value -->
                                    <div>
                                        <p class="w-value fs-2 fw-bold text-dark mb-1">{{ $customers }}</p>
                                        <h5 class="text-muted mb-0"> {{ __('dash.customers') }}</h5>
                                    </div>
                                </div>
                            </div>

                            <!-- Hover Effect Container -->
                            <div class="widget-footer p-4 text-center">
                                <p class="text-muted mb-0"> {{ __('dash.customers_Management') }}</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                    <a href="{{ route('dashboard.orders.index') }}" class="widget-link">
                        <div class="widget widget-one_hybrid widget-referral">
                            <div class="widget-heading p-4 rounded-lg bg-white shadow-sm">
                                <div class="d-flex align-items-center">
                                    <!-- Icon Container -->
                                    <div class="w-icon bg-info text-white rounded-circle p-3 shadow-sm me-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-shopping-cart">
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                            </path>
                                        </svg>
                                    </div>

                                    <!-- Title and Value -->
                                    <div>
                                        <p class="w-value fs-2 fw-bold text-dark mb-1">{{ $client_orders }}</p>
                                        <h5 class="text-muted mb-0">{{ __('dash.client_orders') }}</h5>
                                    </div>
                                </div>
                            </div>

                            <!-- Hover Effect Container -->
                            <div class="widget-footer p-4 text-center">
                                <p class="text-muted mb-0"> {{ __('dash.manage_orders') }}</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                    <a href="{{ route('dashboard.core.technician.index') }}" class="widget-link">
                        <div class="widget widget-one_hybrid widget-engagement">
                            <div class="widget-heading p-4 rounded-lg bg-white shadow-sm">
                                <div class="d-flex align-items-center">
                                    <!-- Icon Container -->
                                    <div class="w-icon bg-warning text-white rounded-circle p-3 shadow-sm me-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>

                                    <!-- Title and Value -->
                                    <div>
                                        <p class="w-value fs-2 fw-bold text-dark mb-1">{{ $technicians }}</p>
                                        <h5 class="text-muted mb-0">{{ __('dash.technicians') }}</h5>
                                    </div>
                                </div>
                            </div>

                            <!-- Hover Effect Container -->
                            <div class="widget-footer p-4 text-center">
                                <p class="text-muted mb-0"> {{ __('dash.technicians_manage') }}</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                    <a href="{{ route('dashboard.visits.index') }}" class="widget-link">
                        <div class="widget widget-one_hybrid widget-engagement">
                            <div class="widget-heading p-4 rounded-lg bg-white shadow-sm">
                                <div class="d-flex align-items-center">
                                    <!-- Icon Container -->
                                    <div class="w-icon bg-primary text-white rounded-circle p-3 shadow-sm me-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-book">
                                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z">
                                            </path>
                                        </svg>
                                    </div>

                                    <!-- Title and Value -->
                                    <div>
                                        <p class="w-value fs-2 fw-bold text-dark mb-1">{{ $tech_visits }}</p>
                                        <h5 class="text-muted mb-0">{{ __('dash.tech_orders') }}</h5>
                                    </div>
                                </div>
                            </div>

                            <!-- Hover Effect Container -->
                            <div class="widget-footer p-4 text-center">
                                <p class="text-muted mb-0"> {{ __('dash.manage_tech_orders') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>



        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row widget-statistic">

                <!-- Canceled Orders Widget -->
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                    <a href="{{ route('dashboard.order.canceledOrders') }}" class="widget-link">
                        <div class="widget widget-one_hybrid widget-engagement">
                            <div class="widget-heading p-4 rounded-lg bg-lightblue shadow-sm">
                                <div class="d-flex align-items-center">
                                    <div class="w-icon bg-danger text-white rounded-circle p-3 shadow-sm me-4">
                                        <!-- X Circle Icon for Canceled Orders -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-x-circle">
                                            <path d="M12 19c3.9 0 7-3.1 7-7s-3.1-7-7-7-7 3.1-7 7 3.1 7 7 7z"></path>
                                            <path d="M15 9l-6 6"></path>
                                            <path d="M9 9l6 6"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="w-value fs-2 fw-bold text-dark mb-1">{{ $canceled_orders }}</p>
                                        <h5 class="text-muted mb-0">{{ __('dash.canceled_orders') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-footer p-4 text-center bg-lightblue">
                                <p class="text-muted mb-0"> {{ __('dash.Manage_cancelled_orders') }}</p>
                            </div>
                        </div>
                    </a>
                </div>


                <!-- Canceled Orders Today Widget -->
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                    <a href="{{ route('dashboard.order.canceledOrdersToday') }}" class="widget-link">
                        <div class="widget widget-one_hybrid widget-engagement">
                            <div class="widget-heading p-4 rounded-lg bg-lightgreen shadow-sm">
                                <div class="d-flex align-items-center">
                                    <div class="w-icon bg-warning text-white rounded-circle p-3 shadow-sm me-4">
                                        <!-- Warning or X Circle Icon for Canceled Orders Today -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-alert-triangle">
                                            <path
                                                d="M10.29 3.29l-6 6c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0L12 4.83l5.29 5.29c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41l-6-6c-.39-.39-1.02-.39-1.41 0z">
                                            </path>
                                            <path d="M12 20c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="w-value fs-2 fw-bold text-dark mb-1">{{ $canceled_orders_today }}
                                        </p>
                                        <h5 class="text-muted mb-0">{{ __('dash.canceled_orders_today') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-footer p-4 text-center bg-lightgreen">
                                <p class="text-muted mb-0"> {{ __('dash.canceled_orders_today') }}</p>
                            </div>
                        </div>
                    </a>
                </div>


                <!-- Orders Today Widget -->
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                    <a href="{{ route('dashboard.order.ordersToday') }}" class="widget-link">
                        <div class="widget widget-one_hybrid widget-referral">
                            <div class="widget-heading p-4 rounded-lg bg-lightyellow shadow-sm">
                                <div class="d-flex align-items-center">
                                    <div class="w-icon bg-success text-white rounded-circle p-3 shadow-sm me-4">
                                        <i class="fas fa-check-circle" style="font-size: 24px;"></i>
                                    </div>
                                    <div>
                                        <p class="w-value fs-2 fw-bold text-dark mb-1">{{ $client_orders_today }}</p>
                                        <h5 class="text-muted mb-0">{{ __('dash.client_orders_today') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-footer p-4 text-center bg-lightyellow">
                                <p class="text-muted mb-0">{{ __('dash.Manage_customer_orders_today') }}</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Visits Today Widget -->
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                    <a href="{{ route('dashboard.visits.visitsToday') }}" class="widget-link">
                        <div class="widget widget-one_hybrid widget-engagement">
                            <div class="widget-heading p-4 rounded-lg bg-lightblue shadow-sm">
                                <div class="d-flex align-items-center">
                                    <div class="w-icon bg-info text-white rounded-circle p-3 shadow-sm me-4">
                                        <!-- Clipboard Check Icon for Today's Orders -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-clipboard-check">
                                            <path d="M9 2H15V6H9z"></path>
                                            <path d="M9 10H15V14H9z"></path>
                                            <path d="M9 18H15V22H9z"></path>
                                            <path d="M18 2L22 6"></path>
                                            <path d="M18 6L22 2"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="w-value fs-2 fw-bold text-dark mb-1">{{ $tech_visits_today }}</p>
                                        <h5 class="text-muted mb-0">{{ __('dash.tech_orders_today') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-footer p-4 text-center bg-lightblue">
                                <p class="text-muted mb-0"> {{ __('dash.Manage_orders_today') }} </p>
                            </div>
                        </div>
                    </a>
                </div>


                <!-- Finished Visits Today Widget -->
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                    <a href="{{ route('dashboard.visits.finishedVisitsToday') }}" class="widget-link">
                        <div class="widget widget-one_hybrid widget-engagement">
                            <div class="widget-heading p-4 rounded-lg bg-lightpink shadow-sm">
                                <div class="d-flex align-items-center">
                                    <div class="w-icon bg-success text-white rounded-circle p-3 shadow-sm me-4">
                                        <!-- Check Circle Icon for Completed Orders -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-check-circle">
                                            <path d="M9 11l3 3L22 4"></path>
                                            <circle cx="12" cy="12" r="10"></circle>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="w-value fs-2 fw-bold text-dark mb-1">{{ $finished_visits_today }}
                                        </p>
                                        <h5 class="text-muted mb-0">{{ __('dash.finished_orders_today') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-footer p-4 text-center bg-lightpink">
                                <p class="text-muted mb-0"> {{
                                    __('dash.Manage_completed_orders_today') }}</p>
                            </div>
                        </div>
                    </a>
                </div>

                @if (auth()->user()->hasRole('admin') || auth()->user()->can('view_trainees'))
                <!-- Training Management Widget -->
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                    <a href="{{ route('dashboard.core.trainee.index') }}" class="widget-link">
                        <div class="widget widget-one_hybrid widget-engagement">
                            <div class="widget-heading p-4 rounded-lg bg-lightblue shadow-sm">
                                <div class="d-flex align-items-center">
                                    <div class="w-icon bg-primary text-white rounded-circle p-3 shadow-sm me-4">
                                        <!-- Number of Trainees Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-users">
                                            <path d="M17 21v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 00-3-3.87"></path>
                                            <circle cx="19" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="w-value fs-2 fw-bold text-dark mb-1">
                                            {{ $total_trainees }}
                                        </p>
                                        <h5 class="text-muted mb-0">{{ __('dash.number_of_trainees') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-footer p-4 text-center bg-lightblue">
                                <p class="text-muted mb-0"> {{ __('dash.training_management') }} </p>
                            </div>
                        </div>
                    </a>
                </div>
                @endif


                @if (auth()->user()->hasRole('admin') || auth()->user()->can('view_clients_with_orders'))
                <!-- Clients Have Orders Widget -->
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                    <a href="{{ route('dashboard.core.customer.orders') }}" class="widget-link">
                        <div class="widget widget-one_hybrid widget-engagement">
                            <div class="widget-heading p-4 rounded-lg bg-lightblue shadow-sm">
                                <div class="d-flex align-items-center">
                                    <div class="w-icon bg-primary text-white rounded-circle p-3 shadow-sm me-4">
                                        <!-- Clients Have Orders Icon (Package) -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-package">
                                            <path d="M12 2v5M3 7l9 5 9-5M3 17l9 5 9-5V7M12 2l9 5-9 5-9-5z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="w-value fs-2 fw-bold text-dark mb-1">
                                            {{ $customersHaveOrders }}
                                        </p>
                                        <h5 class="text-muted mb-0">{{ __('dash.clients_have_orders') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-footer p-4 text-center bg-lightblue">
                                <p class="text-muted mb-0"> {{ __('dash.clients_have_orders_management') }} </p>
                            </div>
                        </div>
                    </a>
                </div>
                @endif









            </div>
        </div>



        <div class="col-xl-6 col-lg-12 col-sm-12  layout-spacing">

            <div class="widget-content widget-content-area br-6">
                <div class="col-md-12 text-left mb-3">


                    <h5 class="">{{ __('dash.bookings_today') }}</h5>


                </div>
                <table id="html5-extension-bookings" class="table table-hover non-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> {{ __('dash.booking_number') }}</th>
                            <th> {{ __('dash.customer_name') }}</th>
                            <th> {{ __('dash.phone') }}</th>
                            <th> {{ __('dash.service') }}</th>
                            <th> {{ __('dash.date') }}</th>
                            <th> {{ __('dash.time') }}</th>
                            <th> {{ __('dash.status') }}</th>
                        </tr>
                    </thead>
                </table>


            </div>

        </div>

        <div class="col-xl-6 col-lg-12 col-sm-12  layout-spacing">

            <div class="widget-content widget-content-area br-6">
                <div class="col-md-12 text-left mb-3">


                    <h5 class="">{{ __('dash.client_orders_today') }}</h5>


                </div>
                <table id="html5-extension-order" class="table table-hover non-hover">
                    <thead>
                        <tr>

                            <th> {{ __('dash.booking_number') }}</th>
                            <th> {{ __('dash.customer_name') }}</th>
                            <th> {{ __('dash.phone') }}</th>
                            <th> {{ __('dash.service') }}</th>
                            <th> {{ __('dash.date') }}</th>
                            <th> {{ __('dash.time') }}</th>
                            <th> {{ __('dash.status') }}</th>

                            <th>#</th>
                            <th> {{ __('dash.order_number') }}</th>
                            <th> {{ __('dash.customer_name') }}</th>
                            <th> {{ __('dash.date') }}</th>
                            <th> {{ __('dash.amount') }}</th>
                            <th> {{ __('dash.payment_method') }}</th>
                            <th> {{ __('dash.status') }}</th>
                        </tr>
                    </thead>
                </table>


            </div>

        </div>





    </div>

    <!-- sales chart start -->
    <div class="row">
        <div class="col-sm-12">

            @component('components.widget', [
            'class' => 'box-primary',
            'title' => __('dash.sells_last_7_days_month'),
            'id' => 'chartToggleWidget',
            ])
            <div id="sellsChart1">{!! $sells_chart_1->container() !!}</div>
            <div id="sellsChart2" style="display: none;">{!! $sells_chart_2->container() !!}</div>
            @endcomponent
        </div>
    </div>
</div>
@endsection


@push('script')
<script type="text/javascript">
    $(document).ready(function() {
            // Initial state: show chart 1 and hide chart 2
            $('#sellsChart1').show();
            $('#sellsChart2').hide();


            $('#chartToggleWidget .box-title').click(function() {
                // Toggle the visibility of the charts
                $('#sellsChart1').toggle();
                $('#sellsChart2').toggle();
            });
        });
        $(document).ready(function() {
            var table;
            table = $('#html5-extension-bookings').DataTable({
                dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                order: [
                    [0, 'asc']
                ],
                "language": {
                    "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
                },
                buttons: {
                    buttons: [{
                            extend: 'copy',
                            className: 'btn btn-sm',
                            text: 'نسخ'
                        },
                        {
                            extend: 'csv',
                            className: 'btn btn-sm',
                            text: 'تصدير إلى CSV'
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-sm',
                            text: 'تصدير إلى Excel'
                        },
                        {
                            extend: 'print',
                            className: 'btn btn-sm',
                            text: 'طباعة'
                        }
                    ]
                },
                processing: true,
                responsive: true,
                serverSide: false,
                ajax: {
                    url: '{{ url('admin/bookings?type=service') }}',
                    data: function(d) {
                        d.page = "home";
                    }
                },
                columns: [{
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'id',
                        name: 'id'
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
                        data: 'status',
                        name: 'status'
                    },
                ]
            });

        });
        $(document).ready(function() {
            var table;
            table = $('#html5-extension').DataTable({
                dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                order: [
                    [0, 'asc']
                ],
                "language": {
                    "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
                },
                buttons: {
                    buttons: [{
                            extend: 'copy',
                            className: 'btn btn-sm',
                            text: 'نسخ'
                        },
                        {
                            extend: 'csv',
                            className: 'btn btn-sm',
                            text: 'تصدير إلى CSV'
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-sm',
                            text: 'تصدير إلى Excel'
                        },
                        {
                            extend: 'print',
                            className: 'btn btn-sm',
                            text: 'طباعة'
                        }
                    ]
                },
                processing: true,
                responsive: true,
                serverSide: false,
                ajax: {
                    url: '{{ route('dashboard.visits.index') }}',
                    data: function(d) {
                        d.page = "home";
                    }
                },
                columns: [{
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'group_name',
                        name: 'group_name'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'start_time',
                        name: 'start_time'
                    },
                    // {data: 'end_time', name: 'end_time'},
                    {
                        data: 'status',
                        name: 'status'
                    },
                ]
            });
            $('#html5-extension tbody').on('click', 'tr', function() {
                var data = table.row(this).data();
                // alert(data.id);
                window.location.href = '/admin/visits/' + data.id;
            });
        });


        $(document).ready(function() {
            var table;
            table = $('#html5-extension-order').DataTable({
                dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                order: [
                    [0, 'asc']
                ],
                "language": {
                    "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
                },
                buttons: {
                    buttons: [{
                            extend: 'copy',
                            className: 'btn btn-sm',
                            text: 'نسخ'
                        },
                        {
                            extend: 'csv',
                            className: 'btn btn-sm',
                            text: 'تصدير إلى CSV'
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-sm',
                            text: 'تصدير إلى Excel'
                        },
                        {
                            extend: 'print',
                            className: 'btn btn-sm',
                            text: 'طباعة'
                        }
                    ]
                },
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: '{{ route('dashboard.orders.index') }}',
                    data: function(d) {
                        d.page = "home";
                        console.log(d);

                    },
                    error: function(xhr, error, code) {
                        console.error('AJAX Error:', error);
                        console.log('Response Text:', xhr.responseText);
                        console.log('Status Code:', xhr.status);

                    }
                },

                columns: [{
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'user',
                        name: 'user'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'payment_method',
                        name: 'payment_method'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                ]
            });

            $('#html5-extension-order tbody').on('click', 'tr', function() {
                var data = table.row(this).data();
                alert(data.id); // Debugging line to show order ID
                window.location.href = '/admin/order/orderDetail?id=' + data.id;
            });
        });
</script>

<script src="https://code.highcharts.com/highcharts.js"></script>


{!! $sells_chart_1->script() !!}
{!! $sells_chart_2->script() !!}
@endpush