<style>
    #existingCarsContainer .form-check {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 10px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    #existingCarsContainer .form-check:hover {
        background: #e2e6ea;
    }

    #existingCarsContainer .form-check+.form-check {
        margin-top: 8px;
    }

    #createCarSection p {
        font-size: 14px;
    }

    .bg-selected {
        background-color: #e2f0d9 !important;
        /* لون أخضر فاتح */
        border: 1px solid #28a745;
        border-radius: 5px;
        padding: 5px;
    }

    .car-select-option.selected {
        border: 2px solid #28a745;
        background-color: #e2f9e1;
    }

    .car-icon {
        width: 50px;
        height: 50px;
        background-color: #007bff;
        color: white;
        font-size: 20px;
    }
</style>

<div class="tab-pane fade" id="step2">
    <form id="createCarForm">
        @csrf
        <input type="hidden" name="user_id" id="car_user_id">


        {{-- زر إضافة سيارة --}}
        <div id="addCarButtonWrapper" class="text-center mb-3">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#createCarModal"
                data-backdrop="false">
                <i class="fas fa-plus"></i> {{ __('dash.add_car') }}
            </button>
        </div>

        {{-- قائمة السيارات --}}
        <div id="existingCarsContainer" class="mb-3">
            <!-- سيتم تعبئته تلقائيًا عبر JavaScript -->
        </div>


        {{-- زر التالي --}}
        <div class="text-right mt-4">
            <button type="button" id="goToStep3" class="btn btn-success">
                {{ __('dash.next') }} <i class="fas fa-arrow-left ml-1"></i>
            </button>
        </div>
    </form>
</div>

{{-- مودال إنشاء السيارة بدون خلفية إضافية --}}
@include('dashboard.business_orders.partials.car_modal')

@push('script')
<script>
    $(document).ready(function () {
        const carModal = $('#createCarModal');
        const carForm = $('#modalCreateCarForm');
        const csrfToken = '{{ csrf_token() }}';

        // ========== [1] Save Car via AJAX ==========
        $('#saveCar').on('click', function () {
            const $btn = $(this);
            $btn.prop('disabled', true).html(
                '<span class="spinner-border spinner-border-sm mr-1"></span> جاري الحفظ...'
            );

            $.ajax({
                url: '{{ route("dashboard.car_client.store") }}', // adjust route if needed
                method: 'POST',
                data: carForm.serialize(),
                success: function (response) {
                    toastr.success('تم إضافة السيارة بنجاح');

                    // Close modal
                    carModal.modal('hide');

                    // Reset form
                    carForm[0].reset();

                    // Fetch updated cars list
                    fetchCustomerCars($('#car_user_id').val());

                    // Optional: select the new car visually
                    setTimeout(() => {
                        if (response.car_id) {
                            const carItem = $(`#car_${response.car_id}`);
                            carItem.find('input[type=radio]').prop('checked', true);
                            carItem.addClass('selected');
                        }
                    }, 500);
                },
                error: function (xhr) {
                    toastr.error('حدث خطأ أثناء إضافة السيارة');
                    console.error(xhr.responseText);
                },
                complete: function () {
                    $btn.prop('disabled', false).text('حفظ');
                }
            });
        });

        // ========== [2] Reset form when modal opens ==========
        carModal.on('shown.bs.modal', function () {
            carForm[0].reset();
        });
    });
</script>
@endpush