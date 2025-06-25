<div class="modal fade" id="technicianModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dash.create_technician') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('dashboard.core.technician.store') }}" method="POST"
                    enctype="multipart/form-data" id="demo-form">
                    @csrf
                    <input type="hidden" name="spec_id" value="{{ $specs->first()->id }}">
                    <input type="hidden" name="wallet_id" value="1">

                    <div class="box-body">

                        <div class="form-row mb-3">
                            <div class="form-group col-md-4">
                                <label>{{ __('dash.name') }}</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>اسم المستخدم</label>
                                <input type="text" name="user_name" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>{{ __('dash.email') }}</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.password') }}</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.password_confirmation') }}</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="form-group col-md-4">
                                <label>{{ __('dash.phone') }}</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>{{ __('dash.identity_number') }}</label>
                                <input type="text" name="identity_id" class="form-control" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label>{{ __('dash.birth_date') }}</label>
                                <input type="date" id="birth" name="birth_date" class="form-control">
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.nationality') }}</label>
                                <select name="country_id" class="form-control select2" required>
                                    @foreach ($nationalities as $key => $value)
                                    <option value="{{ $value }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ __('dash.city') }}</label>
                                <select name="city_id" class="form-control select2">
                                    {{-- <option value="">{{ __('dash.choose') }}</option> --}}
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id', $tech->city_id ?? '') == $city->id
                                        ? 'selected' : '' }}>
                                        {{ $city->title_ar }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>



                        </div>

                        {{-- <div class="form-row mb-3"> --}}

                            {{-- <div class="form-group col-md-6">
                                <label>{{ __('dash.address') }}</label>
                                <textarea name="address" class="form-control" rows="1"></textarea>
                            </div> --}}
                            {{-- </div> --}}

                        <div class="form-row mb-3">
                            <div class="form-group col-md-12">
                                <label>{{ __('dash.working_days') }}</label>
                                <select name="day_id[]" class="form-control select2" multiple>
                                    @foreach ($days as $day)
                                    <option value="{{ $day->id }}">{{ app()->getLocale() == 'ar' ? $day->name_ar :
                                        $day->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ __('dash.regions') }}</label>
                                <select name="region_ids[]" class="form-control select2" multiple>
                                    @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ app()->getLocale() == 'ar' ? $region->title_ar
                                        : $region->title_en }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ __('dash.shifts') }}</label>
                                <select name="shift_ids[]" class="form-control select2" multiple>
                                    @foreach ($shifts as $shift)
                                    <option value="{{ $shift->id }}">{{ $shift->shift_no }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>

                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.status') }}</label><br>
                                <label class="switch s-outline s-outline-info">
                                    <input type="checkbox" name="active" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="form-group col-md-6 custom-file-container" data-upload-id="mySecondImage">
                                <label>{{ __('dash.technician_image') }}
                                    <a href="javascript:void(0)" class="custom-file-container__image-clear">x</a>
                                </label>
                                <div style="display: flex">
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                            name="image">
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="col-md-2 custom-file-container__image-preview"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Technician Type -->
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold d-block">{{ __('dash.technician_type') }}</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_business" value="0"
                                        id="personalTech" checked>
                                    <label class="form-check-label" for="personalTech">{{ __('dash.personal') }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_business" value="1"
                                        id="businessTech">
                                    <label class="form-check-label" for="businessTech">{{ __('dash.business') }}</label>
                                </div>
                            </div>
                        </div>

                        <!-- Business Fields -->
                        <div id="businessFields" style="display: none;">
                            <div class="form-row mb-3">
                                <div class="form-group col-md-6">
                                    <label>{{ __('dash.project') }}</label>
                                    <select name="client_project_id" id="client_project_id"
                                        class="form-control select2">
                                        <option value="">{{ __('dash.choose') }}</option>
                                        @foreach ($clientProjects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('dash.branch') }}</label>
                                    <select name="branch_id" id="branch_id" class="form-control select2">
                                        <option value="">{{ __('dash.choose') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('dash.floors') }}</label>
                                <select name="floor_ids[]" id="floor_ids" class="form-control select2"
                                    multiple></select>
                            </div>
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

@push('style')
<style>
    /* Enhance inputs and selects */
    .form-control {
        border-radius: 8px;
        border: 1px solid #ced4da;
        transition: all 0.3s ease-in-out;
        box-shadow: none;
        font-size: 0.95rem;
        padding: 0.5rem 0.75rem;
    }

    .form-control:focus {
        border-color: #3f8efc;
        box-shadow: 0 0 0 0.15rem rgba(63, 142, 252, 0.25);
        background-color: #fff;
    }

    /* Labels */
    .form-group label {
        font-weight: 600;
        color: #2c2c2c;
        margin-bottom: 0.4rem;
        font-size: 0.9rem;
    }

    /* Spacing */
    .form-row {
        margin-bottom: 1.5rem;
    }

    /* Select2 dropdowns */
    .select2-container--default .select2-selection--single,
    .select2-container--default .select2-selection--multiple {
        border-radius: 8px !important;
        border: 1px solid #ced4da !important;
        min-height: 40px;
        padding: 4px 8px;
        font-size: 0.95rem;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100%;
        right: 10px;
    }

    /* Multiple select padding fix */
    .select2-container .select2-selection--multiple .select2-search__field {
        padding: 5px !important;
        margin-top: 5px;
    }

    /* Darker placeholder */
    ::placeholder {
        color: #999 !important;
    }
</style>
@endpush


@push('script')
<script>
    let secondUpload = new FileUploadWithPreview('mySecondImage');

    $(document).ready(function () {
        // Toggle business fields
        $('input[name="is_business"]').change(function () {
            if ($('#businessTech').is(':checked')) {
                $('#businessFields').slideDown();
            } else {
                $('#businessFields').slideUp();
            }
        });

        // Set default birth date to 25 years ago
$('#birth').val(new Date(new Date().setFullYear(new Date().getFullYear() - 25)).toISOString().split('T')[0]);


        // Load branches
        $('#client_project_id').on('change', function () {
            const projectId = $(this).val();
            $('#branch_id').html('<option value="">{{ __('dash.loading') }}</option>');
            $('#floor_ids').empty();

            if (projectId) {
                $.get(`/admin/get-project-branches/${projectId}`, function (branches) {
                    $('#branch_id').html('<option value="">{{ __('dash.choose') }}</option>');
                    $.each(branches, function (i, branch) {
                        $('#branch_id').append(`<option value="${branch.id}">${branch.name_ar}</option>`);
                    });
                });
            }
        });

        // Load floors
        $('#branch_id').on('change', function () {
            const branchId = $(this).val();
            $('#floor_ids').empty();

            if (branchId) {
                $.get(`/admin/get-branch-floors/${branchId}`, function (floors) {
                    $.each(floors, function (i, floor) {
                        $('#floor_ids').append(`<option value="${floor.id}">${floor.name_ar}</option>`);
                    });
                });
            }
        });

        // Auto generate unique email
        $('input[name="name"]').on('input', function () {
            const rawName = $(this).val().trim().toLowerCase().replace(/\s+/g, '.');
            const unique = Date.now().toString().slice(-5); // use last 5 digits of timestamp
            if (rawName.length > 2) {
                $('input[name="email"]').val(`${rawName}.${unique}@goldultra.com`);
            }
        });

        // Phone validation (Saudi format, must start with 05 and be 10 digits)
        const phoneInput = $("input[name='phone']");
        phoneInput.attr('pattern', '05\\d{8}');
        phoneInput.attr('maxlength', '10');
        phoneInput.attr('placeholder', '05xxxxxxxx');

        phoneInput.on('input', function () {
            const phone = $(this).val();
            const isValid = /^05\d{8}$/.test(phone);
            $(this).toggleClass('is-invalid', !isValid);
        });

        // Identity ID validation: must be 10 digits starting with 1, 2, or 3
        const identityInput = $("input[name='identity_id']");
        identityInput.attr('pattern', '[1-3][0-9]{9}');
        identityInput.attr('maxlength', '10');
        identityInput.attr('placeholder', '2xxxxxxxxx');

        identityInput.on('input', function () {
            const id = $(this).val();
            const isValid = /^[1-3]\d{9}$/.test(id);
            $(this).toggleClass('is-invalid', !isValid);
        });

        $('#demo-form').on('submit', function (e) {
            const phone = phoneInput.val();
            const isPhoneValid = /^05\d{8}$/.test(phone);

            const id = identityInput.val();
            const isIdValid = /^[1-3]\d{9}$/.test(id);

            if (!isPhoneValid) {
                e.preventDefault();
                phoneInput.addClass('is-invalid');
                toastr.error('رقم الجوال غير صالح، يجب أن يبدأ بـ 05 ويتكون من 10 أرقام');
            }

            if (!isIdValid) {
                e.preventDefault();
                identityInput.addClass('is-invalid');
                toastr.error('رقم الهوية غير صالح، يجب أن يبدأ بـ 1 أو 2 أو 3 ويتكون من 10 أرقام');
            }
        });

    });
</script>
@endpush