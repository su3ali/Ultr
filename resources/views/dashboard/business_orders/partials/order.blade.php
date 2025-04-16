<div class="tab-pane fade" id="step3">
    <form method="POST" action="{{ route('dashboard.business_orders.store') }}">
        @csrf
        <input type="hidden" name="user_id" id="order_user_id">
        <input type="hidden" name="car_id">

        <!-- Project Selection -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="client_project_id">{{ __('dash.project') }}</label>
                <select id="client_project_id" name="client_project_id" class="form-control select2" required>
                    <option value="">{{ __('dash.choose') }}</option>
                    @foreach($clientProjects as $project)
                    <option value="{{ $project->id }}">{{ $project->name_ar }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="branch_id">{{ __('dash.branch') }}</label>
                <select id="branch_id" name="branch_id" class="form-control select2" required>
                    <option value="">{{ __('dash.choose') }}</option>
                </select>
            </div>
        </div>

        <!-- Floor -->
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="floor_id">{{ __('dash.floor') }}</label>
                <select id="floor_id" name="floor_id" class="form-control select2" required>
                    <option value="">{{ __('dash.choose') }}</option>
                </select>
            </div>
        </div>

        <!-- Service & Price -->
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="serviceSelect">{{ __('dash.service') }}</label>
                <select name="service_id" class="form-control" id="serviceSelect" required>
                    <option value="">{{ __('dash.choose') }}</option>
                    @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="servicePriceInput">{{ __('dash.price') }}</label>
                <input type="number" name="price" id="servicePriceInput" class="form-control" readonly
                    placeholder="0.00">
            </div>
        </div>

        <!-- Payment -->
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="paymentSelect">{{ __('dash.payment_method') }}</label>
                <select name="payment_method_id" class="form-control" id="paymentSelect">
                    <option value="">{{ __('dash.choose') }}</option>
                    @foreach($paymentMethods as $method)
                    <option value="{{ $method->id }}">
                        {{ app()->getLocale() == 'ar' ? $method->name_ar : $method->name_en }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Notes -->
        <div class="form-group">
            <label for="orderNotes">{{ __('dash.notes') }}</label>
            <textarea name="notes" id="orderNotes" class="form-control" rows="3"
                placeholder="{{ __('dash.optional') }}"></textarea>
        </div>

        <!-- Submit -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-save mr-1"></i> {{ __('dash.save') }}
            </button>
        </div>
    </form>
</div>