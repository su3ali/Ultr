@extends('dashboard.layout.layout')

@push('style')
    <style>
        .table>thead>tr>th {
            white-space: pre-wrap !important;
            text-align: right;
        }

        /* RTL adjustments */
        body {
            direction: rtl;
        }

        .breadcrumb {
            justify-content: flex-end;
        }

        .btn {
            float: left;
        }

        /* Custom switch toggle styling */
        .custom-switch {
            position: relative;
            display: inline-block;
            width: 55px;
            height: 25px;
        }

        .custom-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #dc3545;
            transition: .4s;
            border-radius: 25px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 5px;
            bottom: 2.5px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #28a745;
        }

        input:checked+.slider:before {
            transform: translateX(28px);
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
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.home') }}">{{ __('dash.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('dash.shifts') }}</li>
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
                    <div class="col-md-12 text-left mb-3">
                        <a href="{{ route('dashboard.shifts.create') }}" class="btn btn-primary">
                            {{ __('dash.add_new_shift') }}
                        </a>
                    </div>
                    <table id="shift-table" class="table table-hover non-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('dash.day') }}</th>
                                <th>{{ __('dash.group') }}</th>
                                <th>{{ __('dash.service') }}</th>
                                <th>{{ __('dash.shift_number') }}</th>
                                <th>{{ __('dash.start_time') }}</th>
                                <th>{{ __('dash.end_time') }}</th>
                                <th>{{ __('dash.status') }}</th>
                                <th>{{ __('dash.actions') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            const dayTranslations = {
                'Sunday': 'الأحد',
                'Monday': 'الاثنين',
                'Tuesday': 'الثلاثاء',
                'Wednesday': 'الأربعاء',
                'Thursday': 'الخميس',
                'Friday': 'الجمعة',
                'Saturday': 'السبت'
            };

            $('#shift-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('dashboard.shifts.index') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'day_name',
                        name: 'day_name',
                        render: function(data) {
                            return dayTranslations[data] || data;
                        }
                    },
                    {
                        data: 'group_name',
                        name: 'group_name'
                    },
                    {
                        data: 'service_name',
                        name: 'service_name'
                    },
                    {
                        data: 'shift_no',
                        name: 'shift_no'
                    },
                    {
                        data: 'start_time',
                        name: 'start_time'
                    },
                    {
                        data: 'end_time',
                        name: 'end_time'
                    },
                    {
                        data: 'is_active',
                        name: 'is_active',
                        render: function(data, type, row) {

                            const checked = data == 1 ? 'checked' : '';
                            return `
                                <label class="custom-switch">
                                    <input type="checkbox" data-id="${row.id}" id="customSwitchStatus${row.id}" ${checked} onchange="toggleStatus(${row.id}, this)">
                                    <span class="slider"></span>
                                </label>`;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                                <a href="/admin/shifts/${row.id}/edit" class="btn btn-sm btn-primary card-tools edit"><i class="far fa-edit fa-2x"></i></a>
                               
                                <a href="/admin/shifts/${row.id}" class="mr-2 btn btn-outline-danger btn-delete btn-sm">
                            <i class="far fa-trash-alt fa-2x"></i></a>
                                
                            `;
                        }
                    }
                    // <a href="/admin/shifts/${row.id}" class="btn btn-info btn-sm">{{ __('dash.view') }}</a>
                ],
                order: [
                    [0, 'desc']
                ],
                language: {
                    url: "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}",
                }
            });
        });

        function toggleStatus(id, checkbox) {
            // Get the current status from the checkbox
            let active = $(checkbox).is(':checked') ? 1 : 0;

            $.ajax({
                url: `{{ route('dashboard.shifts.toggleStatus', ['id' => ':id']) }}`.replace(':id', id),
                method: 'POST',
                data: {
                    is_active: active,
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    // Reload the DataTable
                    $('#shift-table').DataTable().ajax.reload();

                    // Show success message using SweetAlert
                    swal({
                        title: "{{ __('dash.successful_operation') }}",
                        text: "{{ __('dash.request_executed_successfully') }}",
                        type: 'success',

                        icon: 'success',
                        padding: '2em'
                    });

                    console.log('Response:', data); // Log the response
                },
                error: function(xhr, status, error) {
                    console.error('Error:', xhr.responseText); // Log the error response

                    // Show error message using SweetAlert
                    swal({
                        title: "{{ __('dash.operation_failed') }}",
                        text: "{{ __('dash.request_failed') }}",
                        type: 'error',

                        icon: 'error',
                        padding: '2em'
                    });
                }
            });
        }
    </script>
@endpush
