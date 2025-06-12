<div class="col-md-12 mb-3">
    <div class="row align-items-end g-2">

        {{-- Date Label --}}
        <div class="col-md-1">
            <label>{{ __('dash.date') }}</label>
        </div>

        {{-- From Date --}}
        <div class="col-md-2">
            <label>{{ __('dash.from') }}</label>
            <input type="date" name="date" class="form-control date" step="1">
        </div>

        {{-- To Date --}}
        <div class="col-md-2">
            <label>{{ __('dash.to') }}</label>
            <input type="date" name="date2" class="form-control date2" step="1">
        </div>

        {{-- Zone Filter --}}
        <div class="col-md-3">
            <label>{{ __('dash.zone') }}</label>
            <select class="form-control zone_filter select2">
                <option value="all">{{ __('dash.all') }}</option>
                @foreach ($zones as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Status Filter --}}
        <div class="col-md-3">
            <label>{{ __('dash.status') }}</label>
            <select class="form-control status_filter select2" name="status_filter">
                <option value="all" selected>{{ __('dash.all') }}</option>
                @foreach ($visitsStatuses as $id => $status)
                <option value="{{ $id }}">{{ $status }}</option>
                @endforeach
            </select>
        </div>

    </div>
</div>