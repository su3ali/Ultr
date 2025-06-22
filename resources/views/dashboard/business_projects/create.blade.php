<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة مشروع</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('dashboard.business_projects.store') }}" method="POST"
                    enctype="multipart/form-data" id="demo-form" data-parsley-validate>
                    @csrf

                    {{-- Project Fields --}}
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="name_ar">{{ __('dash.name_ar') }}</label>
                            <input type="text" name="name_ar" class="form-control" id="name_ar"
                                placeholder="{{ __('dash.name_ar') }}">
                            @error('name_ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="name_en">{{ __('dash.name_en') }}</label>
                            <input type="text" name="name_en" class="form-control" id="name_en"
                                placeholder="{{ __('dash.name_en') }}">
                            @error('name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Admin Data Card --}}
                    <div class="card border rounded shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <strong>بيانات مدير المشروع</strong>
                        </div>
                        <div class="card-body">

                            <div class="form-row mb-3">
                                <div class="form-group col-md-6 text-right">
                                    <label for="admin_first_name">الاسم الأول</label>
                                    <input type="text" name="admin_first_name" id="admin_first_name"
                                        class="form-control" placeholder="الاسم الأول" required>
                                </div>

                                <div class="form-group col-md-6 text-right">
                                    <label for="admin_last_name">الاسم الآخر</label>
                                    <input type="text" name="admin_last_name" id="admin_last_name" class="form-control"
                                        placeholder="الاسم الآخر" required>
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="form-group col-md-6 text-right">
                                    <label for="admin_phone">الهاتف</label>
                                    <input type="text" name="admin_phone" id="admin_phone" class="form-control"
                                        placeholder="الهاتف">
                                </div>

                                <div class="form-group col-md-6 text-right">
                                    <label for="admin_email">عنوان البريد الإلكتروني</label>
                                    <input type="email" name="admin_email" id="admin_email" class="form-control"
                                        placeholder="عنوان البريد الإلكتروني" required>
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                {{-- كلمة المرور --}}
                                <div class="form-group col-md-6 text-right position-relative">
                                    <label for="admin_password">كلمة المرور</label>
                                    <input type="password" name="admin_password" id="admin_password"
                                        class="form-control" placeholder="كلمة المرور" required>
                                    <span toggle="#admin_password"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>

                                {{-- إعادة تأكيد كلمة المرور --}}
                                <div class="form-group col-md-6 text-right position-relative">
                                    <label for="admin_password_confirmation">إعادة تأكيد كلمة المرور</label>
                                    <input type="password" name="admin_password_confirmation"
                                        id="admin_password_confirmation" class="form-control"
                                        placeholder="إعادة تأكيد كلمة المرور" required>
                                    <span toggle="#admin_password_confirmation"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>


                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('dash.save') }}</button>
                        <button type="button" class="btn" data-dismiss="modal">
                            <i class="flaticon-cancel-12"></i> {{ __('dash.close') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .field-icon {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #888;
        z-index: 2;
    }
</style>

</style>

@push('script')
<script>
    $(document).on('click', '.toggle-password', function () {
        const input = $($(this).attr('toggle'));
        const type = input.attr('type') === 'password' ? 'text' : 'password';
        input.attr('type', type);

        $(this).toggleClass('fa-eye fa-eye-slash');
    });
</script>
@endpush