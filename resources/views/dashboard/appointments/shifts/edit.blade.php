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
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.home') }}">{{ __('dash.home') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.shifts.index') }}">المواعيد</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">تعديل الشيفت</li>
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
                    <form action="{{ route('dashboard.shifts.update', $shift->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="day_id">اليوم</label>
                            <select class="form-control" id="day_id" name="day_id">
                                @foreach ($days as $day)
                                    <option value="{{ $day->id }}" {{ $shift->day_id == $day->id ? 'selected' : '' }}>
                                        {{ $day->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="shift_no">رقم الشيفت</label>
                            <input type="text" class="form-control" id="shift_no" name="shift_no" readonly
                                value="{{ $shift->shift_no }}" required>
                        </div>

                        <div class="form-group">
                            <label for="start_time">وقت البداية</label>
                            <input type="time" class="form-control" id="start_time" name="start_time"
                                value="{{ $shift->start_time }}" required>
                        </div>

                        <div class="form-group">
                            <label for="end_time">وقت النهاية</label>
                            <input type="time" class="form-control" id="end_time" name="end_time"
                                value="{{ $shift->end_time }}" required>
                        </div>

                        <div class="form-group">
                            <label for="is_active">حالة الشيفت</label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="1" {{ $shift->is_active == 1 ? 'selected' : '' }}>نشط</option>
                                <option value="0" {{ $shift->is_active == 0 ? 'selected' : '' }}>غير نشط</option>
                            </select>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                            <a href="{{ route('dashboard.shifts.index') }}"
                                class="btn flaticon-cancel-12">{{ __('dash.close') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection