<div class="modal fade" id="supplierModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dash.create_supplier') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.core.suppliers.store') }}" method="post" enctype="multipart/form-data"
                    id="supplier-form" data-parsley-validate>
                    @csrf
                    <div class="container">
                        <!-- Name Fields -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_ar">{{ __('dash.name_ar') }}</label>
                                    <input required type="text" name="name_ar" class="form-control" id="name_ar"
                                        placeholder="{{ __('dash.name_ar') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_en">{{ __('dash.name_en') }}</label>
                                    <input type="text" name="name_en" class="form-control" id="name_en"
                                        placeholder="{{ __('dash.name_en') }}">
                                </div>
                            </div>


                        </div>

                        <!-- User Info -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="supplier_email">{{ __('dash.email') }}</label>
                                    <input type="email" name="email" class="form-control" id="supplier_email"
                                        placeholder="{{ __('dash.email') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="supplier_phone">{{ __('dash.phone') }}</label>
                                    <input required type="text" name="phone" class="form-control" id="supplier_phone"
                                        placeholder="{{ __('dash.phone') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="row mb-3">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tax_number">{{ __('dash.product_tax_number') }}</label>
                                    <input type="text" name="tax_number" class="form-control" id="tax_number"
                                        placeholder="{{ __('dash.product_tax_number') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="note">{{ __('dash.note') }}</label>
                                    <textarea required name="note" class="form-control" id="note" rows="3"
                                        placeholder="{{ __('dash.note') }}"></textarea>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="supplier_address">{{ __('dash.address') }}</label>
                                    <textarea required name="address" class="form-control" id="supplier_address"
                                        rows="3" placeholder="{{ __('dash.address') }}"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('dash.save') }}</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">
                            <i class="flaticon-cancel-12"></i> {{ __('dash.close') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
<!-- Include any specific modal-related JavaScript here -->
@endpush