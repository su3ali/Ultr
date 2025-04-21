<div class="modal fade" id="createCarModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <form id="modalCreateCarForm">
            @csrf
            <input type="hidden" name="user_id" id="car_user_id">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إضافة سيارة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    {{-- رقم اللوحة --}}
                    <div class="form-group">
                        <label>رقم اللوحة</label>
                        <input type="text" name="Plate_number" id="plateInput" class="form-control" required>
                    </div>

                    {{-- نوع السيارة --}}
                    <div class="form-group">
                        <label>نوع السيارة</label>
                        <select name="type_id" class="form-control select2" required>
                            <option value="">اختر</option>
                            @foreach($types as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- موديل السيارة --}}
                    <div class="form-group">
                        <label>موديل السيارة</label>
                        <select name="model_id" class="form-control select2" required>
                            <option value="">اختر</option>
                            @foreach($models as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- اللون --}}
                    <div class="form-group">
                        <label>اللون</label>
                        <input type="text" name="color" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="saveCar" class="btn btn-success">حفظ</button>
                </div>
            </div>
        </form>
    </div>
</div>