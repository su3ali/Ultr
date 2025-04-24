<div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">تعديل بيانات الفرع</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data" id="demo-form-edit"
                    data-parsley-validate>
                    @csrf
                    @method('PATCH')

                    <div class="form-row">

                        {{-- قائمة المشاريع --}}
                        <div class="form-group col-md-6">
                            <label for="edit_client_project_id">{{ __('dash.project') }}</label>
                            <select name="client_project_id" id="edit_client_project_id" class="form-control" required>
                                <option value="">{{ __('dash.choose_project') }}</option>
                                @foreach($clientProjects as $project)
                                <option value="{{ $project->id }}">
                                    {{ app()->getLocale() == 'ar' ? $project->name_ar : $project->name_en }}
                                </option>
                                @endforeach
                            </select>
                            @error('client_project_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- الاسم بالعربية --}}
                        <div class="form-group col-md-6">
                            <label for="name_ar">{{ __('dash.name_ar') }}</label>
                            <input type="text" name="name_ar" id="name_ar" class="form-control"
                                placeholder="{{ __('dash.name_ar') }}" value="{{ old('name_ar') }}">
                            @error('name_ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- الاسم بالإنجليزية --}}
                        <div class="form-group col-md-6">
                            <label for="name_en">{{ __('dash.name_en') }}</label>
                            <input type="text" name="name_en" id="name_en" class="form-control"
                                placeholder="{{ __('dash.name_en') }}" value="{{ old('name_en') }}">
                            @error('name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('dash.save') }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('dash.close')
                            }}</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>