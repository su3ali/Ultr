@extends('dashboard.layout.layout')

@push('style')
    <style>
        .table>thead>tr>th {
            white-space: pre-wrap !important;
        }

        .form-control {
            padding: 10px;
            /* Add padding for better touch target */
            border-radius: 5px;
            /* Round corners for a modern look */
        }

        .form-group {
            margin-bottom: 15px;
            /* Add some space between fields */
        }
    </style>
@endpush

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
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.home') }}">{{ __('dash.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{ __('dash.add_new_shift') }}</li>
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
                <div class="widget-content widget-content-area br-6">
                    <h5>{{ __('dash.add_new_shift') }}</h5>
                    <form action="{{ route('dashboard.shifts.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="day_id">{{ __('dash.day') }}</label>
                                <select name="day_id" id="day_id" class="form-control" required>
                                    <option value="">{{ __('dash.select_day') }}</option>
                                    @foreach ($days as $day)
                                        <option value="{{ $day->id }}">{{ __('dash.' . strtolower($day->name)) }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>


                            <div class="form-group col-md-4">
                                <label for="group_id">المجموعة</label>
                                <select name="group_id" id="group_id" class="form-control" required>
                                    <option value="">اختر المجموعة</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="service_id">الخدمة</label>
                                <select name="service_id" id="service_id" class="form-control" required>
                                    <option value="">اختر الخدمة</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">

                            {{-- <div class="form-group col-md-4">
                                <label for="shift_no">رقم الشفت</label>
                                <input type="text" id="shift_no" class="form-control"
                                    value="{{ 'shift-' . rand(1000, 9999) }}" readonly>
                            </div> --}}



                            <div class="form-group col-md-4">
                                <label for="start_time">وقت البدء</label>
                                <input type="time" name="start_time" id="start_time" class="form-control" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="end_time">وقت الانتهاء</label>
                                <input type="time" name="end_time" id="end_time" class="form-control" required>
                            </div>

                            <div class=" form-group col-md-4">
                                <label for="is_active">الحالة</label>
                                <select name="is_active" id="is_active" class="form-control" required>
                                    <option value="1">نشط</option>
                                    <option value="0">غير نشط</option>
                                </select>
                            </div>
                        </div>



                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">إنشاء مناوبة</button>
                            <a href="{{ route('dashboard.shifts.index') }}" class="btn btn-secondary">إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
