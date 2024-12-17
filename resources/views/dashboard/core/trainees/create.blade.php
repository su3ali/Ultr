<div class="modal fade" id="technicianModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dash.create_trainee') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{ route('dashboard.core.trainee.store') }}" method="post" class="form-horizontal"
                    enctype="multipart/form-data" id="demo-form" data-parsley-validate="">
                    @csrf

                    <div class="box-body">
                        <!-- Row 1 -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="trainee_name">{{ __('dash.trainee_name') }}</label>
                                <input type="text" name="name" class="form-control" id="trainee_name"
                                    placeholder="{{ __('dash.trainee_name') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="username">اسم المستخدم</label>
                                <input type="text" name="user_name" class="form-control" id="username"
                                    placeholder="اسم المستخدم" required>
                            </div>
                        </div>

                        <!-- Row 2 -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">{{ __('dash.password') }}</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="{{ __('dash.password') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password_confirmation">{{ __('dash.password_confirmation') }}</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation" placeholder="{{ __('dash.password_confirmation') }}"
                                    required>
                            </div>
                        </div>

                        <!-- Row 3 -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone">{{ __('dash.phone') }}</label>
                                <input type="text" name="phone" class="form-control" id="phone"
                                    placeholder="{{ __('dash.phone') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="specialization">التخصص</label>
                                <select id="specialization" class="select2 form-control" name="spec_id" required>
                                    <option selected disabled>{{ __('dash.choose') }}</option>
                                    @foreach ($specs as $spec)
                                        <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Row 4 -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="country_id">{{ __('dash.nationality') }}</label>
                                <select id="country_id" class="select2 form-control" name="country_id" required>
                                    <option selected disabled>{{ __('dash.choose') }}</option>
                                    @foreach ($nationalities as $key => $nationality)
                                        <option value="{{ $nationality }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="identity_id">{{ __('dash.identity_number') }}</label>
                                <input type="text" name="identity_id" class="form-control" id="identity_id"
                                    placeholder="{{ __('dash.identity_number') }}" required>
                            </div>
                        </div>

                        <!-- Row 5 -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="birth">{{ __('dash.birth_date') }}</label>
                                <input type="date" name="birth_date" class="form-control" id="birth"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="wallet">{{ __('dash.wallet') }}</label>
                                <select id="wallet" class="select2 form-control" name="wallet_id" required>
                                    <option disabled selected>{{ __('dash.choose') }}</option>
                                    <option value="1">Wallet</option>
                                </select>
                            </div>
                        </div>

                        <!-- Row 6 -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>{{ __('dash.upload') }}</label>
                                <input type="file" class="form-control-file" name="image">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address">{{ __('dash.address') }}</label>
                                <textarea name="address" class="form-control" id="address" rows="3"
                                    placeholder="{{ __('dash.address') }}"></textarea>
                            </div>
                        </div>

                        <!-- Row 7 -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="group">{{ __('dash.group') }}</label>
                                <select id="group" class="select2 form-control" name="group_id" required>
                                    <option disabled selected>{{ __('dash.choose') }}</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('dash.save') }}</button>
                        <button type="button" class="btn btn-light"
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
