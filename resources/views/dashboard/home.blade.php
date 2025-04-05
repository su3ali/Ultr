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

                @if (auth()->user()->hasRole('admin') || auth()->user()->can('view_customers'))
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.core.customer.index') }}" class="text-decoration-none">
                        <div style="
                            display: flex;
                            align-items: center;
                            background-color: #ffffff;
                            border-left: 5px solid #3b82f6;
                            border-radius: 10px;
                            padding: 16px 20px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                            transition: 0.3s;">
                            <div style="flex-grow: 1;">
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">{{ $customers }}</div>
                                <div style="font-size: 14px; color: #64748b;">{{ __('dash.customers') }}</div>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
                                    stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
                @endif

                @if (auth()->user()->hasRole('admin') || auth()->user()->can('view_orders'))
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.orders.index') }}" class="text-decoration-none">
                        <div style="
                            display: flex;
                            align-items: center;
                            background-color: #ffffff;
                            border-left: 5px solid #0ea5e9;
                            border-radius: 10px;
                            padding: 16px 20px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                            transition: 0.3s;">
                            <div style="flex-grow: 1;">
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">{{ $client_orders }}
                                </div>
                                <div style="font-size: 14px; color: #64748b;">{{ __('dash.client_orders') }}</div>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
                                    stroke="#0ea5e9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-shopping-cart">
                                    <circle cx="9" cy="21" r="1" />
                                    <circle cx="20" cy="21" r="1" />
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
                @endif

                @if (auth()->user()->hasRole('admin') || auth()->user()->can('view_technicians'))
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.core.technician.index') }}" class="text-decoration-none">
                        <div style="
                            display: flex;
                            align-items: center;
                            background-color: #ffffff;
                            border-left: 5px solid #f59e0b;
                            border-radius: 10px;
                            padding: 16px 20px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                            transition: 0.3s;">
                            <div style="flex-grow: 1;">
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">{{ $technicians }}</div>
                                <div style="font-size: 14px; color: #64748b;">{{ __('dash.technicians') }}</div>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
                                    stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-user">
                                    <circle cx="12" cy="7" r="4" />
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
                @endif

                @if (auth()->user()->hasRole('admin') || auth()->user()->can('view_orders'))
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.visits.index') }}" class="text-decoration-none">
                        <div style="
                            display: flex;
                            align-items: center;
                            background-color: #ffffff;
                            border-left: 5px solid #3b82f6;
                            border-radius: 10px;
                            padding: 16px 20px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                            transition: 0.3s;">
                            <div style="flex-grow: 1;">
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">{{ $tech_visits }}</div>
                                <div style="font-size: 14px; color: #64748b;">{{ __('dash.tech_orders') }}</div>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
                                    stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-book">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                @if (auth()->user()->hasRole('admin') || auth()->user()->can('view_orders'))

                <!-- Canceled Orders -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.order.canceledOrders') }}" class="text-decoration-none">
                        <div style="
                            display: flex;
                            align-items: center;
                            background-color: #ffffff;
                            border-left: 5px solid #ef4444;
                            border-radius: 10px;
                            padding: 16px 20px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
                            <div style="flex-grow: 1;">
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">
                                    {{ $canceled_orders }}
                                </div>
                                <div style="font-size: 14px; color: #64748b;">
                                    {{ __('dash.canceled_orders') }}
                                </div>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
                                    stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-x-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Late Orders -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.order.lateOrders') }}" class="text-decoration-none">
                        <div style="
                            display: flex;
                            align-items: center;
                            background-color: #ffffff;
                            border-left: 5px solid #f59e0b;
                            border-radius: 10px;
                            padding: 16px 20px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
                            <div style="flex-grow: 1;">
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">
                                    {{ $lateOrderCount }}
                                </div>
                                <div style="font-size: 14px; color: #64748b;">
                                    {{ __('dash.lateOrder') }}
                                </div>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
                                    stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-alert-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12" y2="16"></line>
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Canceled Orders Today -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.order.canceledOrdersToday') }}" class="text-decoration-none">
                        <div style="
                            display: flex;
                            align-items: center;
                            background-color: #ffffff;
                            border-left: 5px solid #facc15;
                            border-radius: 10px;
                            padding: 16px 20px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
                            <div style="flex-grow: 1;">
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">
                                    {{ $canceled_orders_today }}
                                </div>
                                <div style="font-size: 14px; color: #64748b;">
                                    {{ __('dash.canceled_orders_today') }}
                                </div>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
                                    stroke="#facc15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-alert-triangle">
                                    <path d="M10.29 3.29L1 21h22L13.71 3.29a1 1 0 0 0-1.42 0z" />
                                    <line x1="12" y1="9" x2="12" y2="13"></line>
                                    <line x1="12" y1="17" x2="12" y2="17"></line>
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Orders Today -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.order.ordersToday') }}" class="text-decoration-none">
                        <div style="
                            display: flex;
                            align-items: center;
                            background-color: #ffffff;
                            border-left: 5px solid #22c55e;
                            border-radius: 10px;
                            padding: 16px 20px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
                            <div style="flex-grow: 1;">
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">
                                    {{ $client_orders_today }}
                                </div>
                                <div style="font-size: 14px; color: #64748b;">
                                    {{ __('dash.client_orders_today') }}
                                </div>
                            </div>
                            <div>
                                <i class="fas fa-check-circle" style="color: #22c55e; font-size: 20px;"></i>
                            </div>
                        </div>
                    </a>
                </div>

                @endif



                {{-- Visits Today --}}
                @if (auth()->user()->hasRole('admin') || auth()->user()->can('view_orders'))

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.visits.visitsToday') }}" class="text-decoration-none">
                        <div style="
                            display: flex;
                            align-items: center;
                            background-color: #ffffff;
                            border-left: 5px solid #0ea5e9;
                            border-radius: 10px;
                            padding: 16px 20px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                            transition: 0.3s;
                        ">
                            <div style="flex-grow: 1;">
                                <!-- Main Number -->
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">
                                    {{ $tech_visits_today }}
                                </div>
                                <!-- Label -->
                                <div style="font-size: 14px; color: #64748b;">
                                    {{ __('dash.tech_orders_today') }}
                                </div>
                            </div>

                            <!-- Small Icon (optional) -->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
                                    stroke="#0ea5e9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-clipboard-check">
                                    <path d="M9 2H15V6H9z" />
                                    <path d="M9 10H15V14H9z" />
                                    <path d="M9 18H15V22H9z" />
                                    <path d="M18 2L22 6" />
                                    <path d="M18 6L22 2" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>

                @endif

                {{-- Finished Visits Today --}}
                @if (auth()->user()->hasRole('admin') || auth()->user()->can('view_orders'))

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.visits.finishedVisitsToday') }}" class="text-decoration-none">
                        <div style="
                            display: flex;
                            align-items: center;
                            background-color: #ffffff;
                            border-left: 5px solid #10b981;
                            border-radius: 10px;
                            padding: 16px 20px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                            transition: 0.3s; ">
                            <div style="flex-grow: 1;">
                                <!-- Main Number -->
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">
                                    {{ $finished_visits_today }}
                                </div>
                                <!-- Label -->
                                <div style="font-size: 14px; color: #64748b;">
                                    {{ __('dash.finished_orders_today') }}
                                </div>
                            </div>

                            <!-- Icon -->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
                                    stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-check-circle">
                                    <path d="M9 11l3 3L22 4" />
                                    <circle cx="12" cy="12" r="10" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>

                @endif


                {{-- Trainees Count --}}
                @if (auth()->user()->hasRole('admin') || auth()->user()->can('create_trainees'))
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.core.trainee.index') }}" class="text-decoration-none">
                        <div style="
                            display: flex;
                            align-items: center;
                            background-color: #ffffff;
                            border-left: 5px solid #3b82f6;
                            border-radius: 10px;
                            padding: 16px 20px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                            transition: 0.3s;
                        ">
                            <div style="flex-grow: 1;">
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">
                                    {{ $total_trainees }}
                                </div>
                                <div style="font-size: 14px; color: #64748b;">
                                    {{ __('dash.number_of_trainees') }}
                                </div>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
                                    stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                    <circle cx="19" cy="7" r="4" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
                @endif


                {{-- Clients Have Orders --}}
                @if (auth()->user()->hasRole('admin') || auth()->user()->can('view_clients_with_orders'))
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.core.customer.orders') }}" class="text-decoration-none">
                        <div style="
            display: flex;
            align-items: center;
            background-color: #ffffff;
            border-left: 5px solid #6366f1;
            border-radius: 10px;
            padding: 16px 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: 0.3s;">
                            <div style="flex-grow: 1;">
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">
                                    {{ $customersHaveOrders }}
                                </div>
                                <div style="font-size: 14px; color: #64748b;">
                                    {{ __('dash.clients_have_orders') }}
                                </div>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
                                    stroke="#6366f1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-package">
                                    <path d="M12 2v5M3 7l9 5 9-5M3 17l9 5 9-5V7M12 2l9 5-9 5-9-5z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
                @endif


                @if (auth()->user()->hasRole('admin') || auth()->user()->can('view_customer_complaints'))

                {{-- Total Complaints --}}
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.order.complaints') }}" class="text-decoration-none">
                        <div style="
                            display: flex;
                            align-items: center;
                            background-color: #ffffff;
                            border-left: 5px solid #3b82f6;
                            border-radius: 10px;
                            padding: 16px 20px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                            transition: 0.3s;
                        ">
                            <div style="flex-grow: 1;">
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">
                                    {{ $customer_complaints }}
                                </div>
                                <div style="font-size: 14px; color: #64748b;">
                                    {{ __('dash.complaints_total') }}
                                </div>
                            </div>
                            <div>
                                <i class="fas fa-list-alt" style="color: #3b82f6; font-size: 20px;"></i>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Unresolved Complaints --}}
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.order.complaintsUnresolved') }}" class="text-decoration-none">
                        <div style="
                            display: flex;
                            align-items: center;
                            background-color: #ffffff;
                            border-left: 5px solid #ef4444;
                            border-radius: 10px;
                            padding: 16px 20px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                            transition: 0.3s;
                        ">
                            <div style="flex-grow: 1;">
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">
                                    {{ $complaints_unresolved }}
                                </div>
                                <div style="font-size: 14px; color: #64748b;">
                                    {{ __('dash.complaints_unresolved') }}
                                </div>
                            </div>
                            <div>
                                <i class="fas fa-exclamation-triangle" style="color: #ef4444; font-size: 20px;"></i>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Resolved Complaints --}}
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.order.complaintsResolved') }}" class="text-decoration-none">
                        <div style="
                            display: flex;
                            align-items: center;
                            background-color: #ffffff;
                            border-left: 5px solid #10b981;
                            border-radius: 10px;
                            padding: 16px 20px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                            transition: 0.3s;
                        ">
                            <div style="flex-grow: 1;">
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">
                                    {{ $complaints_resolved }}
                                </div>
                                <div style="font-size: 14px; color: #64748b;">
                                    {{ __('dash.complaints_resolved') }}
                                </div>
                            </div>
                            <div>
                                <i class="fas fa-check-circle" style="color: #10b981; font-size: 20px;"></i>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Complaints Today --}}
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                    <a href="{{ route('dashboard.order.complaintsToday') }}" class="text-decoration-none">
                        <div style="
                            display: flex;
                            align-items: center;
                            background-color: #ffffff;
                            border-left: 5px solid #fbbf24;
                            border-radius: 10px;
                            padding: 16px 20px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                            transition: 0.3s;
                        ">
                            <div style="flex-grow: 1;">
                                <div style="font-size: 20px; font-weight: 700; color: #1e293b;">
                                    {{ $todayCustomerComplaints }}
                                </div>
                                <div style="font-size: 14px; color: #64748b;">
                                    {{ __('dash.complaints_today') }}
                                </div>
                            </div>
                            <div>
                                <i class="fas fa-calendar-day" style="color: #fbbf24; font-size: 20px;"></i>
                            </div>
                        </div>
                    </a>
                </div>

                @endif



            </div>
        </div>

        {{-- Bookings Today --}}
        @if (auth()->user()->hasRole('admin') || auth()->user()->can('view_bookings'))

        <div class="col-xl-6 col-lg-12 col-sm-12 mb-4">
            <div
                style="background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.06); padding: 20px;">
                <div class="mb-3">
                    <h5 style="color: #1e293b; font-weight: 600;">{{ __('dash.bookings_today') }}</h5>
                </div>

                <div class="table-responsive">
                    <table id="html5-extension-bookings" class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('dash.booking_number') }}</th>
                                <th>{{ __('dash.customer_name') }}</th>
                                <th>{{ __('dash.phone') }}</th>
                                <th>{{ __('dash.services') }}</th>
                                <th>{{ __('dash.date') }}</th>
                                <th>{{ __('dash.time') }}</th>
                                <th>{{ __('dash.status') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        @endif



        {{-- Client Orders Today --}}
        @if (auth()->user()->hasRole('admin') || auth()->user()->can('view_orders'))

        <div class="col-xl-6 col-lg-12 col-sm-12 mb-4">
            <div
                style="background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.06); padding: 20px;">
                <div class="mb-3">
                    <h5 style="color: #1e293b; font-weight: 600;">{{ __('dash.client_orders_today') }}</h5>
                </div>

                <div class="table-responsive">
                    <table id="html5-extension-order" class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('dash.order_number') }}</th>
                                <th>{{ __('dash.customer_name') }}</th>
                                <th>{{ __('dash.date') }}</th>
                                <th>{{ __('dash.amount') }}</th>
                                <th>{{ __('dash.payment_method') }}</th>
                                <th>{{ __('dash.status') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        @endif





    </div>
    @if (auth()->user()->hasRole('admin') || auth()->user()->can('view_orders'))
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
    <!-- sales chart end -->
    @endif
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
                    buttons: [
                        {
                            extend: 'copy',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.copy") }}'


                        },
                        {
                            extend: 'csv',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.csv") }}'
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.excel") }}'
                        },
                        {
                            extend: 'print',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.print") }}'
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
                    buttons: [
                        {
                            extend: 'copy',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.copy") }}'


                        },
                        {
                            extend: 'csv',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.csv") }}'
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.excel") }}'
                        },
                        {
                            extend: 'print',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.print") }}'
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
                    buttons: [
                        {
                            extend: 'copy',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.copy") }}'


                        },
                        {
                            extend: 'csv',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.csv") }}'
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.excel") }}'
                        },
                        {
                            extend: 'print',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.print") }}'
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