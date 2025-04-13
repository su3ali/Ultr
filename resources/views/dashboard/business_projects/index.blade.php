@extends('dashboard.layout.layout')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">قائمة المشاريع </h4>

    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" id="searchInput" class="form-control" placeholder="بحث بالاسم أو الكود...">
        </div>
        <div class="col-md-4">
            <a href="{{ route('business_projects.create') }}" class="btn btn-primary">+ مشروع جديد</a>
        </div>
    </div>

    <div class="table-responsive">
        <table id="projectsTable" class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>الاسم (ع)</th>
                    <th>الاسم (EN)</th>
                    <th>الكود</th>
                    <th>عدد الفروع</th>
                    <th>إجمالي الطوابق</th>
                    <th>التاريخ</th>
                    <th>تحكم</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function () {
        let table = $('#projectsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('dashboard.business_projects.index') }}",
                data: function (d) {
                    d.search_value = $('#searchInput').val();
                }
            },
            columns: [
                { data: 'name_ar', name: 'name_ar' },
                { data: 'name_en', name: 'name_en' },
                { data: 'code', name: 'code' },
                { data: 'branches_count', name: 'branches_count', searchable: false },
                { data: 'floors_count', name: 'floors_count', searchable: false },
                { data: 'created_at', name: 'created_at' },
                { data: 'control', name: 'control', orderable: false, searchable: false },
            ],
            language: {
                url: "{{ asset('assets/datatables/ar.json') }}"
            }
        });

        // Live search
        $('#searchInput').on('keyup', function () {
            table.ajax.reload();
        });
    });
</script>
@endpush