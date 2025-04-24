<div class="tab-pane fade" id="step3">
    <form method="POST" action="{{ route('dashboard.business_orders.store') }}">
        @csrf
        <input type="hidden" name="user_id" id="order_user_id">
        <input type="hidden" name="car_id">

        <div class="card mb-3 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">{{ __('dash.order_details') }}</h5>
            </div>
            <div class="card-body">
                <!-- Project and Branch -->
                <div class="form-row">
                    <input type="hidden" name="user_id" id="order_user_id">
                    <input type="hidden" name="car_id">

                    <div class="form-group col-md-6">
                        <label for="client_project_id" class="font-weight-bold">
                            {{ __('dash.project') }}
                        </label>
                        <select id="client_project_id" name="client_project_id" class="form-control select2" required>
                            <option value="">{{ __('dash.choose') }}</option>
                            @foreach($clientProjects as $project)
                            <option value="{{ $project->id }}">
                                {{ app()->getLocale() === 'ar' ? $project->name_ar : $project->name_en }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="branch_id" class="font-weight-bold">
                            {{ __('dash.branch') }}
                        </label>
                        <select id="branch_id" name="branch_id" class="form-control select2" required>
                            <option value="">{{ __('dash.choose') }}</option>
                        </select>
                    </div>
                </div>

                <!-- Floor -->
                <div class="form-group">
                    <label for="floor_id" class="font-weight-bold">
                        {{ __('dash.floor') }}
                    </label>
                    <select id="floor_id" name="floor_id" class="form-control select2" required>
                        <option value="">{{ __('dash.choose') }}</option>
                    </select>
                </div>

                <!-- Service + Price -->
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="serviceSelect" class="font-weight-bold">
                            {{ __('dash.service') }}
                        </label>
                        <select name="service_id" id="serviceSelect" class="form-control" required>
                            <option value="">{{ __('dash.choose') }}</option>
                            @foreach($services as $service)
                            <option value="{{ $service->id }}" data-price="{{ $service->price }}">
                                {{ app()->getLocale() === 'ar' ? $service->title_ar : $service->title_en }}
                            </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="servicePriceInput" class="font-weight-bold">
                            {{ __('dash.price') }}
                        </label>
                        <input type="number" name="price" id="servicePriceInput" class="form-control" readonly
                            placeholder="{{ __('dash.price_placeholder') }}">
                    </div>
                </div>

                <!-- Coupon Code -->
                <div class="form-group">
                    <label class="font-weight-bold">كود الخصم</label>
                    <div class="input-group">
                        <input type="text" id="couponCodeInput" class="form-control" placeholder="أدخل الكوبون">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="applyCouponBtn">تطبيق</button>
                        </div>
                    </div>
                </div>


                <!-- Payment Method -->
                <div class="form-group">
                    <label for="paymentSelect" class="font-weight-bold">
                        {{ __('dash.payment_method') }}
                    </label>
                    <select name="payment_method_id" id="paymentSelect" class="form-control">
                        <option value="">{{ __('dash.choose') }}</option>
                        @foreach($paymentMethods as $method)
                        <option value="{{ $method->id }}">
                            {{ app()->getLocale() === 'ar' ? $method->name_ar : $method->name_en }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Notes -->
                <div class="form-group">
                    <label for="orderNotes" class="font-weight-bold">
                        {{ __('dash.notes') }}
                    </label>
                    <textarea name="notes" id="orderNotes" class="form-control" rows="3"
                        placeholder="{{ __('dash.optional') }}"></textarea>
                </div>
            </div>
        </div>

        <!-- Submit -->
        <div class="form-group text-right">
            <button type="submit" id="submitOrderBtn" class="btn btn-success">
                <i class="fas fa-save mr-1"></i>
                <span class="btn-text">{{ __('dash.save') }}</span>
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
            </button>
        </div>




    </form>
</div>

@push('script')
<script>
    $(document).ready(function () {
    $('form').on('submit', function () {
        const $btn = $('#submitOrderBtn');
        $btn.prop('disabled', true);
        $btn.find('.btn-text').addClass('d-none');
        $btn.find('.spinner-border').removeClass('d-none');
    });
});

</script>
@endpush