@extends('dashboard.layout.layout')

@push('style')
<link rel="stylesheet" href="{{ asset('css/shifts/shifts.css') }}">
<style>
    .card-header {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        background-color: #f8f9fa;
        border-bottom: 1px solid #e3e6f0;
        padding: 15px 20px;
    }

    .form-group label {
        font-weight: 600;
    }

    .select2-container .select2-selection--multiple {
        min-height: 42px;
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 6px;
    }

    .btn-primary {
        padding: 10px 25px;
    }

    .btn-cancel {
        padding: 10px 20px;
        background: #6c757d;
        color: white;
        border-radius: 5px;
        text-decoration: none;
    }

    .btn-cancel:hover {
        background-color: #5a6268;
    }

    .select2-selection.select2-selection--multiple {
        min-height: 40px;
        height: auto !important;
        overflow-y: auto;
        white-space: normal !important;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        margin-top: 5px;
        white-space: normal;
        word-break: break-word;
    }
</style>
@endpush

@section('sub-header')
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <i class="feather feather-menu"></i>
        </a>
        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 py-2">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">{{ __('dash.home')
                                    }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('dash.add_new_shift') }}</li>
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
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-plus-circle"></i> {{ __('dash.add_new_shift') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.shifts.store') }}" id="create-shift" method="POST">
                        @csrf

                        <div class="form-row mb-3">
                            <div class="form-group col-md-4">
                                <label for="day_id">{{ __('dash.day') }}</label>
                                <select name="day_id[]" id="day_id" class="form-control select2" multiple required>
                                    @foreach ($days as $day)
                                    <option value="{{ $day->id }}">{{ __('dash.' . strtolower($day->name)) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="group_id">{{ __('dash.group') }}</label>
                                <select name="group_id[]" id="group_id" class="form-control select2" multiple required>
                                    @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="service_id">الخدمة</label>
                                <select name="service_id[]" id="service_id" class="form-control select2" multiple
                                    required>
                                    @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-4">
                                <label for="start_time">وقت البدء</label>
                                <input type="time" name="start_time" id="start_time" class="form-control" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="end_time">وقت الانتهاء</label>
                                <input type="time" name="end_time" id="end_time" class="form-control" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="is_active" class="form-label">الحالة</label>
                                <select name="is_active" id="is_active" class="form-control form-select" required>
                                    <option value="1" selected>نشط</option>
                                    <option value="0">غير نشط</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group d-flex justify-content-end align-items-center gap-2 mt-4">
                            <a href="{{ route('dashboard.shifts.index') }}"
                                class="btn btn-light border d-flex align-items-center justify-content-center"
                                style="min-width: 140px; height: 45px;">
                                <i class="fas fa-times ml-2 p-1"></i> {{ __('dash.close') }}
                            </a>
                            <button type="submit"
                                class="btn btn-primary d-flex align-items-center justify-content-center"
                                style="min-width: 140px; height: 45px;">
                                <i class="fas fa-save ml-2 p-1"></i> حفظ التعديلات
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    #is_active {
    direction: rtl;
    text-align: right;
}

    $(document).ready(function () {
        $('.select2').select2({
            width: '100%',
            placeholder: 'اختر من القائمة',
            dir: "rtl"
        });
    });
</script>
@endpush