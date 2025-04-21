<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('dash.add_new_order') }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills mb-4 justify-content-center" id="stepperTabs">
                    <li class="nav-item"><a class="nav-link active" href="#step1" data-toggle="tab">1. {{
                            __('dash.customer') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#step2" data-toggle="tab">2. {{ __('dash.car') }}</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#step3" data-toggle="tab">3. {{
                            __('dash.order_details') }}</a></li>
                </ul>
                <div class="tab-content">
                    @include('dashboard.business_orders.partials.customer')
                    @include('dashboard.business_orders.partials.car')
                    @include('dashboard.business_orders.partials.order')
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
<script>
    const storeCustomerUrl = "{{ route('dashboard.core.customer.store') }}"; 
    const applyCouponUrl = "{{ route('dashboard.orders.applyCoupon') }}";
    const csrfToken = '{{ csrf_token() }}';
    let createdUserId = null;

    $('#checkPhoneBtn').on('click', function () {
        const phone = $('#phoneInput').val();
        if (phone.length !== 9 || !phone.startsWith('5')) {
            toastr.warning('يرجى إدخال رقم صحيح يبدأ بـ 5 ويتكون من 9 أرقام');
            return;
        }
        const fullPhone = '966' + phone;
        $.post('{{ route("dashboard.customer.check") }}', {_token: '{{ csrf_token() }}', phone: fullPhone}, function (res) {
            if (res.exists) {
                createdUserId = res.user_id;
                $('#car_user_id, #order_user_id').val(createdUserId);
                $('#stepperTabs .nav-link').eq(1).tab('show');
                toastr.success('العميل موجود، تم الانتقال للخطوة التالية');
                fetchCustomerCars(createdUserId);
            } else {
                toastr.info('العميل غير موجود، يرجى تعبئة البيانات');
            }
        }).fail(() => toastr.error('فشل في التحقق من العميل'));
    });

    $(document).ready(function () {
        $('#saveCustomer').on('click', function () {
            const phone = $('#phoneInput').val().trim();
            const fullPhone = '966' + phone;
            const $btn = $(this);

            if (phone.length !== 9 || !phone.startsWith('5')) {
                toastr.error('الرجاء إدخال رقم جوال صحيح مكون من 9 أرقام ويبدأ بـ 5');
                return;
            }

            $('input[name="phone"]').val(fullPhone);

            $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span> جاري الحفظ...');

            $.post(storeCustomerUrl, $('#createCustomerForm').serialize())
                .done(function (res) {
                    debugger;
                    const userId = res.user_id;
                    $('#car_user_id, #order_user_id').val(userId);
                    createdUserId = userId;
                    fetchCustomerCars(userId);
                    $('#stepperTabs .nav-link').eq(1).tab('show');
                    toastr.success('تم حفظ العميل بنجاح');
                })
                .fail(function (xhr) {
                    if (xhr.status === 422 && xhr.responseJSON?.errors) {
                        debugger;
                        let messages = [];
                        $.each(xhr.responseJSON.errors, function (field, messagesArray) {
                            messages.push(messagesArray[0]);
                        });
                        toastr.error(messages.join('<br>'));
                    } else {
                        console.error(xhr.responseText);
                        toastr.error('حدث خطأ أثناء حفظ العميل');
                    }
                })
                .always(function () {
                    $btn.prop('disabled', false).html('التالي');
                });
        });
    });

    function fetchCustomerCars(userId) {
        $.get(`/admin/user/${userId}/cars`, function (cars) {
            handleCustomerCars(cars);
        }).fail(() => {
            toastr.error('فشل في جلب سيارات العميل');
        });
    }

    function handleCustomerCars(cars = []) {
    const container = $('#existingCarsContainer');
    let html = `<label class="mb-3 font-weight-bold d-block">اختر سيارة:</label>`;
    html += `<div class="row">`;

    if (cars.length > 0) {
        cars.forEach((car) => {
            html += `
                <div class="col-md-6 mb-3">
                    <div class="card car-card car-select-option shadow-sm border" data-id="${car.id}">
                        <input type="radio" name="car_id" id="car_${car.id}" value="${car.id}" class="d-none">
                        <div class="p-3 d-flex align-items-center cursor-pointer">
                            <div class="car-icon rounded-circle d-flex align-items-center justify-content-center mr-3">
                                <i class="fas fa-car"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">${car.Plate_number || 'لوحة غير متوفرة'}</h6>
                                
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        html += `</div>`;
        container.html(html).show();
    } else {
        container.html('<div class="alert alert-warning">لا توجد سيارات مسجلة لهذا العميل.</div>').show();
    }
}





// زر الانتقال إلى الخطوة 3 بعد اختيار السيارة
$(document).on('click', '#goToStep3', function () {
    const selectedCar = $('input[name="car_id"]:checked').val();

    if (!selectedCar) {
        toastr.warning('يرجى اختيار سيارة أولاً');
        return;
    }

    // حفظ قيمة car_id داخل الحقل المخفي في فورم الطلب
    $('input[name="car_id"]').val(selectedCar);

    // الانتقال للخطوة 3
    $('#stepperTabs .nav-link').eq(2).tab('show');
});


// عند تغيير المشروع، نحمل الفروع
$('#client_project_id').on('change', function () {
    const projectId = $(this).val();
    $('#branch_id').html('<option value="">جارٍ التحميل...</option>');
    $('#floor_id').html('<option value="">اختر الفرع أولاً</option>');

    if (projectId) {
        $.get(`/admin/get-project-branches/${projectId}`, function (branches) {
            let branchOptions = '<option value="">{{ __("dash.choose") }}</option>';
            $.each(branches, function (i, branch) {
                branchOptions += `<option value="${branch.id}">${branch.name_ar}</option>`;
            });
            $('#branch_id').html(branchOptions);
        }).fail(() => {
            toastr.error('فشل في تحميل الفروع');
            $('#branch_id').html('<option value="">فشل في التحميل</option>');
        });
    }
});

// عند تغيير الفرع، نحمل الطوابق
$('#branch_id').on('change', function () {
    const branchId = $(this).val();
    $('#floor_id').html('<option>جارٍ التحميل...</option>');

    if (branchId) {
        $.get(`/admin/get-branch-floors/${branchId}`, function (floors) {
            let floorOptions = '<option value="">{{ __("dash.choose") }}</option>';
            $.each(floors, function (i, floor) {
                floorOptions += `<option value="${floor.id}">${floor.name_ar}</option>`;
            });
            $('#floor_id').html(floorOptions);
        }).fail(() => {
            toastr.error('فشل في تحميل الطوابق');
            $('#floor_id').html('<option>فشل في التحميل</option>');
        });
    }
});


// عند تغيير المشروع أو الخدمة، جلب السعر
function fetchServicePrice() {
    const projectId = $('#client_project_id').val();
    const serviceId = $('#serviceSelect').val();

    console.log("Sending to backend:", { projectId, serviceId });

   
    if (projectId && serviceId) {
        $.ajax({
            url: '{{ route('dashboard.get.service.price') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                client_project_id: projectId,
                service_id: serviceId
            },
            success: function (res) {
                debugger;

                console.log("Response:", res);
                if (res.price !== undefined && res.price !== null) {
                    $('#servicePriceInput').val(res.price);
                } else {
                    $('#servicePriceInput').val('');
                }
            },
            error: function (xhr) {
                debugger;

                console.error("Error:", xhr.responseText);
                toastr.error('فشل في جلب سعر الخدمة');
                $('#servicePriceInput').val('');
            }
        });
    } else {
        $('#servicePriceInput').val('');
    }
}

// Always fetch price when service or project changes
$('#client_project_id, #serviceSelect').on('change', fetchServicePrice);

$('#createModal').on('shown.bs.modal', function () {
    fetchServicePrice();
});


// ربط تغيير المشروع أو الخدمة بالكود أعلاه
$('#client_project_id, #serviceSelect').on('change', fetchServicePrice);

// جلب السعر عند فتح المودال أيضاً
$('#createModal').on('shown.bs.modal', function () {
    fetchServicePrice();
});


$('#createModal').on('shown.bs.modal', function () {
    $('.modal-backdrop:not(:first)').remove();
});

$(document).on('change', 'input[name="car_id"]', function () {
    $('.car-option').removeClass('active');
    $(this).closest('.car-option').addClass('active');
});

$(document).on('click', '.car-select-option', function () {
    const selectedCard = $(this);
    const input = selectedCard.find('input[type="radio"]');

    $('input[name="car_id"]').prop('checked', false);
    $('.car-select-option').removeClass('selected');

    input.prop('checked', true);
    selectedCard.addClass('selected');
});

    // السكريبتات الأخرى هنا...

    $(document).ready(function () {
        $('#applyCouponBtn').on('click', function () {
            const code = $('#couponCodeInput').val().trim();
            const serviceId = $('#serviceSelect').val();
            const userId = $('#order_user_id').val();
            const originalPrice = parseFloat($('#servicePriceInput').val());

            if (!code) {
                toastr.warning('يرجى إدخال كود الخصم');
                return;
            }

            if (!serviceId || !userId || isNaN(originalPrice)) {
                toastr.warning('يرجى تحديد الخدمة أولاً');
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
                    $('#servicePriceInput').val(res.sub_total);
                    toastr.success(res.message || 'تم تطبيق الخصم بنجاح');
                },
                error: function (xhr) {
                    let message = 'فشل في تطبيق الكوبون';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        message = xhr.responseJSON.message;
                    }
                    toastr.error(message);
                }
            });
        });
    });


</script>
<Style>
    .modal-backdrop {
        opacity: 0.3 !important;
        z-index: 1030 !important;
    }

    .car-select-option {
        border: 1px solid #ddd;
        border-radius: 10px;
        transition: 0.3s;
        cursor: pointer;
    }

    .car-select-option:hover {
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
    }

    .car-select-option.selected {
        border: 2px solid #007bff;
        background-color: #eaf4ff;
        box-shadow: 0 0 15px rgba(0, 123, 255, 0.3);
    }

    .car-icon {
        width: 50px;
        height: 50px;
        background-color: #007bff;
        color: white;
        font-size: 20px;
    }

    .cursor-pointer {
        cursor: pointer;
    }
</Style>


@endpush