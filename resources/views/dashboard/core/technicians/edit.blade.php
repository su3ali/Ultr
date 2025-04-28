<div class="modal fade" id="technicianModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dash.create_technician') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.core.technician.store') }}" method="post" class="form-horizontal"
                    enctype="multipart/form-data" id="demo-form" data-parsley-validate="">
                    @csrf
                    <div class="box-body">

                        {{-- Name / Username / Email --}}
                        <div class="form-row mb-3">
                            <div class="form-group col-md-4">
                                <label>{{ __('dash.name') }}</label>
                                <input required type="text" name="name" class="form-control"
                                    placeholder="{{ __('dash.name') }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label>اسم المستخدم</label>
                                <input required type="text" name="user_name" class="form-control"
                                    placeholder="اسم المستخدم">
                            </div>

                            <div class="form-group col-md-4">
                                <label>{{ __('dash.email') }}</label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="{{ __('dash.email') }}">
                            </div>
                        </div>

                        {{-- Password / Password Confirmation --}}
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.password') }}</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="{{ __('dash.password') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.password_confirmation') }}</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="{{ __('dash.password_confirmation') }}">
                            </div>
                        </div>

                        {{-- Phone / Specialization --}}
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.phone') }}</label>
                                <input required type="text" name="phone" class="form-control"
                                    placeholder="{{ __('dash.phone') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ __('dash.specialization') }}</label>
                                <select class="select2 form-control pt-1" name="spec_id">
                                    <option selected disabled>{{ __('dash.choose') }}</option>
                                    @foreach ($specs as $spec)
                                    <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Nationality / Identity --}}
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.nationality') }}</label>
                                <select required class="select2 form-control pt-1" name="country_id">
                                    @foreach ($nationalities as $key => $nationality)
                                    <option value="{{ $nationality }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ __('dash.identity_number') }}</label>
                                <input required type="text" name="identity_id" class="form-control"
                                    placeholder="{{ __('dash.identity_number') }}">
                            </div>
                        </div>

                        {{-- Birth / Wallet --}}
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.birth_date') }}</label>
                                <input required name="birth_date" type="date" class="form-control datepicker"
                                    data-date-format="dd/mm/yyyy">
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ __('dash.wallet') }}</label>
                                <select required class="select2 form-control pt-1" name="wallet_id">
                                    <option disabled>{{ __('dash.choose') }}</option>
                                    <option value="1">wallet</option>
                                </select>
                            </div>
                        </div>

                        {{-- Upload Image / Address --}}
                        <div class="form-row mb-3">
                            <div class="col-md-6 custom-file-container form-group" data-upload-id="mySecondImage">
                                <label>{{ __('dash.upload') }}<a href="javascript:void(0)"
                                        class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <div style="display: flex">
                                    <label class="custom-file-container__custom-file">
                                        <input required type="file"
                                            class="custom-file-container__custom-file__custom-file-input" name="image">
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="col-md-2 custom-file-container__image-preview"></div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ __('dash.address') }}</label>
                                <textarea required name="address" class="form-control" rows="3"
                                    placeholder="{{ __('dash.address') }}"></textarea>
                            </div>
                        </div>

                        {{-- Group / Days --}}
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.group') }}</label>
                                <select class="select2 form-control pt-1" name="group_id">
                                    <option selected disabled>{{ __('dash.choose') }}</option>
                                    @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>{{ __('dash.working_days') }}</label>
                                <select name="day_id[]" class="form-control" multiple required>
                                    <option value="" disabled selected hidden>{{ __('dash.select_day') }}</option>
                                    @foreach ($days as $day)
                                    <option value="{{ $day->id }}">{{ app()->getLocale() == 'ar' ? $day->name_ar :
                                        $day->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.status') }}</label>
                                <label class="switch s-outline s-outline-info mb-4 mx-4 mt-3 d-block w-50">
                                    <input type="checkbox" name="active" id="status" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>

                        {{-- Technician Type --}}
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold d-block mb-2">{{ __('dash.technician_type') }}</label>
                                <div class="form-check form-check-inline mr-4">
                                    <input class="form-check-input" type="radio" name="is_business" id="personalTech"
                                        value="0" checked>
                                    <label class="form-check-label" for="personalTech">
                                        <i class="fas fa-user mr-1"></i> {{ __('dash.personal') }}
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_business" id="businessTech"
                                        value="1">
                                    <label class="form-check-label" for="businessTech">
                                        <i class="fas fa-building mr-1"></i> {{ __('dash.business') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- Business fields --}}
                        <div id="businessFields" style="display: none;">
                            <div class="form-row mb-3">
                                <div class="form-group col-md-6">
                                    <label>{{ __('dash.project') }}</label>
                                    <select id="client_project_id" name="client_project_id"
                                        class="form-control select2">
                                        <option value="">{{ __('dash.choose') }}</option>
                                        @foreach($clientProjects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>{{ __('dash.branch') }}</label>
                                    <select id="branch_id" name="branch_id" class="form-control select2">
                                        <option value="">{{ __('dash.choose') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="form-group col-md-12">
                                    <label>{{ __('dash.floors') }}</label>
                                    <select id="floor_ids" name="floor_ids[]" class="form-control select2"
                                        multiple></select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('dash.save') }}</button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> {{ __('dash.close')
                            }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@push('script')
<script>
    let myImage = new FileUploadWithPreview('myImage')
</script>
@endpush