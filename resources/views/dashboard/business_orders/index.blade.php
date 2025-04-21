@extends('dashboard.layout.layout')

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


                <table id="ordersTable" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('dash.customer_name') }}</th>
                            <th>{{ __('dash.phone') }}</th>
                            <th>{{ __('dash.car') }}</th>
                            <th>{{ __('dash.service') }}</th>
                            <th>{{ __('dash.price') }}</th>
                            <th>{{ __('dash.technician') }}</th>
                            <th>{{ __('dash.payment_method') }}</th>
                            <th>{{ __('dash.status') }}</th>
                            <th>{{ __('dash.date') }}</th>
                            <th class="no-content">{{ __('dash.actions') }}</th>
                        </tr>
                    </thead>
                </table>
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
<script>
    const editOrderUrl = "{{ url('admin/business_orders') }}";

    

   // ========== [1] Declare Global Table Variable ==========
let ordersTable;

// ========== [2] Function to Load DataTable ==========
function loadOrdersTable() {
    ordersTable = $('#ordersTable').DataTable({
        processing: true,
        serverSide: true,
        destroy: true, // مهم عند إعادة التحميل لتفادي التكرار
        ajax: {
            url: '{{ route("dashboard.business_orders.index") }}',
            data: function (d) {
                d.date_from        = $('#filter_date_from').val();
                d.date_to          = $('#filter_date_to').val();
                d.status           = $('#filter_status').val();
                d.payment_method   = $('#filter_payment_method').val();
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
            { data: 'controll', name: 'controll', orderable: false, searchable: false }
        ],
        language: {
            url: "{{ app()->getLocale() === 'ar'
                ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json'
                : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
        }
    });
}

// ========== [3] Initialize on Document Ready ==========
$(document).ready(function () {
    loadOrdersTable();

    // فلترة بالزر
    $('#applyFilters').on('click', function (e) {
        e.preventDefault(); // تأكد من منع أي سلوك افتراضي
        ordersTable.ajax.reload();
    });

    // (اختياري) فلترة تلقائية عند التغيير بدون زر
    // $('#filter_date_from, #filter_date_to, #filter_status, #filter_payment_method').on('change', function () {
    //     ordersTable.ajax.reload();
    // });
});

$('#filter_date_from, #filter_date_to, #filter_status, #filter_payment_method').on('change', function () {
    ordersTable.ajax.reload();
});



    // ========== [2] Open Edit Modal ==========
    function openEditModal(orderId) {
    $.get(`${editOrderUrl}/${orderId}/edit`, function (order) {
        $('#edit_order_user_id').val(order.user_id);

        $('#edit_order_id').val(order.id);
        $('#editCustomerName').val(order.user.full_name);
        $('#editPhoneInput').val(order.user.phone);

        // Set service first (this will be used when fetching price)
        $('#edit_serviceSelect').val(order.service_id);

        // Set project
        $('#edit_client_project_id').val(String(order.client_project_id));

        // Fetch and update price based on both project and service
        fetchProjectServicePrice(order.client_project_id, order.service_id);

        // Load related branches and floors
        loadBranchesAndFloors(order.client_project_id, order.branch_id, order.floor_id);

        // Set car list
        fetchCustomerCarsEdit(order.user_id, order.car_id);

        // Finally, show modal
        $('#editModal').modal('show');
    }).fail(() => toastr.error('فشل في تحميل بيانات الطلب'));
}


    // ========== [3] Submit Edit Form ==========
    $(document).on('submit', '#editBusinessOrderForm', function (e) {
        e.preventDefault();

        const form = $(this);
        const orderId = $('#edit_order_id').val();
        const url = `${editOrderUrl}/${orderId}`;
        const formData = form.serialize();

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                success: function (response) {
                    debugger;
                console.log('Updated Order:', response.order); // 👈 This will show the order in console

                toastr.success('تم تحديث الطلب بنجاح');
                $('#editModal').modal('hide');
                $('#ordersTable').DataTable().ajax.reload(null, false);

                // Example: Use it in UI
                // $('#orderPreviewName').text(response.order.user.first_name + ' ' + response.order.user.last_name);
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

    // ========== [4] Fetch and Show Customer Cars ==========
    function fetchCustomerCarsEdit(userId, selectedCarId) {
        const container = $('#edit_existingCarsContainer');
        container.html('<div class="text-muted">جاري تحميل السيارات...</div>');

        $.get(`/admin/user/${userId}/cars`, function (cars) {
            if (cars.length === 0) {
                return container.html('<div class="alert alert-warning">لا توجد سيارات</div>');
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
                                <div>
                                    <h6 class="mb-1">${car.Plate_number}</h6>
                                </div>
                            </div>
                        </div>
                    </div>`;
            });
            html += '</div>';
            container.html(html);

            $('.car-select-option').on('click', function () {
                $('.car-select-option').removeClass('selected');
                $(this).addClass('selected');
                $(this).find('input[type="radio"]').prop('checked', true);
            });
        }).fail(() => {
            container.html('<div class="alert alert-danger">فشل في تحميل سيارات العميل</div>');
        });
    }

    // ========== [5] Load Branches and Floors ==========
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

    $('#edit_serviceSelect, #edit_client_project_id').on('change', function () {
    const projectId = $('#edit_client_project_id').val();
    const serviceId = $('#edit_serviceSelect').val();
    fetchProjectServicePrice(projectId, serviceId);
});


    // ========== [6] Manual Change: Project ==========
    $('#edit_client_project_id').on('change', function () {
        const projectId = $(this).val();

        $('#edit_branch_id').html('<option value="">جارٍ التحميل...</option>');
        $('#edit_floor_id').html('<option value="">اختر الفرع أولاً</option>');

        if (projectId) {
            $.get(`/admin/get-project-branches/${projectId}`, function (branches) {
                let options = '<option value="">{{ __("dash.choose") }}</option>';
                branches.forEach(branch => {
                    options += `<option value="${branch.id}">${branch.name_ar}</option>`;
                });

                $('#edit_branch_id').html(options);
            });
        }
    });

    // ========== [7] Manual Change: Branch ==========
    $('#edit_branch_id').on('change', function () {
        const branchId = $(this).val();

        $('#edit_floor_id').html('<option value="">جارٍ التحميل...</option>');

        if (branchId) {
            $.get(`/admin/get-branch-floors/${branchId}`, function (floors) {
                let options = '<option value="">{{ __("dash.choose") }}</option>';
                floors.forEach(floor => {
                    options += `<option value="${floor.id}">${floor.name_ar}</option>`;
                });

                $('#edit_floor_id').html(options);
            });
        }
    });

    function fetchProjectServicePrice(projectId, serviceId) {
    if (!projectId || !serviceId) return;

    $.post("{{ route('dashboard.get.service.price') }}", {
        _token: '{{ csrf_token() }}',
        client_project_id: projectId,
        service_id: serviceId
    }, function (res) {
        debugger;
        $('#edit_servicePriceInput').val(res.price);
    }).fail(() => {
        $('#edit_servicePriceInput').val('');
        toastr.error('فشل في تحميل السعر');
    });
}

// Trigger price change dynamically when service or project changes
$(document).on('change', '#edit_client_project_id, #edit_serviceSelect', function () {
    const projectId = $('#edit_client_project_id').val();
    const serviceId = $('#edit_serviceSelect').val();
    fetchProjectServicePrice(projectId, serviceId);
});

$(document).ready(function () {
    $('#edit_applyCouponBtn').on('click', function () {
        debugger;
        const code = $('#edit_couponCodeInput').val().trim();
        const serviceId = $('#edit_serviceSelect').val();
        const userId = $('#edit_order_user_id').val();
        const originalPrice = parseFloat($('#edit_servicePriceInput').val());

        console.log('Selected Service:', serviceId); // debug

        // Reset feedback
        $('#edit_couponCodeInput').removeClass('is-valid is-invalid');
        $('#edit_couponSuccess').addClass('d-none');
        $('#edit_couponFail').addClass('d-none');
        $('#edit_serviceSelect').removeClass('is-invalid');
        $('#edit_serviceSelectError').addClass('d-none');

        // Validate service ID using parseInt
        if (!parseInt(serviceId)) {
            toastr.warning('يرجى تحديد الخدمة أولاً');
            $('#edit_serviceSelect').addClass('is-invalid');
            $('#edit_serviceSelectError').removeClass('d-none');
            return;
        }

        if (!code) {
            toastr.warning('يرجى إدخال كود الخصم');
            return;
        }

        if (!userId || isNaN(originalPrice)) {
            toastr.warning('البيانات ناقصة. الرجاء التأكد من تحديد المستخدم والخدمة والسعر.');
            return;
        }

        $.ajax({
            url: applyCouponUrl,
            method: 'POST',
            data: {
                _token: csrfToken,
                code: code,
                user_id: userId,
                service_id: serviceId,
                price: originalPrice
            },
            success: function (res) {
                $('#edit_servicePriceInput').val(res.sub_total);
                toastr.success(res.message || 'تم تطبيق الخصم بنجاح');

                $('#edit_couponCodeInput').addClass('is-valid');
                $('#edit_couponSuccess').removeClass('d-none');
            },
            error: function (xhr) {
                let message = 'فشل في تطبيق الكوبون';
                if (xhr.responseJSON?.message) {
                    message = xhr.responseJSON.message;
                }

                toastr.error(message);
                $('#edit_couponCodeInput').addClass('is-invalid');
                $('#edit_couponFail').removeClass('d-none');
            }
        });
    });
});


$(document).on('click', '[data-target="#changeGroupModel"]', function () {
    const orderId = $(this).data('order_id');
    const currentGroupId = parseInt($(this).data('group_id'));

    // خزّن orderId داخل الحقل المخفي
    $('#edit_order_id').val(orderId);

    // باقي الكود نفسه
    if (orderId) {
        $.get(`/admin/technician-groups/${orderId}`, function(groups) {
            const groupSelect = $('#edit_group_id');
            groupSelect.empty().append('<option value="">اختر</option>');

            groups.forEach(group => {
                const selected = group.id === currentGroupId ? 'selected' : '';
                groupSelect.append(`<option value="${group.id}" ${selected}>${group.name_ar}</option>`);
            });
        }).fail(function(xhr) {
            console.error('Error loading groups:', xhr.responseText);
            toastr.error('تعذر تحميل الفرق التابعة للفني');
        });
    }
});


$(document).on('submit', '#edit_group_form', function (e) {
    e.preventDefault();

    const form = $(this);
    const orderId = $('#edit_order_id').val();;
    const url = `/admin/business-orders/${orderId}/change-group`;   
    const formData = form.serialize();

    $.ajax({
        url: url,
        type: 'PUT',
        data: formData,
        success: function (res) {
            toastr.success('تم تحديث الفريق بنجاح');
            $('#changeGroupModel').modal('hide');
        },
        error: function (xhr) {
            toastr.error('حدث خطأ أثناء الحفظ');
            console.error(xhr.responseText);
        }
    });
});






</script>
@endpush