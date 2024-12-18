<style>
    .modal-header {
        border-bottom: 1px solid #ddd;
    }

    .modal-footer {
        border-top: 1px solid #ddd;
    }

    .form-control,
    .form-select {
        border-radius: 8px;
    }

    button.btn {
        transition: all 0.3s ease;
    }

    button.btn:hover {
        opacity: 0.9;
    }

    h5.modal-title {
        color: white;
    }

    .modal-body .row>[class*='col-'] {
        margin-bottom: 0.1rem;
    }

    .form-label {
        font-weight: bold;
        font-size: 1rem;
        color: #495057;
    }

    .custom-file {
        position: relative;
        border: 2px dashed #d1d3e2;
        border-radius: 8px;
        padding: 10px;
        transition: all 0.3s ease;
    }

    .custom-file:hover {
        border-color: #5a5c69;
        background-color: #f8f9fc;
    }

    .custom-file-input {
        opacity: 0;
        /* Hides the default input */
        position: absolute;
        z-index: 2;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .custom-file-label {
        position: relative;
        z-index: 1;
        display: block;
        width: 100%;
        height: 100%;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        text-align: center;
        color: #6c757d;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .custom-file-input:focus+.custom-file-label {
        border: 2px solid #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        color: #495057;
        background-color: #e9ecef;
    }

    /* Error Styling */
    .alert.alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-radius: 8px;
        font-size: 0.9rem;
        padding: 0.75rem 1rem;
    }

    /* Additional styling for icons */
    .bi-exclamation-circle {
        margin-right: 5px;
    }
</style>

<div class="modal fade" id="technicianModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content shadow-lg">
            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white d-flex justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dash.create_trainee') }}</h5>
                <button type="button" class="close text-white ml-auto" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4">
                <form action="{{ route('dashboard.core.trainee.store') }}" method="post" class="form-horizontal"
                    enctype="multipart/form-data" id="demo-form" data-parsley-validate="">
                    @csrf

                    <!-- Dynamic Fields -->
                    <div class="row g-3">
                        <!-- trainee_name  -->
                        <div class="col-md-6 col-sm-12">
                            <label for="trainee_name" class="form-label">{{ __('dash.trainee_name') }}</label>
                            <input type="text" name="name" class="form-control" id="trainee_name"
                                placeholder="{{ __('dash.trainee_name') }}" required>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="username" class="form-label">اسم المستخدم</label>
                            <input type="text" name="user_name" class="form-control" id="username"
                                placeholder="اسم المستخدم" required>
                        </div>

                        <!-- password  -->
                        <div class="col-md-6 col-sm-12">
                            <label for="password" class="form-label">{{ __('dash.password') }}</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="{{ __('dash.password') }}" required>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="password_confirmation"
                                class="form-label">{{ __('dash.password_confirmation') }}</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation" placeholder="{{ __('dash.password_confirmation') }}"
                                required>
                        </div>

                        <!-- phone  -->
                        <div class="col-md-6 col-sm-12">
                            <label for="phone" class="form-label">{{ __('dash.phone') }}</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                placeholder="{{ __('dash.phone') }}" required>
                        </div>

                        <!-- Specialization -->
                        <div class="col-md-6 col-sm-12">
                            <label for="specialization" class="form-label">التخصص</label>
                            <select id="specialization" class="form-select select2" name="spec_id" disabled>
                                @foreach ($specs as $index => $spec)
                                    <option value="{{ $spec->id }}" {{ $loop->first ? 'selected' : '' }}>
                                        {{ $spec->name }}
                                    </option>
                                @endforeach
                            </select>
                            <!-- Hidden input to submit value -->
                            @if ($specs->isNotEmpty())
                                <input type="hidden" name="spec_id" value="{{ $specs->first()->id }}">
                            @endif
                        </div>

                        <!-- nationality -->
                        <div class="col-md-6 col-sm-12">
                            <label for="country_id" class="form-label">{{ __('dash.nationality') }}</label>
                            <select id="country_id" class="form-select select2" name="country_id" required>
                                <option selected disabled>{{ __('dash.choose') }}</option>
                                @foreach ($nationalities as $key => $nationality)
                                    <option value="{{ $nationality }}">{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="identity_id" class="form-label">{{ __('dash.identity_number') }}</label>
                            <input type="text" name="identity_id" class="form-control" id="identity_id"
                                placeholder="{{ __('dash.identity_number') }}" required>
                        </div>

                        <!-- birth date  -->
                        <div class="col-md-6 col-sm-12">
                            <label for="birth" class="form-label">{{ __('dash.birth_date') }}</label>
                            <input type="date" name="birth_date" class="form-control" id="birth" required>
                        </div>

                        <!-- Wallet -->
                        <div class="col-md-6 col-sm-12">
                            <label for="wallet" class="form-label">{{ __('dash.wallet') }}</label>
                            <select id="wallet" class="form-select select2" name="wallet_id" required>
                                <option disabled>{{ __('dash.choose') }}</option>
                                <option selected value="1">Wallet</option>
                            </select>
                        </div>

                        <!-- image  -->
                        <div class="col-md-6 col-sm-12">
                            <label for="upload_file" class="form-label fw-bold">{{ __('dash.upload') }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input shadow-sm" id="image"
                                    name="image" accept="image/*">
                                <label class="custom-file-label" for="image"
                                    id="upload_label">{{ __('dash.choose_file') }}</label>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <label for="address" class="form-label">{{ __('dash.address') }}</label>
                            <textarea name="address" class="form-control" id="address" rows="3"
                                placeholder="{{ __('dash.address') }}"></textarea>
                        </div>

                        <!-- group  -->
                        <div class="col-md-6 col-sm-12">
                            <label for="group" class="form-label">{{ __('dash.group') }}</label>
                            <select id="group" class="form-select select2" name="group_id" required>
                                <option disabled selected>{{ __('dash.choose') }}</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer mt-4">
                        <button type="submit" class="btn btn-primary">{{ __('dash.save') }}</button>
                        <button type="button" class="btn btn-light border"
                            data-dismiss="modal">{{ __('dash.close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        let secondUpload = new FileUploadWithPreview('mySecondImage');
    </script>
@endpush
