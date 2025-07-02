<div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">تعديل بيانات المشروع</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="feather feather-x" width="24" height="24">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data" id="demo-form-edit">
                    @csrf
                    @method('PATCH')

                    {{-- Project Fields --}}
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="edit_name_ar">{{ __('dash.name_ar') }}</label>
                            <input type="text" name="name_ar" class="form-control" id="edit_name_ar" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_name_en">{{ __('dash.name_en') }}</label>
                            <input type="text" name="name_en" class="form-control" id="edit_name_en" required>
                        </div>
                    </div>

                    {{-- Admin Data Fields --}}
                    <div class="card border rounded shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h4>{{ __('dash.admin_data') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-row mb-3">
                                <div class="form-group col-md-6 text-right">
                                    <input type="text" name="admin_first_name" id="edit_admin_first_name"
                                        class="form-control" placeholder="{{ __('dash.first_name') }}">
                                </div>
                                <div class="form-group col-md-6 text-right">
                                    <input type="text" name="admin_last_name" id="edit_admin_last_name"
                                        class="form-control" placeholder="{{ __('dash.last_name') }}">
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="form-group col-md-6 text-right">
                                    <input type="text" name="admin_phone" id="edit_admin_phone" class="form-control"
                                        placeholder="{{ __('dash.phone') }}">
                                </div>
                                <div class="form-group col-md-6 text-right">
                                    <input type="email" name="admin_email" id="edit_admin_email" class="form-control"
                                        placeholder="{{ __('dash.email') }}">
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="form-group col-md-6 text-right position-relative">
                                    <input type="password" name="admin_password" id="edit_admin_password"
                                        class="form-control" placeholder="كلمة المرور">
                                    <span toggle="#edit_admin_password"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group col-md-6 text-right position-relative">
                                    <input type="password" name="admin_password_confirmation"
                                        id="edit_admin_password_confirmation" class="form-control"
                                        placeholder="إعادة تأكيد كلمة المرور">
                                    <span toggle="#edit_admin_password_confirmation"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>
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