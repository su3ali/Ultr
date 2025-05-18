@extends('dashboard.layout.layout')

@push('style')
<link href="{{ asset('css/business_orders/index.css') }}" rel="stylesheet">
@endpush


@section('sub-header')
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
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
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('dash.business_orders') }}
                            </li>
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
        <div class="col-xl-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="text-right mb-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                        {{ __('dash.add_new') }}
                    </button>
                </div>

                @include('dashboard.business_orders.partials.filters')
                @include('dashboard.business_orders.partials.table')

            </div>
        </div>
    </div>
</div>

@include('dashboard.business_orders.create')
@include('dashboard.business_orders.edit')
@include('dashboard.business_orders.partials.change_team')

{{-- @include('dashboard.business_orders.edit_modal') --}}
@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const editOrderUrl = "{{ url('admin/business_orders') }}";

    function fetchProjectServicePrice(projectId, serviceId) {
        if (!projectId || !serviceId) return;

        $.ajax({
            url: '{{ route('dashboard.get.service.price') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                client_project_id: projectId,
                service_id: serviceId
            },
            success: function (res) {
                if (res.price !== undefined && res.price !== null) {
                    $('#edit_servicePriceInput').val(res.price);
                } else {
                    $('#edit_servicePriceInput').val('');
                }
            },
            error: function () {
                toastr.error('فشل في جلب سعر الخدمة');
                $('#edit_servicePriceInput').val('');
            }
        });
    }

    window.openEditModal = function(orderId) {
        $.get(`${editOrderUrl}/${orderId}/edit`, function (order) {
            $('#edit_order_user_id').val(order.user_id);
            $('#edit_order_id').val(order.id);
            $('#editCustomerName').val(order.user.full_name);
            $('#editPhoneInput').val(order.user.phone);

            // Set project and trigger change
            $('#edit_client_project_id').val(order.client_project_id).trigger('change');

            // Wait until service options are loaded if necessary
            setTimeout(() => {
                $('#edit_serviceSelect').val(order.service_id).trigger('change');
            }, 300);

            fetchProjectServicePrice(order.client_project_id, order.service_id);
            loadBranchesAndFloors(order.client_project_id, order.branch_id, order.floor_id);
            fetchCustomerCarsEdit(order.user_id, order.car_id);

            $('#editModal').modal('show');
        }).fail(() => toastr.error('فشل في تحميل بيانات الطلب'));
    };

    $(document).ready(function () {
        $('#edit_serviceSelect, #edit_client_project_id').on('change', function () {
            const serviceId = $('#edit_serviceSelect').val();
            const projectId = $('#edit_client_project_id').val();
            fetchProjectServicePrice(projectId, serviceId);
        });
    });
</script>
<script>
    // ========== Load Orders Table ==========
    function loadOrdersTable() {
        if ($.fn.dataTable.isDataTable('#ordersTable')) {
            $('#ordersTable').DataTable().clear().destroy();
        }

        ordersTable = $('#ordersTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: '{{ route("dashboard.business_orders.index") }}',
                data: function (d) {
                    d.date_from = $('#filter_date_from').val();
                    d.date_to = $('#filter_date_to').val();
                    d.status = $('#filter_status').val();
                    d.payment_method = $('#filter_payment_method').val();
                }
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'user', name: 'user' },
                { data: 'phone', name: 'phone' },
                { data: 'car', name: 'car' },
                { data: 'service', name: 'service' },
                { data: 'total', name: 'total' },
                { data: 'group', name: 'group' },
                { data: 'payment_method', name: 'payment_method' },
                { data: 'status', name: 'status' },
                { data: 'created_at', name: 'created_at' },
                { 
                    data: 'controll', 
                    name: 'controll', 
                    orderable: false, 
                    searchable: false, 
                    exportable: false, 
                    printable: false, 
                    className: 'no-export' 
                }
            ],
            order: [[0, 'desc']],
            pageLength: 10,
            lengthMenu: [
                [10, 25, 50, 100, 200, 500, 1000, 2000, 5000, 10000],
                [10, 25, 50, 100, 200, 500, 1000, 2000, 5000, 10000]
            ],
            pagingType: 'full_numbers',
            dom: `
                <'dt--top-section'
                    <'row'
                        <'col-sm-12 col-md-4 d-flex justify-content-md-start justify-content-center'l>
                        <'col-sm-12 col-md-4 d-flex justify-content-center'B>
                        <'col-sm-12 col-md-4 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>
                    >
                >
                <'table-responsive'tr>
                <'dt--bottom-section d-sm-flex justify-content-sm-between text-center'
                    <'dt--pages-count mb-sm-0 mb-3'i>
                    <'dt--pagination'p>
                >
            `,
            buttons: [
                {
                    extend: 'excelHtml5',
                    className: 'btn btn-sm btn-primary',
                    text: '{{ __("dash.excel") }}',
                    exportOptions: {
                        columns: ':not(.no-export)',
                        format: {
                            body: function (data, row, column, node) {
                                return $(node).find('.export-status').length ? 
                                    $(node).find('.export-status').text().trim() : 
                                    $(node).text().trim();
                            }
                        }
                    }
                },
                {
                    extend: 'print',
                    className: 'btn btn-sm btn-primary',
                    text: '{{ __("dash.print") }}',
                    autoPrint: true, 
                    exportOptions: {
                        columns: ':not(.no-export)',
                        format: {
                            body: function (data, row, column, node) {
                                return $(node).find('.export-status').length ? 
                                    $(node).find('.export-status').text().trim() : 
                                    $(node).text().trim();
                            }
                        },
                        modifier: { page: 'current' }
                    }
                }

            ],
            language: {
                url: "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
            }
        });
        
    }

    // ========== Apply Status Color ==========
    function applyStatusColor(select, statusId) {
        select.removeClass().addClass(`form-select form-select-sm change-status ${statusColors[statusId] || ''}`);
    }

    // ========== Handle Status Change ==========
    $(document).on('change', '.change-status', function () {
        const select = $(this);
        const orderId = select.data('order-id');
        const newStatusId = select.val();
        const oldStatusId = select.data('current-status');
        const url = `/admin/business_orders/${orderId}/change-status`;

        select.addClass('loading-select').prop('disabled', true);

        $.ajax({
            url: url,
            type: 'PUT',
            data: { _token: '{{ csrf_token() }}', status_id: newStatusId },
            success: function (response) {
                toastr.success(response.message || 'تم تحديث الحالة بنجاح');
                select.removeClass('loading-select').prop('disabled', false);
                select.data('current-status', newStatusId);
                applyStatusColor(select, newStatusId);
                select.addClass('border-success');
                setTimeout(() => select.removeClass('border-success'), 1200);
            },
            error: function () {
                toastr.error('فشل في تحديث الحالة');
                select.removeClass('loading-select').prop('disabled', false).val(oldStatusId);
                applyStatusColor(select, oldStatusId);
                select.addClass('border-danger');
                setTimeout(() => select.removeClass('border-danger'), 1200);
            }
        });
    });



    // ========== Submit Edit Form ==========
    $(document).on('submit', '#editBusinessOrderForm', function (e) {
        e.preventDefault();

        const form = $(this);
        const orderId = $('#edit_order_id').val();

        $.ajax({
            url: `${editOrderUrl}/${orderId}`,
            type: 'POST',
            data: form.serialize(),
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function () {
                toastr.success('تم تحديث الطلب بنجاح');
                $('#editModal').modal('hide');
                ordersTable.ajax.reload(null, false);
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const messages = Object.values(xhr.responseJSON.errors).flat();
                    toastr.error(messages.join('<br>'));
                } else {
                    toastr.error('حدث خطأ أثناء تحديث الطلب');
                    console.error(xhr.responseText);
                }
            }
        });
    });

    // ========== Fetch Customer Cars ==========
    function fetchCustomerCarsEdit(userId, selectedCarId) {
        const container = $('#edit_existingCarsContainer');
        container.html('<div class="text-muted">جاري تحميل السيارات...</div>');

        $.get(`/admin/user/${userId}/cars`, function (cars) {
            if (cars.length === 0) {
                container.html('<div class="alert alert-warning">لا توجد سيارات</div>');
                return;
            }

            let html = '<div class="row">';
            cars.forEach(car => {
                const selected = car.id == selectedCarId ? 'selected' : '';
                html += `
                    <div class="col-md-6 mb-3">
                        <div class="card car-card car-select-option shadow-sm border ${selected}" data-id="${car.id}">
                            <input type="radio" name="car_id" id="edit_car_${car.id}" value="${car.id}" class="d-none" ${selected ? 'checked' : ''}>
                            <div class="p-3 d-flex align-items-center cursor-pointer">
                                <div class="car-icon rounded-circle d-flex align-items-center justify-content-center mr-3">
                                    <i class="fas fa-car"></i>
                                </div>
                                <div><h6 class="mb-1">${car.Plate_number}</h6></div>
                            </div>
                        </div>
                    </div>`;
            });
            html += '</div>';
            container.html(html);

            $('.car-select-option').on('click', function () {
                $('.car-select-option').removeClass('selected');
                $(this).addClass('selected').find('input[type="radio"]').prop('checked', true);
            });
        }).fail(() => {
            container.html('<div class="alert alert-danger">فشل في تحميل سيارات العميل</div>');
        });
    }

    // ========== Load Branches and Floors ==========
    function loadBranchesAndFloors(projectId, branchId, floorId) {
        $('#edit_client_project_id').val(projectId);
        $('#edit_branch_id').html('<option value="">جارٍ التحميل...</option>');
        $('#edit_floor_id').html('<option value="">اختر الفرع أولاً</option>');

        $.get(`/admin/get-project-branches/${projectId}`, function (branches) {
            let branchOptions = '<option value="">{{ __("dash.choose") }}</option>';
            branches.forEach(branch => {
                branchOptions += `<option value="${branch.id}">${branch.name_ar}</option>`;
            });
            $('#edit_branch_id').html(branchOptions).val(branchId);

            $.get(`/admin/get-branch-floors/${branchId}`, function (floors) {
                let floorOptions = '<option value="">{{ __("dash.choose") }}</option>';
                floors.forEach(floor => {
                    floorOptions += `<option value="${floor.id}">${floor.name_ar}</option>`;
                });
                $('#edit_floor_id').html(floorOptions).val(floorId);
            });
        });
    }

    // ========== Document Ready ==========
    $(document).ready(function () {
        loadOrdersTable();

        $('#applyFilters, #filter_date_from, #filter_date_to, #filter_status, #filter_payment_method').on('click change', function (e) {
            e.preventDefault();
            ordersTable.ajax.reload();
        });

        $('#ordersTable').on('draw.dt', function () {
            $('.change-status').each(function () {
                applyStatusColor($(this), $(this).val());
            });
        });
    });


// ========== [ Change Team - Open Modal ] ==========
$(document).on('click', '[data-target="#changeGroupModel"]', function () {
    const orderId = $(this).data('order_id');
    const currentGroupId = parseInt($(this).data('group_id'));

    $('#edit_order_id').val(orderId);
    const groupSelect = $('#edit_group_id');

    groupSelect.html('<option value="">{{ __("dash.loading") }}</option>');

    $.get(`/admin/technician-groups/${orderId}`, function (groups) {
        groupSelect.empty().append('<option value="">{{ __("dash.choose") }}</option>');

        groups.forEach(group => {
            const selected = group.id === currentGroupId ? 'selected' : '';
            groupSelect.append(`<option value="${group.id}" ${selected}>${group.name_ar}</option>`);
        });
    }).fail(function (xhr) {
        console.error('Error loading groups:', xhr.responseText);
        toastr.error('تعذر تحميل الفرق.');
    });
});

// ========== [ Change Team - Submit Form ] ==========
$(document).on('submit', '#edit_group_form', function (e) {
    e.preventDefault();

    const orderId = $('#edit_order_id').val();
    const assignToId = $('#edit_group_id').val();
    const note = $('#edit_note').val(); // إذا عندك ملاحظة إضافية

    if (!assignToId) {
        toastr.warning('يرجى اختيار الفريق أولاً.');
        return;
    }

    $.ajax({
        url: `/admin/business-orders/${orderId}/change-group`,
        type: 'PUT',
        data: {
            _token: '{{ csrf_token() }}',
            assign_to_id: assignToId,
            note: note
        },
        success: function (res) {
            if (res.success) {
                toastr.success('تم تغيير الفريق بنجاح');
                $('#changeGroupModel').modal('hide');
                ordersTable.ajax.reload(null, false);
            } else {
                toastr.error('فشل التحديث.');
            }
        },
       error: function (xhr) {
    if (xhr.responseJSON && xhr.responseJSON.message) {
        toastr.error(xhr.responseJSON.message);

        // Highlight the problematic order row
        highlightOrderRow(orderId);
    } else {
        toastr.error('حدث خطأ أثناء تحديث الفريق.');
    }
    console.error(xhr.responseText);
}

    });
});


</script>
@endpush