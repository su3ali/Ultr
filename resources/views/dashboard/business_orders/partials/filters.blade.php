<div class="row mb-2 align-items-end" id="filtersRow">
    {{-- Date Range --}}


    <div class="col-md-2">
        <label for="date_from" class="small mb-1">{{ __('dash.from') }}</label>
        <div class="input-group custom-date-picker">
            <input type="text" name="date_from" class="form-control form-control-sm custom-input"
                style="background-color: #fff !important" id="filter_date_from">
            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
        </div>
    </div>

    <div class="col-md-2">
        <label for="date_to" class="small mb-1">{{ __('dash.to') }}</label>
        <div class="input-group custom-date-picker">
            <input type="text" name="date_to" class="form-control form-control-sm custom-input"
                style="background-color: #fff !important" id="filter_date_to">
            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
        </div>
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

    {{-- Clients Projects --}}
    <div class="col-md-2">
        <label class="small mb-1">{{ __('dash.clients_projects') }}</label>
        <select id="filter_client_project_id" class="form-control form-control-sm select2">
            <option value="all" selected>{{ __('dash.all') }}</option>
            @foreach ($clientProjects as $project)
            <option value="{{ $project->id }}">
                {{ app()->getLocale() === 'ar' ? $project->name_ar : $project->name_en }}
            </option>
            @endforeach
        </select>
    </div>

    {{-- Clients Projects Branches --}}
    <div class="col-md-2">
        <label class="small mb-1">{{ __('dash.branches') }}</label>
        <select id="filter_branch_id" class="form-control form-control-sm select2">
            <option value="all" selected>{{ __('dash.all') }}</option>
        </select>
    </div>



</div>

<style>
    #filtersRow {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 15px 10px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04);
    }

    #filtersRow label {
        font-weight: 600;
        font-size: 13px;
        color: #495057;
        margin-bottom: 4px;
    }

    #filtersRow .form-control-sm {
        border-radius: 8px;
        border: 1px solid #d1d5db;
        font-size: 14px;
        height: 36px;
        padding: 6px 10px;
        background-color: #fdfdfd;
        color: #111;
        transition: all 0.2s ease;
    }

    #filtersRow .form-control-sm:focus {
        border-color: #2b68a6;
        box-shadow: 0 0 0 2px rgba(43, 104, 166, 0.15);
        background-color: #fff;
    }

    /* Date picker */
    .custom-date-picker {
        position: relative;
    }

    .custom-date-picker .form-control {
        padding-right: 2.2rem;
    }

    .custom-date-picker .input-group-text {
        position: absolute;
        right: 0.5rem;
        top: 50%;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        padding: 0;
        margin: 0;
        pointer-events: none;
    }

    .custom-date-picker .input-group-text i {
        color: #2b68a6;
        font-size: 15px;
    }

    /* Select2 cleanup */
    #filtersRow .select2-container--default .select2-selection--single {
        height: 36px !important;
        padding: 4px 10px;
        border-radius: 8px;
        border: 1px solid #d1d5db;
        background-color: #fdfdfd;
    }

    #filtersRow .select2-selection__rendered {
        line-height: 28px !important;
        font-size: 14px;
        color: #333;
    }

    #filtersRow .select2-selection__arrow {
        top: 5px !important;
    }
</style>