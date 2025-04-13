@extends('dashboard.layout.layout')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">تعديل مشروع - {{ \$project->name_ar }}</h4>

    <form action="{{ route('business_projects.update', \$project->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- بيانات المشروع --}}
        <div class="card mb-3">
            <div class="card-header">بيانات العمارة</div>
            <div class="card-body">
                <div class="form-group">
                    <label>الاسم بالعربية</label>
                    <input type="text" name="name_ar" class="form-control" value="{{ \$project->name_ar }}" required>
                </div>
                <div class="form-group mt-2">
                    <label>الاسم بالإنجليزية</label>
                    <input type="text" name="name_en" class="form-control" value="{{ \$project->name_en }}" required>
                </div>
                <div class="form-group mt-2">
                    <label>الوصف</label>
                    <textarea name="description" class="form-control">{{ \$project->description }}</textarea>
                </div>
            </div>
        </div>

        {{-- الفروع والطوابق --}}
        <div id="branches-container">
            <h5 class="mb-3">الفروع</h5>
            @foreach(\$project->branches as \$bIndex => \$branch)
            <div class="branch-card border rounded p-3 mb-3">
                <h6>فرع #{{ \$loop->iteration }}
                    <button type="button" class="btn btn-sm btn-outline-danger remove-branch float-end">🗑 حذف
                        الفرع</button>
                </h6>
                <div class="form-group">
                    <label>الاسم بالعربية</label>
                    <input type="text" name="branches[{{ \$bIndex }}][name_ar]" class="form-control"
                        value="{{ \$branch->name_ar }}" required>
                </div>
                <div class="form-group mt-2">
                    <label>الاسم بالإنجليزية</label>
                    <input type="text" name="branches[{{ \$bIndex }}][name_en]" class="form-control"
                        value="{{ \$branch->name_en }}" required>
                </div>
                <div class="form-group mt-2">
                    <label>الموقع</label>
                    <input type="text" name="branches[{{ \$bIndex }}][location]" class="form-control"
                        value="{{ \$branch->location }}">
                </div>

                {{-- الطوابق --}}
                <div class="floors-container mt-3">
                    <h6>الطوابق:</h6>
                    @foreach(\$branch->floors as \$fIndex => \$floor)
                    <div class="floor-input border p-2 mb-2 rounded">
                        <label>الاسم بالعربية</label>
                        <input type="text" name="branches[{{ \$bIndex }}][floors][{{ \$fIndex }}][name_ar]"
                            class="form-control" value="{{ \$floor->name_ar }}" required>

                        <label class="mt-2">الاسم بالإنجليزية</label>
                        <input type="text" name="branches[{{ \$bIndex }}][floors][{{ \$fIndex }}][name_en]"
                            class="form-control" value="{{ \$floor->name_en }}" required>

                        <label class="mt-2">رقم الطابق</label>
                        <input type="number" name="branches[{{ \$bIndex }}][floors][{{ \$fIndex }}][floor_number]"
                            class="form-control" value="{{ \$floor->floor_number }}">

                        <label class="mt-2">النوع</label>
                        <select name="branches[{{ \$bIndex }}][floors][{{ \$fIndex }}][type]" class="form-control">
                            <option value="">-- اختر --</option>
                            <option value="سكني" {{ \$floor->type === 'سكني' ? 'selected' : '' }}>سكني</option>
                            <option value="تجاري" {{ \$floor->type === 'تجاري' ? 'selected' : '' }}>تجاري</option>
                            <option value="مكاتب" {{ \$floor->type === 'مكاتب' ? 'selected' : '' }}>مكاتب</option>
                        </select>

                        <button type="button" class="btn btn-sm btn-outline-danger mt-2 remove-floor">🗑 حذف
                            الطابق</button>
                    </div>
                    @endforeach
                </div>

                <button type="button" class="btn btn-sm btn-outline-primary mt-2 add-floor-btn">+ طابق جديد</button>
            </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-outline-success mb-3" id="add-branch-btn">+ فرع جديد</button><br>

        <button type="submit" class="btn btn-primary">تحديث المشروع</button>
        <a href="{{ route('business_projects.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection

@push('script')
<script>
    let branchIndex = {{ $project->branches->count() }};

    document.getElementById('add-branch-btn').addEventListener('click', function () {
        let html = `
        <div class="branch-card border rounded p-3 mb-3">
            <h6>فرع جديد
                <button type="button" class="btn btn-sm btn-outline-danger remove-branch float-end">🗑 حذف الفرع</button>
            </h6>
            <div class="form-group">
                <label>الاسم بالعربية</label>
                <input type="text" name="branches[\${branchIndex}][name_ar]" class="form-control" required>
            </div>
            <div class="form-group mt-2">
                <label>الاسم بالإنجليزية</label>
                <input type="text" name="branches[\${branchIndex}][name_en]" class="form-control" required>
            </div>
            <div class="form-group mt-2">
                <label>الموقع</label>
                <input type="text" name="branches[\${branchIndex}][location]" class="form-control">
            </div>

            <div class="floors-container mt-3">
                <h6>الطوابق:</h6>
                <div class="floor-input border p-2 mb-2 rounded">
                    <label>الاسم بالعربية</label>
                    <input type="text" name="branches[\${branchIndex}][floors][0][name_ar]" class="form-control" required>
                    <label class="mt-2">الاسم بالإنجليزية</label>
                    <input type="text" name="branches[\${branchIndex}][floors][0][name_en]" class="form-control" required>
                    <label class="mt-2">رقم الطابق</label>
                    <input type="number" name="branches[\${branchIndex}][floors][0][floor_number]" class="form-control">
                    <label class="mt-2">النوع</label>
                    <select name="branches[\${branchIndex}][floors][0][type]" class="form-control">
                        <option value="">-- اختر --</option>
                        <option value="سكني">سكني</option>
                        <option value="تجاري">تجاري</option>
                        <option value="مكاتب">مكاتب</option>
                    </select>
                    <button type="button" class="btn btn-sm btn-outline-danger mt-2 remove-floor">🗑 حذف الطابق</button>
                </div>
            </div>

            <button type="button" class="btn btn-sm btn-outline-primary mt-2 add-floor-btn">+ طابق جديد</button>
        </div>`;
        document.getElementById('branches-container').insertAdjacentHTML('beforeend', html);
        branchIndex++;
    });

    document.addEventListener('click', function (e) {
        // إضافة طابق جديد
        if (e.target && e.target.classList.contains('add-floor-btn')) {
            const branchCard = e.target.closest('.branch-card');
            const floorsContainer = branchCard.querySelector('.floors-container');
            const branchIdx = [...document.querySelectorAll('.branch-card')].indexOf(branchCard);
            const floorCount = floorsContainer.querySelectorAll('.floor-input').length;

            let floorHtml = `
            <div class="floor-input border p-2 mb-2 rounded">
                <label>الاسم بالعربية</label>
                <input type="text" name="branches[\${branchIdx}][floors][\${floorCount}][name_ar]" class="form-control" required>
                <label class="mt-2">الاسم بالإنجليزية</label>
                <input type="text" name="branches[\${branchIdx}][floors][\${floorCount}][name_en]" class="form-control" required>
                <label class="mt-2">رقم الطابق</label>
                <input type="number" name="branches[\${branchIdx}][floors][\${floorCount}][floor_number]" class="form-control">
                <label class="mt-2">النوع</label>
                <select name="branches[\${branchIdx}][floors][\${floorCount}][type]" class="form-control">
                    <option value="">-- اختر --</option>
                    <option value="سكني">سكني</option>
                    <option value="تجاري">تجاري</option>
                    <option value="مكاتب">مكاتب</option>
                </select>
                <button type="button" class="btn btn-sm btn-outline-danger mt-2 remove-floor">🗑 حذف الطابق</button>
            </div>`;
            floorsContainer.insertAdjacentHTML('beforeend', floorHtml);
        }

        // حذف فرع
        if (e.target && e.target.classList.contains('remove-branch')) {
            if (confirm('هل أنت متأكد من حذف هذا الفرع وكل الطوابق المرتبطة به؟')) {
                e.target.closest('.branch-card').remove();
            }
        }

        // حذف طابق
        if (e.target && e.target.classList.contains('remove-floor')) {
            if (confirm('هل أنت متأكد من حذف هذا الطابق؟')) {
                e.target.closest('.floor-input').remove();
            }
        }
    });
</script>
@endpush