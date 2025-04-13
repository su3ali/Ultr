@extends('dashboard.layout.layout')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">إضافة مشروع جديد</h4>

    <form action="{{ route('business_projects.store') }}" method="POST">
        @csrf

        {{-- مشروع --}}
        <div class="card mb-3">
            <div class="card-header">بيانات المشروع</div>
            <div class="card-body">
                <div class="form-group">
                    <label>الاسم بالعربية</label>
                    <input type="text" name="name_ar" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label>الاسم بالإنجليزية</label>
                    <input type="text" name="name_en" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label>الوصف</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
            </div>
        </div>

        {{-- الفروع --}}
        <div id="branches-container">
            <h5 class="mb-3">الفروع</h5>
            <div class="branch-card border rounded p-3 mb-3">
                <h6>فرع #1</h6>
                <div class="form-group">
                    <label>الاسم بالعربية</label>
                    <input type="text" name="branches[0][name_ar]" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label>الاسم بالإنجليزية</label>
                    <input type="text" name="branches[0][name_en]" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label>الموقع</label>
                    <input type="text" name="branches[0][location]" class="form-control">
                </div>

                {{-- طوابق الفرع --}}
                <div class="floors-container mt-3">
                    <h6>الطوابق:</h6>
                    <div class="floor-input border p-2 mb-2 rounded">
                        <label>الاسم بالعربية</label>
                        <input type="text" name="branches[0][floors][0][name_ar]" class="form-control" required>
                        <label class="mt-2">الاسم بالإنجليزية</label>
                        <input type="text" name="branches[0][floors][0][name_en]" class="form-control" required>
                        <label class="mt-2">رقم الطابق</label>
                        <input type="number" name="branches[0][floors][0][floor_number]" class="form-control">
                        <label class="mt-2">النوع</label>
                        <select name="branches[0][floors][0][type]" class="form-control">
                            <option value="سكني">سكني</option>
                            <option value="تجاري">تجاري</option>
                            <option value="مكاتب">مكاتب</option>
                        </select>
                    </div>
                </div>

                <button type="button" class="btn btn-sm btn-outline-primary mt-2 add-floor-btn">+ طابق جديد</button>
            </div>
        </div>

        <button type="button" class="btn btn-outline-success mb-3" id="add-branch-btn">+ فرع جديد</button>
        <br>

        <button type="submit" class="btn btn-primary">حفظ المشروع</button>
    </form>
</div>
@endsection

@push('script')
<script>
    let branchIndex = 1;

    document.getElementById('add-branch-btn').addEventListener('click', function () {
        let html = `
        <div class="branch-card border rounded p-3 mb-3">
            <h6>فرع #${branchIndex + 1}</h6>
            <div class="form-group">
                <label>الاسم بالعربية</label>
                <input type="text" name="branches[${branchIndex}][name_ar]" class="form-control" required>
            </div>
            <div class="form-group mt-2">
                <label>الاسم بالإنجليزية</label>
                <input type="text" name="branches[${branchIndex}][name_en]" class="form-control" required>
            </div>
            <div class="form-group mt-2">
                <label>الموقع</label>
                <input type="text" name="branches[${branchIndex}][location]" class="form-control">
            </div>

            <div class="floors-container mt-3">
                <h6>الطوابق:</h6>
                <div class="floor-input border p-2 mb-2 rounded">
                    <label>الاسم بالعربية</label>
                    <input type="text" name="branches[${branchIndex}][floors][0][name_ar]" class="form-control" required>
                    <label class="mt-2">الاسم بالإنجليزية</label>
                    <input type="text" name="branches[${branchIndex}][floors][0][name_en]" class="form-control" required>
                    <label class="mt-2">رقم الطابق</label>
                    <input type="number" name="branches[${branchIndex}][floors][0][floor_number]" class="form-control">
                    <label class="mt-2">النوع</label>
                    <select name="branches[${branchIndex}][floors][0][type]" class="form-control">
                        <option value="سكني">سكني</option>
                        <option value="تجاري">تجاري</option>
                        <option value="مكاتب">مكاتب</option>
                    </select>
                </div>
            </div>

            <button type="button" class="btn btn-sm btn-outline-primary mt-2 add-floor-btn">+ طابق جديد</button>
        </div>`;
        document.getElementById('branches-container').insertAdjacentHTML('beforeend', html);
        branchIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('add-floor-btn')) {
            const branchCard = e.target.closest('.branch-card');
            const floorsContainer = branchCard.querySelector('.floors-container');
            const branchIdx = [...document.querySelectorAll('.branch-card')].indexOf(branchCard);
            const floorCount = floorsContainer.querySelectorAll('.floor-input').length;

            let floorHtml = `
            <div class="floor-input border p-2 mb-2 rounded">
                <label>الاسم بالعربية</label>
                <input type="text" name="branches[${branchIdx}][floors][${floorCount}][name_ar]" class="form-control" required>
                <label class="mt-2">الاسم بالإنجليزية</label>
                <input type="text" name="branches[${branchIdx}][floors][${floorCount}][name_en]" class="form-control" required>
                <label class="mt-2">رقم الطابق</label>
                <input type="number" name="branches[${branchIdx}][floors][${floorCount}][floor_number]" class="form-control">
                <label class="mt-2">النوع</label>
                <select name="branches[${branchIdx}][floors][${floorCount}][type]" class="form-control">
                    <option value="سكني">سكني</option>
                    <option value="تجاري">تجاري</option>
                    <option value="مكاتب">مكاتب</option>
                </select>
            </div>`;
            floorsContainer.insertAdjacentHTML('beforeend', floorHtml);
        }
    });
</script>
@endpush