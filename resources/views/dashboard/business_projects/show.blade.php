@extends('dashboard.layout.layout')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">تفاصيل المشروع</h4>

    <div class="card mb-4">
        <div class="card-body">
            <h5><strong>الاسم (ع):</strong> {{ $project->name_ar }}</h5>
            <h5><strong>الاسم (EN):</strong> {{ $project->name_en }}</h5>
            <p><strong>الوصف:</strong> {{ $project->description ?? '—' }}</p>
            <p><strong>تاريخ الإنشاء:</strong> {{ $project->created_at->format('Y-m-d') }}</p>
        </div>
    </div>

    <h5 class="mb-3">الفروع والطوابق</h5>

    @forelse ($project->branches as $branch)
    <div class="card mb-3">
        <div class="card-header bg-light">
            <strong>فرع:</strong> {{ $branch->name_ar }} | {{ $branch->name_en }}<br>
            <small><strong>الموقع:</strong> {{ $branch->location ?? '—' }}</small>
        </div>
        <div class="card-body">
            @if($branch->floors->count())
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم (ع)</th>
                        <th>الاسم (EN)</th>
                        <th>رقم الطابق</th>
                        <th>النوع</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($branch->floors as $index => $floor)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $floor->name_ar }}</td>
                        <td>{{ $floor->name_en }}</td>
                        <td>{{ $floor->floor_number ?? '—' }}</td>
                        <td>{{ $floor->type ?? '—' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-muted">لا توجد طوابق لهذا الفرع.</p>
            @endif
        </div>
    </div>
    @empty
    <div class="alert alert-warning">لا توجد فروع مسجلة لهذا المشروع.</div>
    @endforelse

    <a href="{{ route('business_projects.index') }}" class="btn btn-secondary mt-3">رجوع للقائمة</a>
</div>
@endsection