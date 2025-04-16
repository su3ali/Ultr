<!-- Modal with 3-step form: Customer -> Car -> Order -->
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
                    <div class="tab-pane fade show active" id="step1">
                        <form id="createCustomerForm">
                            @csrf
                            <div class="form-group">
                                <label>{{ __('dash.first name') }}</label>
                                <input type="text" name="first_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>{{ __('dash.last name') }}</label>
                                <input type="text" name="last_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>{{ __('dash.phone') }}</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>{{ __('dash.email') }}</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{ __('dash.city') }}</label>
                                <select name="city_id" class="form-control">
                                    @foreach($cities as $key => $city)
                                    <option value="{{ $key }}">{{ $city }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">

                                <button type="button" id="saveCustomer" class="btn btn-primary">{{ __('dash.next')
                                    }}</button>
                            </div>
                        </form>
                    </div>

                    <!-- Step 2: Car Form -->
                    <div class="tab-pane fade" id="step2">
                        <form id="createCarForm">
                            @csrf
                            <input type="hidden" name="user_id" id="car_user_id">
                            <div class="form-group">
                                <label>نوع السيارة</label>
                                <select name="type_id" class="form-control">
                                    @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>موديل السيارة</label>
                                <select name="model_id" class="form-control">
                                    @foreach($models as $model)
                                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>اللون</label>
                                <input type="text" name="color" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>رقم اللوحة</label>
                                <input type="text" name="Plate_number" class="form-control">
                            </div>
                            <div class="modal-footer">

                                <button type="button" id="saveCar" class="btn btn-primary">{{ __('dash.next')
                                    }}</button>
                            </div>
                        </form>
                    </div>

                    <!-- Step 3: Order Form -->
                    <div class="tab-pane fade" id="step3">
                        <form method="POST" action="{{ route('dashboard.business_orders.store') }}">
                            @csrf
                            <input type="hidden" name="user_id" id="order_user_id">

                            <!-- Business Related Inputs -->
                            <div id="businessFields">
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-6">
                                        <label for="client_project_id">{{ __('dash.project') }}</label>
                                        <select id="client_project_id" name="client_project_id"
                                            class="form-control select2">
                                            <option value="">{{ __('dash.choose') }}</option>
                                            @foreach($clientProjects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="branch_id">{{ __('dash.branch') }}</label>
                                        <select id="branch_id" name="branch_id" class="form-control select2">
                                            <option value="">{{ __('dash.choose') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row mb-3">
                                    <div class="form-group col-md-12">
                                        <label for="floor_id">{{ __('dash.floor') }}</label>
                                        <select id="floor_id" name="floor_id" class="form-control select2">
                                            <option value="">{{ __('dash.choose') }}</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <!-- Service Selection -->
                            <div class="form-group">
                                <label>{{ __('dash.service') }}</label>
                                <select name="service_id" class="form-control" id="serviceSelect">
                                    @foreach($services as $service)
                                    <option value="{{ $service->id }}" data-price="{{ $service->price }}">
                                        {{ $service->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>{{ __('dash.price') }}</label>
                                <input type="number" name="price" class="form-control" id="servicePriceInput" readonly>

                            </div>

                            <div class="form-group">
                                <label>{{ __('dash.notes') }}</label>
                                <textarea name="notes" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">{{ __('dash.save') }}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@push('script')
<script>
    let createdUserId = null;

$('#saveCustomer').on('click', function () {
    $.ajax({
        url: '{{ route("dashboard.core.customer.store") }}',
        method: 'POST',
        data: $('#createCustomerForm').serialize(),
        success: function (res) {
            createdUserId = res.user_id;
            $('#car_user_id').val(createdUserId);
            $('#order_user_id').val(createdUserId);
            $('#stepperTabs .nav-link').eq(1).tab('show');
            toastr.success("{{ __('dash.saved_successfully') }}");
        },
        error: function () {
            toastr.error("{{ __('dash.error_occurred') }}");
        }
    });
});

$('#saveCar').on('click', function () {
    $.ajax({
        url: '{{ route("dashboard.car_client.store") }}',
        method: 'POST',
        data: $('#createCarForm').serialize(),
        success: function (res) {
            debugger;
            if (res.status) {
                const carId = res.car_id;
                // مثلاً تقدر تستخدم carId في hidden input للطلب
                $('input[name="car_id"]').val(carId);

                $('#stepperTabs .nav-link').eq(2).tab('show');
                toastr.success(res.message || "تم حفظ السيارة بنجاح");
            }
        },
        error: function () {
            toastr.error("حدث خطأ أثناء حفظ السيارة");
        }
    });
});


    $(document).on('change', '#serviceSelect', function () {
        const price = $(this).find(':selected').data('price');
        $('input[name="price"]').val(price);
    });

    //  Trigger once on load if needed
    $('#serviceSelect').trigger('change');


// Load branches when project changes
$('#client_project_id').on('change', function () {
    const projectId = $(this).val();

    $('#branch_id').html('<option value="">{{ __('dash.choose') }}</option>');
    $('#floor_ids').empty();

    if (projectId) {
        $.get(`/admin/get-project-branches/${projectId}`, function (branches) {
            $.each(branches, function (i, branch) {
                $('#branch_id').append(`<option value="${branch.id}">${branch.name_ar}</option>`);
            });
        }).fail(function () {
            toastr.error('فشل في تحميل الفروع');
        });
    }
});


// Load floors when branch changes
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


// function fetchServicePrice() {
//     const projectId = $('#client_project_id').val();
//     const serviceId = $('#serviceSelect').val();

//     console.log("Sending to backend:", { projectId, serviceId });

//     debugger;

//     if (projectId && serviceId) {
//         $.ajax({
//             url: '{{ route('dashboard.get.service.price') }}',
//             method: 'POST',
//             data: {
//                 _token: '{{ csrf_token() }}',
//                 client_project_id: projectId,
//                 service_id: serviceId
//             },
//             success: function (res) {
//                 console.log("Response:", res);
//                 if (res.price !== undefined && res.price !== null) {
//                     $('#servicePriceInput').val(res.price);
//                 } else {
//                     $('#servicePriceInput').val('');
//                 }
//             },
//             error: function (xhr) {
//                 console.error("Error:", xhr.responseText);
//                 toastr.error('فشل في جلب سعر الخدمة');
//                 $('#servicePriceInput').val('');
//             }
//         });
//     } else {
//         $('#servicePriceInput').val('');
//     }
// }

</script>
@endpush