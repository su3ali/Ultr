

<div class="tab-pane fade show active" id="step1">
    <form id="createCustomerForm">
        @csrf

        {{-- Search phone --}}
        <div id="phoneSearchSection" class="form-group">
            <label class="font-weight-medium">{{ __('dash.phone') }}</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light border-right-0">+966</span>
                </div>
                <input type="text" id="phoneInput" class="form-control border-left-0" placeholder="5xxxxxxxx"
                    maxlength="9">
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-primary" id="checkPhoneBtn">بحث</button>
                </div>
            </div>
            <small class="form-text text-muted">رقم الجوال يبدأ بـ 5 ويتكون من 9 أرقام</small>
        </div>



        {{-- Additional customer fields, hidden initially --}}
        <div id="customerFields" style="display: none;">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="font-weight-medium">{{ __('dash.first name') }}</label>
                    <input type="text" name="first_name" class="form-control" placeholder="{{ __('dash.first name') }}"
                        required>
                </div>

                <div class="form-group col-md-6">
                    <label class="font-weight-medium">{{ __('dash.last name') }}</label>
                    <input type="text" name="last_name" class="form-control" placeholder="{{ __('dash.last name') }}"
                        required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="font-weight-medium">{{ __('dash.city') }} <span class="text-danger">*</span></label>
                    <select name="city_id" class="form-control select2" required>
                        <option value="">{{ __('dash.choose') }}</option>
                        @foreach($cities as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <input type="hidden" id="car_user_id" name="car_user_id">
        <input type="hidden" id="order_user_id" name="order_user_id">
        <input type="hidden" name="phone">

        <div class="text-right mt-4">
            <button type="button" id="saveCustomer" class="btn btn-success" style="display: none;">
                {{ __('dash.next') }} <i class="fas fa-arrow-left ml-1"></i>
            </button>
        </div>
    </form>
</div>