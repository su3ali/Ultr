@extends('dashboard.layout.layout')

@push('style')
    <style>
        .shift-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
        }

        .shift-details h3 {
            margin-bottom: 20px;
            text-align: center;
        }

        .shift-details .detail {
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .shift-details .detail strong {
            font-weight: 600;
            font-size: 16px;
            color: #333;
        }

        .shift-details .detail span {
            font-size: 16px;
            font-weight: 500;
            color: #555;
        }

        .shift-details .btn {
            margin-top: 20px;
            display: block;
            width: 100%;
            padding: 10px 0;
        }
    </style>
@endpush

@section('sub-header')
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <!-- Hamburger Menu Icon -->
            </a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 py-2">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.home') }}">{{ __('dash.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('dash.shift_details') }}</li>
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
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6 shift-details">
                    <h3>{{ __('dash.shift_details') }}</h3>

                    <!-- Day -->
                    <div class="detail">
                        <strong>{{ __('dash.day') }}:</strong>
                        <span>{{ $shift->day->name }}</span>
                    </div>

                    <!-- Group -->
                    <div class="detail">
                        <strong>{{ __('dash.group') }}:</strong>
                        <span>{{ $shift->group->name }}</span>
                    </div>

                    <!-- Service -->
                    <div class="detail">
                        <strong>{{ __('dash.service') }}:</strong>
                        <span>{{ $shift->service->title }}</span>
                    </div>

                    <!-- Shift Number -->
                    <div class="detail">
                        <strong>{{ __('dash.shift_number') }}:</strong>
                        <span>{{ $shift->shift_no }}</span>
                    </div>

                    <!-- Start Time -->
                    <div class="detail">
                        <strong>{{ __('dash.start_time') }}:</strong>
                        <span>{{ $shift->start_time }}</span>
                    </div>

                    <!-- End Time -->
                    <div class="detail">
                        <strong>{{ __('dash.end_time') }}:</strong>
                        <span>{{ $shift->end_time }}</span>
                    </div>

                    <!-- Status -->
                    <div class="detail">
                        <strong>{{ __('dash.status') }}:</strong>
                        <span>{{ $shift->is_active ? __('dash.active') : __('dash.inactive') }}</span>
                    </div>

                    <!-- Back to List Button -->
                    <a href="{{ route('dashboard.shifts.index') }}" class="btn btn-primary">
                        {{ __('dash.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
