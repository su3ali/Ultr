<div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات المشروع</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="feather feather-x" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data" id="demo-form-edit">
                    @csrf
                    @method('PATCH')

                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="name_ar">{{__('dash.name_ar')}}</label>
                            <input type="text" name="name_ar" class="form-control" id="name_ar"
                                placeholder="{{__('dash.name_ar')}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="name_en">{{__('dash.name_en')}}</label>
                            <input type="text" name="name_en" class="form-control" id="name_en"
                                placeholder="{{__('dash.name_en')}}">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{__('dash.save')}}</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">{{__('dash.close')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>