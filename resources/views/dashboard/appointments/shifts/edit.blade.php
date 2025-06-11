@extends('dashboard.layout.layout')

@section('sub-header')
<style>
    /* Main multi-select box container */
    .select2-container--default .select2-selection--multiple {
        min-height: 100px;
        max-height: 260px;
        padding: 12px;
        border: 1px solid #ced4da;
        border-radius: 10px;
        background-color: #fff;
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        overflow-y: auto;
    }

    .select2-selection__rendered {
        display: flex !important;
        flex-wrap: wrap;
        gap: 8px;
        margin: 0;
        padding: 0;
        list-style: none;
        width: 100%;
    }

    /* Tag style (clean bubble) */
    .select2-selection__choice {
        background-color: #f8f9fa !important;
        border: 1px solid #ced4da !important;
        color: #212529 !important;
        font-size: 14px;
        font-weight: 500;
        border-radius: 20px !important;
        padding: 5px 10px 5px 10px !important;
        display: inline-flex;
        align-items: center;
        white-space: nowrap;
        line-height: 1.3;
        direction: rtl;
    }

    /* Fix RTL direction + icon spacing */
    .select2-selection__choice__remove {
        font-size: 18px !important;
        font-weight: bold;
        color: #888 !important;
        margin-left: 6px;
        margin-right: 0;
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: color 0.2s ease-in-out;
    }

    .select2-selection__choice__remove:hover {
        color: #dc3545 !important;
    }

    /* Responsive fixes */
    @media (max-width: 768px) {
        .select2-container--default .select2-selection--multiple {
            font-size: 13px;
        }

        .select2-selection__choice {
            font-size: 13px;
            padding: 5px 8px !important;
        }

        .select2-selection__choice__remove {
            font-size: 16px !important;
        }
    }
</style>


<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm bg-light">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <!-- menu icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
        </a>
        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 py-2 bg-transparent">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">{{ __('dash.home')
                                    }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.shifts.index') }}">المواعيد</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">تعديل المناوبة</li>
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
            <div class="widget-content widget-content-area br-6 shadow-sm">
                <form action="{{ route('dashboard.shifts.update', $shift->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <!-- Days -->
                        <div class="form-group col-md-6">
                            <label for="day_id" class="font-weight-bold"> {{ __('dash.days') }}</label>
                            <select class="form-control select2-enhanced" id="day_id" name="day_id[]" multiple
                                data-placeholder="اختر أيام"
                                style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                                @foreach ($days as $day)
                                <option value="{{ $day->id }}" {{ in_array($day->id, json_decode($shift->day_id)) ?
                                    'selected' : '' }}>
                                    {{ app()->getLocale() == 'ar' ? __($day->name_ar) : __($day->name) }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Shift Number -->
                        <div class="form-group col-md-6">
                            <label for="shift_no" class="font-weight-bold"> {{ __('dash.shift_name') }} </label>
                            <input type="text" class="form-control" id="shift_no" name="shift_no" readonly
                                value="{{ $shift->shift_no }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Group -->
                        <div class="form-group col-md-12">
                            <label for="group_id" class="font-weight-bold">{{ __('dash.groups') }}</label>
                            <select class="form-control select2-enhanced" id="group_id" name="group_id[]" multiple
                                data-placeholder="اختر مجموعة"
                                style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                                @foreach ($groups as $group)
                                <option value="{{ $group->id }}" {{ in_array($group->id, json_decode($shift->group_id))
                                    ? 'selected' : '' }}>
                                    {{ $group->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- New full-width row for services -->
                    <div class="row mb-3">
                        <div class="form-group col-md-12">
                            <label for="service_id" class="font-weight-bold">{{ __('dash.services') }}</label>
                            <select class="form-control select2-enhanced" id="service_id" name="service_id[]" multiple
                                data-placeholder="اختر خدمات"
                                style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                                @foreach ($services as $service)
                                <option value="{{ $service->id }}" {{ in_array($service->id,
                                    json_decode($shift->service_id)) ? 'selected' : '' }}>
                                    {{ $service->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row align-items-end mb-3">
                        <!-- Start Time -->
                        <div class="form-group col-md-4">
                            <label for="start_time" class="font-weight-bold"> {{ __('dash.start_time') }}</label>
                            <input type="time" class="form-control" id="start_time" name="start_time"
                                value="{{ $shift->start_time }}" required>
                        </div>

                        <!-- End Time -->
                        <div class="form-group col-md-4">
                            <label for="end_time" class="font-weight-bold"> {{ __('dash.end_time') }}</label>
                            <input type="time" class="form-control" id="end_time" name="end_time"
                                value="{{ $shift->end_time }}" required>
                        </div>

                        <!-- Status -->
                        <div class="form-group col-md-4">
                            <label for="is_active" class="font-weight-bold">{{ __('dash.status') }}</label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="1" {{ $shift->is_active == 1 ? 'selected' : '' }}>نشط</option>
                                <option value="0" {{ $shift->is_active == 0 ? 'selected' : '' }}>غير نشط</option>
                            </select>
                        </div>
                    </div>




                    <!-- Submit Actions -->
                    <div class="form-group d-flex justify-content-end align-items-center gap-2 mt-4">
                        <a href="{{ route('dashboard.shifts.index') }}" class="btn btn-light border px-4">
                            <i class="fas fa-times mr-1"></i> {{ __('dash.close') }}
                        </a>
                        <button type="submit" class="btn btn-primary px-5">
                            <i class="fas fa-save mr-1"></i> حفظ التعديلات
                        </button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function () {
        $('.select2-enhanced').select2({
            width: '100%',
            closeOnSelect: false,
            allowClear: true,
            placeholder: function () {
                return $(this).data('placeholder');
            }
        });
    });
</script>
@endpush