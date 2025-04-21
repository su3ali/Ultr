<div class="row mb-2 align-items-end" id="filtersRow">
    {{-- Date Range --}}
    <div class="col-md-2">
        <label class="small mb-1">{{ __('dash.from') }}</label>
        <input type="date" name="date_from" id="filter_date_from" class="form-control form-control-sm" step="1">
    </div>
    <div class="col-md-2">
        <label class="small mb-1">{{ __('dash.to') }}</label>
        <input type="date" name="date_to" id="filter_date_to" class="form-control form-control-sm" step="1">
    </div>

    {{-- Status --}}
    <div class="col-md-2">
        <label class="small mb-1">{{ __('dash.status') }}</label>
        <select id="filter_status" class="form-control form-control-sm select2">
            <option value="all" selected>{{ __('dash.all') }}</option>
            @foreach ($statuses as $id => $status)
            <option value="{{ $id }}">{{ $status }}</option>
            @endforeach
        </select>
    </div>

    {{-- Payment Method --}}
    <div class="col-md-2">
        <label class="small mb-1">{{ __('dash.payment_method') }}</label>
        <select id="filter_payment_method" class="form-control form-control-sm select2">
            <option value="all" selected>{{ __('dash.all') }}</option>
            @foreach ($payment_methods as $id => $method)
            <option value="{{ $id }}">{{ $method }}</option>
            @endforeach
        </select>
    </div>


</div>