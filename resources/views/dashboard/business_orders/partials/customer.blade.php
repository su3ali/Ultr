<div class="tab-pane fade show active" id="step1">
    <form id="createCustomerForm">
        @csrf

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

        <div class="form-group">
            <label class="font-weight-medium">{{ __('dash.phone') }}</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light border-right-0">+966</span>
                </div>
                <input type="text" name="phone" id="phoneInput" class="form-control border-left-0"
                    placeholder="5xxxxxxxx" maxlength="9">
            </div>
            <small class="form-text text-muted">رقم الجوال يبدأ بـ 5 ويتكون من 9 أرقام</small>
        </div>

        <div class="form-group">
            <label class="font-weight-medium">{{ __('dash.email') }}</label>
            <input type="email" name="email" class="form-control" placeholder="example@email.com">
        </div>

        <div class="form-group">
            <label class="font-weight-medium">{{ __('dash.city') }}</label>
            <select name="city_id" class="form-control select2">
                <option value="">{{ __('dash.choose') }}</option>
                @foreach($cities as $key => $city)
                <option value="{{ $key }}">{{ $city }}</option>
                @endforeach
            </select>
        </div>

        <div class="modal-footer px-0">
            <button type="button" id="saveCustomer" class="btn btn-primary btn-block shadow-sm">
                <i class="fas fa-arrow-right ml-1"></i> {{ __('dash.next') }}
            </button>
        </div>
    </form>
</div>