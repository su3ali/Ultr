<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="editBusinessOrderForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="order_id" id="edit_order_id">

            <input type="hidden" name="car_id">
            <input type="hidden" id="edit_order_user_id" name="user_id">


            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('dash.edit_order') }}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>

                <div class="modal-body">
                    <ul class="nav nav-pills mb-4 justify-content-center" id="editStepperTabs">
                        <li class="nav-item"><a class="nav-link active" href="#edit_step1" data-toggle="tab">1. {{
                                __('dash.customer') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#edit_step2" data-toggle="tab">2. {{
                                __('dash.car') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#edit_step3" data-toggle="tab">3. {{
                                __('dash.order_details') }}</a></li>
                    </ul>

                    <div class="tab-content">
                        {{-- Step 1 --}}
                        <div class="tab-pane fade show active" id="edit_step1">
                            <div class="form-group">
                                <label>{{ __('dash.customer_name') }}</label>
                                <input type="text" id="editCustomerName" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>{{ __('dash.phone') }}</label>
                                <input type="text" id="editPhoneInput" class="form-control" readonly>
                            </div>
                        </div>

                        {{-- Step 2 --}}
                        <div class="tab-pane fade" id="edit_step2">
                            <div id="edit_existingCarsContainer"></div>
                            <div class="form-group text-right mt-3">
                                <button type="button" id="editGoToStep3" class="btn btn-primary">التالي <i
                                        class="fas fa-arrow-right ml-1"></i></button>
                            </div>
                        </div>

                        {{-- Step 3 --}}
                        <div class="tab-pane fade" id="edit_step3">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>{{ __('dash.project') }}</label>
                                    <select id="edit_client_project_id" name="client_project_id" class="form-control">
                                        <option value="">{{ __('dash.choose') }}</option>
                                        @foreach($projects as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('dash.branch') }}</label>
                                    <select name="branch_id" id="edit_branch_id" class="form-control">
                                        <option value="">{{ __('dash.choose') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>{{ __('dash.floor') }}</label>
                                <select name="floor_id" id="edit_floor_id" class="form-control">
                                    <option value="">{{ __('dash.choose') }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>{{ __('dash.service') }}</label>
                                <select id="edit_serviceSelect" class="form-control" name="service_id">
                                    <option value="">{{ __('dash.choose') }}</option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id }}" data-price="{{ $service->price }}">
                                        {{ app()->getLocale() === 'ar' ? $service->title_ar : $service->title_en }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>{{ __('dash.price') }}</label>
                                <input type="text" class="form-control" id="edit_servicePriceInput" name="price"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label>{{ __('dash.coupon_code') }}</label>
                                <div class="input-group">
                                    <input type="text" id="edit_couponCodeInput" class="form-control"
                                        placeholder="أدخل الكوبون">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-info"
                                            id="edit_applyCouponBtn">تطبيق</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success"><i class="fas fa-save mr-1"></i> {{
                                    __('dash.save_changes') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>