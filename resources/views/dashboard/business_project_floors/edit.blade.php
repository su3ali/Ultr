<div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">تعديل بيانات الطابق</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" action="" id="demo-form-edit" data-parsley-validate>
                    @csrf
                    @method('PATCH')

                    <div class="form-row">

                        {{-- اختيار المشروع --}}
                        <div class="form-group col-md-6">
                            <label for="edit_project_id">{{ __('dash.select_project') }}</label>
                            <select class="form-control" id="edit_project_id">
                                <option value="">{{ __('dash.select_project') }}</option>
                                @foreach($projects as $project)
                                <option value="{{ $project->id }}">
                                    {{ app()->getLocale() == 'ar' ? $project->name_ar : $project->name_en }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- اختيار الفرع المرتبط بالمشروع --}}
                        <div class="form-group col-md-6">
                            <label for="edit_branch_id">{{ __('dash.branch') }}</label>
                            <select name="branch_id" id="edit_branch_id" class="form-control" required>
                                <option value="">{{ __('dash.select_branch') }}</option>
                                {{-- سيتم تعبئته ديناميكيًا --}}
                            </select>
                            @error('branch_id')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="edit_name_ar">{{ __('dash.name_ar') }}</label>
                            <input type="text" name="name_ar" id="edit_name_ar" class="form-control"
                                placeholder="{{ __('dash.name_ar') }}">
                            @error('name_ar')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="edit_name_en">{{ __('dash.name_en') }}</label>
                            <input type="text" name="name_en" id="edit_name_en" class="form-control"
                                placeholder="{{ __('dash.name_en') }}">
                            @error('name_en')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="edit_floor_number">رقم الطابق</label>
                            <input type="number" name="floor_number" id="edit_floor_number" class="form-control">
                            @error('floor_number')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="edit_active">{{ __('dash.status') }}</label>
                            <select name="active" id="edit_active" class="form-control">
                                <option value="1">{{ __('dash.active') }}</option>
                                <option value="0">{{ __('dash.inactive') }}</option>
                            </select>
                            @error('active')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('dash.save') }}</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('dash.close') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
