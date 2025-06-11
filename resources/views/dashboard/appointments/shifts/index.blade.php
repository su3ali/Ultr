@extends('dashboard.layout.layout')

@push('style')
<style>
    /* RTL and Table Header */
    body {
        direction: rtl;
    }

    .breadcrumb {
        justify-content: flex-end;
    }

    .table>thead>tr>th {
        white-space: pre-wrap !important;
        text-align: right;
    }

    .btn {
        float: left;
    }

    /* Switch Toggle */
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
        border-radius: 25px;
        transition: .4s;
    }

    .slider::before {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        left: 5px;
        bottom: 2.5px;
        background-color: white;
        border-radius: 50%;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #28a745;
    }

    input:checked+.slider::before {
        transform: translateX(28px);
    }

    /* Group Name Badge Container */
    .group-names-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        max-height: 50px;
        overflow-y: auto;
        transition: max-height 0.3s ease;
    }

    .group-names-badges::-webkit-scrollbar {
        width: 8px;
    }

    .group-names-badges::-webkit-scrollbar-thumb {
        background: #2B68A6;
        border-radius: 10px;
    }

    .group-names-badges::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Badge Styling */
    .badge {
        padding: 6px 12px;
        font-size: 0.95em;
        border-radius: 12px;
        color: white;
        transition: transform 0.2s ease;
    }

    .badge-primary {
        background-color: #2B68A6;
    }

    .badge-secondary {
        background-color: #6c757d;
    }

    .badge:hover {
        transform: scale(1.1);
        opacity: 0.9;
    }

    /* Group Name List (Legacy Support) */
    .group-names-container {
        max-height: 50px;
        overflow-y: auto;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        background-color: #f9f9f9;
    }

    .group-names-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .group-name-item {
        padding: 5px 10px;
        border-bottom: 1px solid #eaeaea;
        cursor: default;
    }

    .group-name-item:hover {
        background-color: #f1f1f1;
    }

    /* SweetAlert Buttons */
    .swal-button--danger,
    .swal-button--cancel {
        border: 0;
        border-radius: 5px;
        font-weight: bold;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        flex: 1;
        margin: 0 5px;
        transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
    }

    .swal-button--danger {
        background-color: #dc3545 !important;
        color: white;
    }

    .swal-button--danger:hover {
        background-color: #c82333 !important;
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .swal-button--danger:active {
        background-color: #bd2130 !important;
        transform: scale(0.95);
    }

    .swal-button--cancel {
        background-color: #6c757d !important;
        color: white;
    }

    .swal-button--cancel:hover {
        background-color: #5a6268 !important;
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .swal-button--cancel:active {
        background-color: #4e555b !important;
        transform: scale(0.95);
    }

    .swal-modal {
        border-radius: 10px;
        font-family: "Arial", sans-serif;
    }

    .swal-title {
        font-size: 20px;
        font-weight: bold;
        color: #333;
    }

    .swal-text {
        font-size: 20px;
        color: #555;
    }

    .swal-footer {
        display: flex;
        justify-content: center;
        gap: 10px;
        width: 100%;
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
                        name: 'group_name',
                        render: function(data, type, row) {
                            // console.log(row.group_id);
                            // debugger;
                            if (Array.isArray(row.group) && row.group.length > 0) {
                                return `
                                <div class="group-names-badges">
                                    ${row.group.map(group => `
                                                             <button class="btn-sm btn-primary" title="${group}">
                                                                <a href="core/group/" style=color:#FFFFFF;> ${group}</a>
                                                                 </button>
                                                               `).join('')}
                                </div>
                            `;
                            }

                            // Return 'N/A' if no groups found
                            return '<button class="btn-sm btn-secondary">N/A</button>';
                        }



                    },

                    {
                        data: 'service_name',
                        name: 'service_name',
                        render: function(data, type, row) {
                            // Check if data exists and is a non-empty string
                            if (data && typeof data === 'string') {
                                let serviceIds = data.split(
                                    ',');
                                let html = '';

                                serviceIds.forEach(function(serviceId) {
                                    serviceId = serviceId
                                        .trim();
                                    html +=

                                        '<button class="btn-sm btn-primary" title=" ' +
                                        serviceId + '"> ' +
                                        '<a href="core/service/" style=color:#FFFFFF;>' +
                                        serviceId + '</a>' + '</button> ';


                                });

                                return html;
                            }

                            return 'N/A'; // Fallback in case there's no data
                        }
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
    data: null,
    name: 'action',
    orderable: false,
    searchable: false,
    render: function(data, type, row) {
        let html = '';

        if (row.can_edit) {
            html += `
                <a href="/admin/shifts/${row.id}/edit" class="btn btn-sm btn-primary card-tools edit" title="Edit">
                    <i class="far fa-edit fa-2x"></i>
                </a>
            `;
        }

        if (row.can_delete) {
            html += `
                <button class="btn btn-outline-danger btn-sm" onclick="deleteShift(${row.id})" title="Delete">
                    <i class="far fa-trash-alt fa-2x"></i>
                </button>
            `;
        }

        return html || '<span class="text-muted">—</span>'; // fallback if no permissions
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

        function deleteShift(id) {
            swal({
                title: "تأكيد الحذف",
                text: "هل أنت متأكد أنك تريد حذف هذا العنصر؟",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "إلغاء",
                        value: false,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true
                    },
                    confirm: {
                        text: "حذف",
                        value: true,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: false
                    }
                },
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: `/admin/shifts/${id}`,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(data) {
                            $('#shift-table').DataTable().ajax.reload();
                            swal({
                                title: "عملية ناجحة",
                                text: "تم تنفيذ الطلب بنجاح",
                                icon: 'success',
                                buttons: false,
                                timer: 2000
                            });
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr.responseText);
                            swal({
                                title: "فشلت العملية",
                                text: xhr.responseJSON?.message || "فشل في تنفيذ الطلب",
                                icon: 'error',
                            });
                        }
                    });
                }
            });
        }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
@endpush