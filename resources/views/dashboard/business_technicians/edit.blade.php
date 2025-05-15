<div class="modal fade" id="editTechModel" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('dash.edit_technician') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data" id="edit_tech_form" data-parsley-validate>
                    @csrf
                    {!! method_field('PUT') !!}
                    <input type="hidden" name="tech_id" id="tech_id">

                    <div class="box-body">
                        <!-- Name, Username, Email -->
                        <div class="form-row mb-3">
                            <div class="form-group col-md-4">
                                <label>{{ __('dash.name') }}</label>
                                <input required type="text" name="name" class="form-control" id="edit_name" placeholder="{{ __('dash.name') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>{{ __('dash.phone') }}</label>
                                <input required type="text" name="user_name" class="form-control" id="edit_user_name" placeholder="اسم المستخدم">
                            </div>
                            <div class="form-group col-md-4">
                                <label>{{ __('dash.email') }}</label>
                                <input type="email" name="email" class="form-control" id="edit_email" placeholder="{{ __('dash.email') }}">
                            </div>
                        </div>

                        <!-- Password, Password Confirmation -->
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.password') }}</label>
                                <input type="password" name="password" class="form-control" placeholder="{{ __('dash.password') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.password_confirmation') }}</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('dash.password_confirmation') }}">
                            </div>
                        </div>

                        <!-- Phone, Specialization -->
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.phone') }}</label>
                                <input required type="text" name="phone" class="form-control" id="edit_phone" placeholder="{{ __('dash.phone') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.specialization') }}</label>
                                <select id="edit_spec" class="select2 form-control" name="spec_id">
                                    <option selected disabled>{{ __('dash.choose') }}</option>
                                    @foreach ($specs as $spec)
                                    <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Nationality, Identity -->
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.nationality') }}</label>
                                <select required id="edit_country_id" class="select2 form-control" name="country_id">
                                    @foreach ($nationalities as $key => $nationality)
                                    <option value="{{ $nationality }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.identity_number') }}</label>
                                <input required type="text" name="identity_id" class="form-control" id="edit_identity_id" placeholder="{{ __('dash.identity_number') }}">
                            </div>
                        </div>

                        <!-- Birth Date, Wallet -->
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.birth_date') }}</label>
                                <input required id="edit_birth" name="birth_date" type="date" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.wallet') }}</label>
                                <select required id="edit_wallet" class="select2 form-control" name="wallet_id">
                                    <option disabled>{{ __('dash.choose') }}</option>
                                    <option value="1">wallet</option>
                                </select>
                            </div>
                        </div>

                        <!-- Image Upload and Address -->
                        <div class="form-row mb-3">
                            <div class="col-md-6 custom-file-container form-group" data-upload-id="editImage">
                                <label>{{ __('dash.upload') }} <a href="javascript:void(0)" class="custom-file-container__image-clear">x</a></label>
                                <div style="display: flex">
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="image">
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="col-md-2 custom-file-container__image-preview"></div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.address') }}</label>
                                <textarea required name="address" class="form-control" id="edit_address" rows="3" placeholder="{{ __('dash.address') }}"></textarea>
                            </div>
                        </div>

                        <!-- Group, Working Days -->
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.group') }}</label>
                                <select id="edit_group" class="select2 form-control" name="group_id">
                                    <option selected disabled>{{ __('dash.choose') }}</option>
                                    @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.working_days') }}</label>
                                <select id="edit_day_id" name="day_id[]" class="form-control select2" multiple>
                                    <option disabled>{{ __('dash.choose') }}</option>
                                    @foreach ($days as $day)
                                    <option value="{{ $day->id }}">{{ app()->getLocale() == 'ar' ? $day->name_ar : $day->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Active Status -->
                        <div class="form-group col-md-6">
                            <label>{{ __('dash.status') }}</label>
                            <label class="switch s-outline s-outline-info d-block">
                                <input type="checkbox" name="active" id="edit_status">
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <!-- Technician Type -->
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold d-block mb-2">{{ __('dash.technician_type') }}</label>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="is_business" id="edit_personalTech" value="0">
                                    <label class="form-check-label" for="edit_personalTech">
                                        <i class="fas fa-user mr-1"></i> {{ __('dash.personal') }}
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_business" id="edit_businessTech" value="1">
                                    <label class="form-check-label" for="edit_businessTech">
                                        <i class="fas fa-building mr-1"></i> {{ __('dash.business') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Business Fields -->
                        <div id="editBusinessFields" style="display: none;">
                            <div class="form-row mb-3">
                                <div class="form-group col-md-6">
                                    <label>{{ __('dash.project') }}</label>
                                    <select id="edit_client_project_id" name="client_project_id" class="form-control select2">
                                        <option value="">{{ __('dash.choose') }}</option>
                                        @foreach($clientProjects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('dash.branch') }}</label>
                                    <select id="edit_branch_id" name="branch_id" class="form-control select2">
                                        <option value="">{{ __('dash.choose') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="form-group col-md-12">
                                    <label>{{ __('dash.floors') }}</label>
                                    <select id="edit_floor_ids" name="floor_ids[]" class="form-control select2" multiple></select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('dash.save') }}</button>
                        <button class="btn" data-dismiss="modal">{{ __('dash.close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    let editImage = new FileUploadWithPreview('editImage');

    $(document).ready(function () {
        $('input[name="is_business"]').change(function () {
            if ($('#edit_businessTech').is(':checked')) {
                $('#editBusinessFields').slideDown();
            } else {
                $('#editBusinessFields').slideUp();
            }
        });

        $('#edit_client_project_id').on('change', function () {
            const projectId = $(this).val();
            $('#edit_branch_id').html('<option value="">{{ __('dash.loading') }}</option>');
            $('#edit_floor_ids').empty();

            if (projectId) {
                $.get(`/admin/get-project-branches/${projectId}`, function (branches) {
                    $('#edit_branch_id').html('<option value="">{{ __('dash.choose') }}</option>');
                    $.each(branches, function (i, branch) {
                        $('#edit_branch_id').append(`<option value="${branch.id}">${branch.name_ar}</option>`);
                    });
                });
            }
        });

        $('#edit_branch_id').on('change', function () {
            const branchId = $(this).val();
            $('#edit_floor_ids').empty();

            if (branchId) {
                $.get(`/admin/get-branch-floors/${branchId}`, function (floors) {
                    $.each(floors, function (i, floor) {
                        $('#edit_floor_ids').append(`<option value="${floor.id}">${floor.name_ar}</option>`);
                    });
                });
            }
        });
    });
</script>
@endpush
