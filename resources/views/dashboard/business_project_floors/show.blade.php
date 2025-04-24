<div class="modal fade" id="showFloorModal" tabindex="-1" role="dialog" aria-labelledby="showFloorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> {{-- استخدم lg بدلاً من xl لموازنة العرض --}}
        <div class="modal-content shadow-sm border-0">

            <div class="modal-header bg-light border-bottom">
                <h5 class="modal-title font-weight-bold" id="showFloorModalLabel">
                    <i class="fas fa-building mr-2 text-primary"></i> عرض بيانات الطابق
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="إغلاق">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body py-4 px-4">
                <div class="row gy-4">


                    <div class="col-md-6">
                        <label class="text-dark small">اسم المشروع</label>
                        <div class="border rounded p-2 bg-light text-dark" id="show_project_name"></div>
                    </div>


                    <div class="col-md-6">
                        <label class="text-dark small">اسم الفرع</label>
                        <div class="border rounded p-2 bg-light text-dark" id="show_branch_name"></div>
                    </div>

                    <div class="col-md-6">
                        <label class="text-dark small">الاسم بالعربية</label>
                        <div class="border rounded p-2 bg-light text-dark" id="show_name_ar"></div>
                    </div>

                    <div class="col-md-6">
                        <label class="text-dark small">الاسم بالإنجليزية</label>
                        <div class="border rounded p-2 bg-light text-dark" id="show_name_en"></div>
                    </div>

                    <div class="col-md-6">
                        <label class="text-dark small">رقم الطابق</label>
                        <div class="border rounded p-2 bg-light text-dark" id="show_floor_number"></div>
                    </div>



                    <div class="col-md-6">
                        <label class="text-dark small">الحالة</label>
                        <div class="border rounded p-2 bg-light text-dark" id="show_status"></div>
                    </div>
                </div>
            </div>

            <div class="modal-footer border-top bg-white">
                <button type="button" class="btn btn-light" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i> {{ __('dash.close') }}
                </button>
            </div>

        </div>
    </div>
</div>