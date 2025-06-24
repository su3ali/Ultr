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
<style>
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

    /* Enhance phone input and button */
    #phoneSearchSection .input-group {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    #phoneSearchSection .input-group-text {
        background-color: #f1f1f1;
        font-weight: bold;
        border: none;
        color: #333;
    }

    #phoneSearchSection input#phoneInput {
        border: none;
        padding: 10px 12px;
        font-size: 15px;
        box-shadow: none;
    }

    #phoneSearchSection .btn-outline-primary {
        border: none;
        background-color: #007bff;
        color: white !important;
        transition: all 0.2s ease-in-out;
        font-weight: 600;
        padding: 8px 20px;
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(0, 123, 255, 0.2);
        display: flex;
        align-items: center;
        gap: 6px;
    }

    #phoneSearchSection .btn-outline-primary:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        transform: translateY(-1px);
    }
</style>
@push('script')
<script>
    const storeCustomerUrl = "{{ route('dashboard.core.customer.store') }}";
    const checkCustomerUrl = "{{ route('dashboard.customer.check') }}";
    const applyCouponUrl = "{{ route('dashboard.orders.applyCoupon') }}";
    const csrfToken = "{{ csrf_token() }}";
    let createdUserId = null;

    $(document).ready(function () {
        // Check phone and fetch customer
        $('#checkPhoneBtn').on('click', function () {
            const phone = $('#phoneInput').val().trim();
            if (!/^5\d{8}$/.test(phone)) {
                toastr.warning("يرجى إدخال رقم صحيح يبدأ بـ 5 ويتكون من 9 أرقام");
                return;
            }

            const fullPhone = '966' + phone;

            $.post(checkCustomerUrl, { _token: csrfToken, phone: fullPhone }, function (res) {
                if (res.exists) {
                    createdUserId = res.user_id;
                    $('#car_user_id, #order_user_id').val(createdUserId);
                    $('#stepperTabs .nav-link').eq(1).tab('show');
                    toastr.success('العميل موجود، تم الانتقال للخطوة التالية');
                    fetchCustomerCars(createdUserId);
                } else {
                    $('input[name="phone"]').val(fullPhone);
                    $('#phoneSearchSection').hide();
                    $('#customerFields').fadeIn().css('display', 'block');
                    $('#saveCustomer').fadeIn().css('display', 'inline-block');
                    toastr.info('العميل غير موجود، يرجى إكمال البيانات');
                }
            }).fail(() => {
                toastr.error("فشل في التحقق من العميل");
            });
        });

        // Save new customer
        $('#saveCustomer').on('click', function () {
            const $btn = $(this);
            $btn.prop("disabled", true).html('<span class="spinner-border spinner-border-sm"></span> جاري الحفظ...');

            $.post(storeCustomerUrl, $('#createCustomerForm').serialize())
                .done(function (res) {
                    createdUserId = res.user_id;
                    $('#car_user_id, #order_user_id').val(createdUserId);
                    $('#stepperTabs .nav-link').eq(1).tab('show');
                    fetchCustomerCars(createdUserId);
                    toastr.success(res.message || 'تم حفظ العميل بنجاح');
                })
                .fail(function (xhr) {
                    const messages = xhr.responseJSON?.errors
                        ? Object.values(xhr.responseJSON.errors).map(msg => msg[0])
                        : ['حدث خطأ أثناء حفظ العميل'];
                    toastr.error(messages.join('<br>'));
                })
                .always(() => {
                    $btn.prop("disabled", false).html("التالي");
                });
        });

        // Apply coupon
        $('#applyCouponBtn').on('click', function () {
            const code = $('#couponCodeInput').val().trim();
            const serviceId = $('#serviceSelect').val();
            const userId = $('#order_user_id').val();
            const originalPrice = parseFloat($('#servicePriceInput').val());

            if (!code) return toastr.warning('يرجى إدخال كود الخصم');
            if (!serviceId || !userId || isNaN(originalPrice)) return toastr.warning('يرجى تحديد الخدمة أولاً');

            $.post(applyCouponUrl, {
                _token: csrfToken, code, user_id: userId, service_id: serviceId, price: originalPrice
            }, function (res) {
                $('#servicePriceInput').val(res.sub_total);
                toastr.success(res.message || 'تم تطبيق الخصم بنجاح');
            }).fail(function (xhr) {
                const message = xhr.responseJSON?.message || 'فشل في تطبيق الكوبون';
                toastr.error(message);
            });
        });

        // Move to step 3 after selecting car
        $(document).on('click', '#goToStep3', function () {
            const selectedCar = $('input[name="car_id"]:checked').val();
            if (!selectedCar) return toastr.warning('يرجى اختيار سيارة أولاً');
            $('input[name="car_id"]').val(selectedCar);
            $('#stepperTabs .nav-link').eq(2).tab('show');
        });

        // Fetch branches by project
        $('#client_project_id').on('change', function () {
            const projectId = $(this).val();
            $('#branch_id').html('<option value="">جارٍ التحميل...</option>');
            $('#floor_id').html('<option value="">اختر الفرع أولاً</option>');

            if (projectId) {
                $.get(`/admin/get-project-branches/${projectId}`, function (branches) {
                    let options = '<option value="">{{ __("dash.choose") }}</option>';
                    branches.forEach(branch => {
                        options += `<option value="${branch.id}">${branch.name_ar}</option>`;
                    });
                    $('#branch_id').html(options);
                }).fail(() => {
                    toastr.error('فشل في تحميل الفروع');
                    $('#branch_id').html('<option value="">فشل في التحميل</option>');
                });
            }
        });

        // Fetch floors by branch
        $('#branch_id').on('change', function () {
            const branchId = $(this).val();
            $('#floor_id').html('<option>جارٍ التحميل...</option>');

            if (branchId) {
                $.get(`/admin/get-branch-floors/${branchId}`, function (floors) {
                    let options = '<option value="">{{ __("dash.choose") }}</option>';
                    floors.forEach(floor => {
                        options += `<option value="${floor.id}">${floor.name_ar}</option>`;
                    });
                    $('#floor_id').html(options);
                }).fail(() => {
                    toastr.error('فشل في تحميل الطوابق');
                    $('#floor_id').html('<option>فشل في التحميل</option>');
                });
            }
        });

        // Fetch service price
        $('#client_project_id, #serviceSelect').on('change', fetchServicePrice);
        $('#createModal').on('shown.bs.modal', function () {
            fetchServicePrice();
            $('.modal-backdrop:not(:first)').remove();
        });
    });

    function fetchServicePrice() {
        const projectId = $('#client_project_id').val();
        const serviceId = $('#serviceSelect').val();

        if (projectId && serviceId) {
            $.post('{{ route('dashboard.get.service.price') }}', {
                _token: csrfToken,
                client_project_id: projectId,
                service_id: serviceId
            }, function (res) {
                $('#servicePriceInput').val(res.price ?? '');
            }).fail(function () {
                toastr.error('فشل في جلب سعر الخدمة');
                $('#servicePriceInput').val('');
            });
        } else {
            $('#servicePriceInput').val('');
        }
    }

    function fetchCustomerCars(userId) {
        $.get(`/admin/user/${userId}/cars`, function (cars) {
            if (cars.length > 0) {
                renderUserCars(cars);
            } else {
                showCreateCarOption();
            }
        }).fail(() => {
            toastr.error("فشل في جلب سيارات العميل");
        });
    }

    function renderUserCars(cars) {
        let html = `<label class="mb-2 font-weight-bold d-block">اختر سيارة:</label>`;
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
            `
            ;
        });

        $("#existingCarsContainer").html(html).show();
        $("#createCarSection").hide();

        $('input[name="car_id"]').on("change", function () {
            $(".car-radio-wrapper").removeClass("bg-selected");
            $(this).closest(".car-radio-wrapper").addClass("bg-selected");
        });
    }

    function showCreateCarOption() {
        $("#existingCarsContainer").html(
            '<div class="alert alert-warning">لا توجد سيارات مسجلة لهذا العميل.</div>'
        ).show();
        $("#createCarSection").show();
    }

    // Visual selection for car cards
    $(document).on('click', '.car-select-option', function () {
        const selectedCard = $(this);
        const input = selectedCard.find('input[type="radio"]');
        $('input[name="car_id"]').prop('checked', false);
        $('.car-select-option').removeClass('selected');
        input.prop('checked', true);
        selectedCard.addClass('selected');
    });
</script>
@endpush