<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('dash.add_new_order') }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- Step Navigation -->
                <ul class="nav nav-pills mb-4 justify-content-center" id="stepperTabs">
                    <li class="nav-item"><a class="nav-link active" href="#step1" data-toggle="tab">1. {{
                            __('dash.customer') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#step2" data-toggle="tab">2. {{ __('dash.car') }}</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#step3" data-toggle="tab">3. {{
                            __('dash.order_details') }}</a></li>
                </ul>
                <div class="tab-content">
                    <!-- Step 1: Customer Form -->
                    @include('dashboard.business_orders.partials.customer')

                    <!-- Step 2: Car Form -->
                    @include('dashboard.business_orders.partials.car')

                    <!-- Step 3: Order Form -->
                    @include('dashboard.business_orders.partials.order')
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    let createdUserId = null;

// Phone number check and submission
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
        } else {
            toastr.info('العميل غير موجود، يرجى تعبئة البيانات');
        }
    }).fail(() => toastr.error('فشل في التحقق من العميل'));
});

$('#saveCustomer').on('click', function () {
    const phone = $('#phoneInput').val();
    if (phone.length !== 9 || !phone.startsWith('5')) {
        toastr.error('الرجاء إدخال رقم جوال صحيح مكون من 9 أرقام ويبدأ بـ 5');
        return;
    }
    $('input[name="phone"]').val('966' + phone);
    $.post('{{ route("dashboard.core.customer.store") }}', $('#createCustomerForm').serialize(), function (res) {
        createdUserId = res.user_id;
        $('#car_user_id, #order_user_id').val(createdUserId);
        $('#stepperTabs .nav-link').eq(1).tab('show');
        toastr.success("{{ __('dash.saved_successfully') }}");
    }).fail(() => toastr.error("{{ __('dash.error_occurred') }}"));
});

// Car plate check and save
// $('#checkPlateBtn').on('click', function () {
//     let plate = $('#plateInput').val().trim();
//     let userId = $('#car_user_id').val();
//     if (!plate || !userId) {
//         toastr.warning('يرجى إدخال رقم اللوحة والتأكد من اختيار العميل');
//         return;
//     }
//     $.post('{{ route("dashboard.car_client.check") }}', {_token: '{{ csrf_token() }}', user_id: userId, Plate_number: plate}, function (res) {
//         if (res.exists) {
//             $('input[name="car_id"]').val(res.car_id);
//             $('#stepperTabs .nav-link').eq(2).tab('show');
//             toastr.success('السيارة موجودة، تم الانتقال للخطوة التالية');
//         } else {
//             toastr.info('السيارة غير موجودة، يرجى إكمال البيانات');
//         }
//     }).fail(() => toastr.error('فشل في التحقق من السيارة'));
// });

$('#saveCar').on('click', function () {
    let plate = $('#plateInput').val().trim();
    let userId = $('#car_user_id').val();
    let $button = $(this);
    if (!plate || !userId) {
        toastr.warning('يرجى إدخال رقم اللوحة والتأكد من اختيار العميل');
        return;
    }
    $button.prop('disabled', true).text('جاري المعالجة...');
    $.post('{{ route("dashboard.car_client.check") }}', {_token: '{{ csrf_token() }}', user_id: userId, Plate_number: plate}, function (res) {
        if (res.exists) {
            $('input[name="car_id"]').val(res.car_id);
            $('#stepperTabs .nav-link').eq(2).tab('show');
            toastr.success('السيارة موجودة، تم الانتقال للخطوة التالية');
            $button.prop('disabled', false).text("{{ __('dash.next') }}");
        } else {
            $.post('{{ route("dashboard.car_client.store") }}', $('#createCarForm').serialize(), function (res) {
                if (res.status) {
                    $('input[name="car_id"]').val(res.car_id);
                    $('#stepperTabs .nav-link').eq(2).tab('show');
                    toastr.success(res.message || 'تم حفظ السيارة بنجاح');
                } else {
                    toastr.error('لم يتم الحفظ');
                }
                $button.prop('disabled', false).text("{{ __('dash.next') }}");
            }).fail(() => {
                toastr.error('حدث خطأ أثناء حفظ السيارة');
                $button.prop('disabled', false).text("{{ __('dash.next') }}");
            });
        }
    }).fail(() => {
        toastr.error('فشل في التحقق من السيارة');
        $button.prop('disabled', false).text("{{ __('dash.next') }}");
    });
});


//
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

// عند تغيير المشروع، نحمل الفروع
$('#client_project_id').on('change', function () {
    const projectId = $(this).val();

    $('#branch_id').html('<option value="">{{ __('dash.choose') }}</option>');
    $('#floor_id').html('<option value="">{{ __('dash.choose') }}</option>');

    if (projectId) {
        $.get(`/admin/get-project-branches/${projectId}`, function (branches) {
            if (branches.length > 0) {
                $.each(branches, function (i, branch) {
                    $('#branch_id').append(`<option value="${branch.id}">${branch.name_ar}</option>`);
                });
            }
        }).fail(function () {
            toastr.error('فشل في تحميل الفروع');
        });
    }
});

// عند تغيير الفرع، نحمل الطوابق
$('#branch_id').on('change', function () {
    const branchId = $(this).val();

    $('#floor_id').html('<option>تحميل...</option>');

    if (branchId) {
        $.get(`/admin/get-branch-floors/${branchId}`, function (floors) {
            let options = '<option value="">{{ __('dash.choose') }}</option>';
            $.each(floors, function (i, floor) {
                options += `<option value="${floor.id}">${floor.name_ar}</option>`;
            });
            $('#floor_id').html(options);
        }).fail(function () {
            toastr.error('فشل في تحميل الطوابق');
        });
    }
});



</script>
@endpush