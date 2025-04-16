<div class="tab-pane fade" id="step2">
    <form id="createCarForm">
        @csrf
        <input type="hidden" name="user_id" id="car_user_id">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>نوع السيارة</label>
                <select name="type_id" id="carTypeSelect" class="form-control" required>
                    <option value="">اختر النوع</option>
                    @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label>موديل السيارة</label>
                <select name="model_id" id="carModelSelect" class="form-control" required>
                    <option value="">اختر الموديل</option>
                    @foreach($models as $model)
                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>اللون</label>
                <input type="text" name="color" class="form-control" placeholder="مثل: أسود" required>
            </div>

            <div class="form-group col-md-6">
                <label>رقم اللوحة</label>
                <div class="input-group">
                    <input type="text" name="Plate_number" id="plateInput" class="form-control"
                        placeholder="مثال: ABC123" required>
                    {{-- <div class="input-group-append">
                        <button type="button" id="checkPlateBtn" class="btn btn-info">تحقق</button>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" id="saveCar" class="btn btn-primary w-100">{{ __('dash.next') }}</button>
        </div>
    </form>
</div>