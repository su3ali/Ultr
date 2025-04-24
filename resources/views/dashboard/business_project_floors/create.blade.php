<div class="modal fade" id="createFloorModal" tabindex="-1" role="dialog" aria-labelledby="createFloorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createFloorModalLabel">إضافة طابق جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('dashboard.business-project-floors.store') }}" method="POST"
                    class="form-horizontal" enctype="multipart/form-data" id="create-floor-form" data-parsley-validate>
                    @csrf

                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="create_project_id">{{ __('dash.select_project') }}</label>
                            <select class="form-control" id="create_project_id">
                                <option value="">{{ __('dash.select_project') }}</option>
                                @foreach($projects as $project)
                                <option value="{{ $project->id }}">
                                    {{ app()->getLocale() == 'ar' ? $project->name_ar : $project->name_en }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="branch_id">{{ __('dash.select_branch') }}</label>
                            <select name="branch_id" class="form-control" id="branch_id" required>
                                <option value="">{{ __('dash.select_branch') }}</option>
                            </select>
                            @error('branch_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group col-md-6">
                            <label for="floor_name_ar">{{ __('dash.name_ar') }}</label>
                            <input type="text" name="name_ar" class="form-control" id="floor_name_ar"
                                placeholder="{{ __('dash.name_ar') }}" required>
                            @error('name_ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="floor_name_en">{{ __('dash.name_en') }}</label>
                            <input type="text" name="name_en" class="form-control" id="floor_name_en"
                                placeholder="{{ __('dash.name_en') }}" required>
                            @error('name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="floor_number">رقم الطابق</label>
                            <input type="number" name="floor_number" class="form-control" id="floor_number"
                                placeholder="مثال: 1">
                            @error('floor_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('dash.save') }}</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('dash.close')
                            }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>