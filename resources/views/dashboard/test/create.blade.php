<form action="{{ route('dashboard.business_project_branches.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>المشروع</label>
        <select name="client_project_id" class="form-control" required>
            @foreach($projects as $project)
            <option value="{{ $project->id }}">{{ $project->name_ar }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>الاسم بالعربية</label>
        <input type="text" name="name_ar" class="form-control" required>
    </div>
    {{-- باقي الحقول --}}
    <button type="submit" class="btn btn-primary">حفظ</button>
</form>