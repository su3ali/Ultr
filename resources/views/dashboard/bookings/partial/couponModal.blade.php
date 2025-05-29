<!-- Coupon Modal -->
<div class="modal fade" id="couponModal" tabindex="-1" aria-labelledby="couponModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <form id="applyCouponForm" class="w-100">
            @csrf
            <div class="modal-content custom-modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header bg-light border-bottom-0 rounded-top-4 px-4 py-3">
                    <h5 class="modal-title text-primary fw-bold">🎁 {{ __('dash.apply_coupon') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body custom-modal-body px-4 py-4 bg-white">
                    <input type="hidden" name="order_id" id="coupon_order_id">
                    <input type="hidden" name="booking_id" id="coupon_booking_id">

                    <!-- Coupon Type -->
                    <div class="mb-4">
                        <label class="fw-bold mb-3 d-block">اختر نوع الكوبون</label>
                        <div class="row g-3 text-center">
                            <div class="col-6">
                                <input type="radio" class="btn-check coupon-type" name="coupon_type" id="typeClient"
                                    value="client" checked>
                                <label class="btn btn-coupon w-100 py-3 shadow-sm rounded-3" for="typeClient">
                                    <div class="fw-bold">عميل</div>
                                </label>
                            </div>
                            <div class="col-6">
                                <input type="radio" class="btn-check coupon-type" name="coupon_type" id="typeEmployee"
                                    value="employee">
                                <label class="btn btn-coupon w-100 py-3 shadow-sm rounded-3" for="typeEmployee">
                                    <div class="fw-bold">موظف</div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Client Coupons -->
                    <div class="form-group mt-3 coupon-select-group" id="client_coupon_group">
                        <label for="client_coupon_id" class="form-label fw-semibold"> {{ __('dash.clients_coupons')
                            }}</label>
                        <select class="form-control rounded-3" name="client_coupon_id" id="client_coupon_id">
                            <option value=""> {{ __('dash.select') }}</option>
                            @foreach($clientCoupons as $id => $code)
                            <option value="{{ $id }}">{{ $code }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Employee Coupons -->
                    <div class="form-group mt-3 coupon-select-group d-none" id="employee_coupon_group">
                        <label for="employee_coupon_id" class="form-label fw-semibold">{{
                            __('dash.employees_coupons')}}</label>
                        <select class="form-control rounded-3" name="employee_coupon_id" id="employee_coupon_id">
                            <option value=""> {{ __('dash.select') }}</option>
                            @foreach($employeeCoupons as $id => $code)
                            <option value="{{ $id }}">{{ $code }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Hidden fallback -->
                    <input type="hidden" name="force_apply" value="0">

                    <!-- Force Apply Checkbox -->
                    <div
                        class="form-check mt-4 px-4 py-3 bg-light rounded-4 border border-secondary-subtle shadow-sm d-flex align-items-center gap-3">
                        <input class="form-check-input" type="checkbox" id="forceApplyCoupon" name="force_apply"
                            value="1" style="width: 1.25rem; height: 1.25rem; cursor: pointer;">
                        <label class="form-check-label fw-semibold text-dark mb-0" for="forceApplyCoupon"
                            style="cursor: pointer;">
                            {{ __('dash.use_the_coupon_anyway') }}
                        </label>
                    </div>
                </div>

                <div
                    class="modal-footer bg-light border-top-0 rounded-bottom-4 px-4 py-3 d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-light fw-semibold" data-bs-dismiss="modal">
                        {{ __('dash.close') }}
                    </button>
                    <button type="submit" class="btn btn-success fw-bold px-4">
                        تطبيق الكوبون
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .form-check:hover {
        background-color: #f8f9fa;
        box-shadow: 0 0 0.35rem rgba(0, 0, 0, 0.05);
    }


    .btn-coupon {
        background-color: #fff;
        /* Bootstrap secondary */
        color: #000;
        border: 2px solid #2B68A6;
        font-weight: 600;
    }

    /* When selected */
    .btn-check:checked+.btn-coupon {
        background-color: #2B68A6;
        color: #fff !important;
        border: 2px solid #2B68A6;
    }

    .modal-dialog.modal-xl {
        max-width: 650px;
        width: 90%;
        margin: 2rem auto;
    }

    .custom-modal-content {
        border-radius: 16px;
        min-height: 40vh;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        display: flex;
        flex-direction: column;
    }

    .custom-modal-body {
        padding: 2rem;
        flex-grow: 1;
        background-color: #fff;
    }

    .form-control {
        border-radius: 0.5rem;
        padding: 0.6rem 0.9rem;
        font-size: 1rem;
    }

    .btn-check:checked+.btn {
        background-color: #2B68A6;
        color: #fff !important;
        border-color: #2B68A6;
    }

    .btn-check:checked+.btn.btn-outline-warning {
        background-color: #2B68A6;
        color: #fff !important;
        border-color: #fff;
    }

    /* Select2 custom styling */
    .select2-container--default .select2-selection--single {
        height: 44px;
        border-radius: 0.45rem;
        padding: 6px 12px;
        border: 1px solid #ced4da;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 28px;
        font-size: 1rem;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 10px;
    }

    .select2-container .select2-dropdown {
        border-radius: 0.45rem;
    }

    .select2-container {
        width: 100% !important;
    }
</style>

<script>
    $(document).ready(function () {
        $('#client_coupon_id').select2({
            dropdownParent: $('#couponModal'),
            width: '100%',
            placeholder: "اختر كوبون عميل"
        });

        $('#employee_coupon_id').select2({
            dropdownParent: $('#couponModal'),
            width: '100%',
            placeholder: "اختر كوبون موظف"
        });
    });
</script>