<div class="modal fade " id="createBannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إنشاء بنر جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('dashboard.banners.store')}}" method="post" class="form-horizontal"
                      enctype="multipart/form-data" id="demo-form" data-parsley-validate="">
                    @csrf
                    <div class="box-body">
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">عنوان البنر باللغة العربية</label>
                                <input type="text" name="title_ar" class="form-control"
                                       id="inputEmail4"
                                       placeholder="أدخل العنوان"
                                       >
                                @error('title_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">عنوان البنر باللغة الإنجليزية</label>
                                <input type="text" name="title_en" class="form-control"
                                       id="inputEmail4"
                                       placeholder="أدخل العنوان"
                                >
                                @error('title_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                
                                <label for="coupon">الكوبون</label>
                                <select id="coupon" class="select2 form-control pt-1" name="coupon_id">
                                    <option selected disabled>{{ __('dash.choose') }}</option>
                                    @foreach ($coupons as $coupon)
                                        <option value="{{ $coupon->id }}"> {{ $coupon->title_en }} </option>
                                    @endforeach
                                </select>
    
                            </div>
                            
                            <div class="col-md-8 custom-file-container form-group"
                                 data-upload-id="mySecondImage">
                                <label>{{__('dash.upload')}}<a href="javascript:void(0)"
                                                               class="custom-file-container__image-clear"
                                                               title="Clear Image">x</a></label>
                                <div style="display: flex">
                                    <label class="custom-file-container__custom-file">
                                        <input type="file"
                                               class="custom-file-container__custom-file__custom-file-input"
                                               name="image"
                                        >
                                        {{--<input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>--}}
                                        <span
                                            class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>

                                    <div class=" col-md-2 custom-file-container__image-preview"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{__('dash.save')}}</button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> {{__('dash.close')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


@push('script')
    <script>

        $("body").on('change', '.type', function () {
            if ($(this).val() == 'evaluative'){

            $('.type-col').removeClass('col-md-6');
            $('.type-col').addClass('col-md-4');
            $('.price-col').removeClass('col-md-6');
            $('.price-col').addClass('col-md-4');
            $('.start_from').show();


        }else{
                $('.type-col').removeClass('col-md-4');
                $('.type-col').addClass('col-md-6');
                $('.price-col').removeClass('col-md-4');
                $('.price-col').addClass('col-md-6');
                $('.start_from').hide();

            }

        })

    </script>


        <script>
            let secondUpload = new FileUploadWithPreview('mySecondImage')
        </script>
    @endpush
