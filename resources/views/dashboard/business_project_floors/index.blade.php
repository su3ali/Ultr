@extends('dashboard.layout.layout')

@section('sub-header')
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>

        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 py-2">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">{{ __('dash.home')
                                    }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('dash.project_floors') }}</li>
                        </ol>
                    </nav>
                </div>
            </li>
        </ul>
    </header>
</div>

@include('dashboard.business_project_floors.create')
@endsection

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <!-- زر الإضافة -->
                <div class="col-md-12 text-right mb-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createFloorModal">
                        {{ __('dash.add_new') }}
                    </button>
                </div>

                <!-- مودال إضافة طابق -->
                @include('dashboard.business_project_floors.create')
                <!-- أو نسخ الكود داخل صفحة index مباشرة -->


                <div class="row mb-3">
                    <!-- فلتر المشروع -->
                    <div class="col-md-3">
                        <label for="project_filter" class="form-label text-muted">{{ __('dash.filter_by_project')
                            }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0">
                                    <i class="fas fa-filter text-primary"></i>
                                </span>
                            </div>
                            <select id="project_filter" class="form-control">
                                <option value="">{{ __('dash.all') }}</option>
                                @foreach($projects as $project)
                                <option value="{{ $project->id }}">
                                    {{ app()->getLocale() == 'ar' ? $project->name_ar : $project->name_en }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- فلتر الفرع -->
                    <div class="col-md-3">
                        <label for="branch_filter" class="form-label text-muted">{{ __('dash.filter_by_branch')
                            }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0">
                                    <i class="fas fa-filter text-primary"></i>
                                </span>
                            </div>
                            <select id="branch_filter" class="form-control border-left-0">
                                <option value="">{{ __('dash.all') }}</option>
                                <!-- الخيارات تُحدث ديناميكياً -->
                            </select>
                        </div>
                    </div>
                </div>



                <table id="floors-table" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('dash.name') }}</th>
                            <th>{{ __('dash.project_name') }}</th>
                            <th>{{ __('dash.branch_name') }}</th>
                            <th>{{ __('dash.status') }}</th>
                            <th class="no-content">{{ __('dash.actions') }}</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
</div>

@include('dashboard.business_project_floors.edit')
@include('dashboard.business_project_floors.show')
@endsection
@push('script')
<script type="text/javascript">
    let table;

    $(document).ready(function () {
        const allText = @json(__('dash.all'));
        const locale = '{{ app()->getLocale() }}';
        const selectBranchText = @json(__('dash.select_branch'));

        // DataTable setup
        table = $('#floors-table').DataTable({
            dom:
                "<'row mb-3'<'col-12 text-center'B>>" +
                "<'row mb-3'<'col-md-3 offset-md-7 d-flex justify-content-end'f>>" +
                "<'table-responsive'tr>" +
                "<'row mt-3'<'col-sm-12 col-md-6 text-left'i><'col-sm-12 col-md-6 text-right'p>>",
            language: {
                url: locale === 'ar'
                    ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json'
                    : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json'
            },
            buttons: [
                { extend: 'copy', className: 'btn btn-sm', text: 'نسخ' },
                { extend: 'csv', className: 'btn btn-sm', text: 'CSV' },
                { extend: 'excel', className: 'btn btn-sm', text: 'Excel' },
                { extend: 'print', className: 'btn btn-sm', text: 'طباعة' }
            ],
            order: [[0, 'desc']],
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('dashboard.business-project-floors.index') }}',
                data: function (d) {
                    d.branch_id = $('#branch_filter').val();
                    d.project_id = $('#project_filter').val();
                }
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'project_name', name: 'project_name' },
                { data: 'branch_name', name: 'branch_name' },
                { data: 'status', name: 'status', orderable: false, searchable: false },
                { data: 'controll', name: 'controll', orderable: false, searchable: false }
            ]
        });

        // Unified branch loader
        function loadBranches(projectId, targetSelect, selectedId = null) {
            targetSelect.html(`<option value="">${selectBranchText}</option>`);
            if (projectId) {
                $.ajax({
                    url: `/admin/get-project-branches/${projectId}`,
                    type: 'GET',
                    success: function (branches) {
                        $.each(branches, function (index, branch) {
                            const name = locale === 'ar' ? branch.name_ar : branch.name_en;
                            const selected = branch.id == selectedId ? 'selected' : '';
                            targetSelect.append(`<option value="${branch.id}" ${selected}>${name}</option>`);
                        });
                    },
                    error: function () {
                        console.error('فشل في تحميل الفروع الخاصة بالمشروع.');
                    }
                });
            }
        }

        // Filter changes
        $('#project_filter').change(function () {
            const projectId = $(this).val();
            loadBranches(projectId, $('#branch_filter'));
            table.ajax.reload();
        });

        $('#branch_filter').change(function () {
            table.ajax.reload();
        });

        // Create modal: Load branches
        $('#create_project_id').change(function () {
            loadBranches($(this).val(), $('#branch_id'));
        });

        // Edit modal: load project/branch
        $("body").on("click", ".edit", function () {
            const id = $(this).data("id");
            $('#edit_name_ar').val($(this).data("name_ar"));
            $('#edit_name_en').val($(this).data("name_en"));
            $('#edit_floor_number').val($(this).data("floor_number"));
            $('#edit_active').val($(this).data("active"));
            const projectId = $(this).data("project_id");
            const branchId = $(this).data("branch_id");

            $('#edit_project_id').val(projectId).trigger('change');
            loadBranches(projectId, $('#edit_branch_id'), branchId);

            $('#demo-form-edit').attr('action', `${window.location.origin}/admin/business-project-floors/${id}`);
        });

        // View modal
        $("body").on("click", ".view", function () {
            $('#show_name_ar').text($(this).data('name_ar'));
            $('#show_name_en').text($(this).data('name_en'));
            $('#show_floor_number').text($(this).data('floor_number') || '-');
            $('#show_type').text($(this).data('type') || '-');
            $('#show_branch_name').text($(this).data('branch_name') || '-');
            $('#show_project_name').text($(this).data('project_name') || '-');

            const active = $(this).data('active');
            const badge = active ? 'success' : 'danger';
            const text = active ? 'مفعل' : 'غير مفعل';
            $('#show_status').html(`<span class="badge badge-${badge}">${text}</span>`);
            $('#showFloorModal').modal('show');
        });

        // Toggle status
        $(document).on('change', '.change-status-switch', function () {
            const $switch = $(this);
            $.post('{{ route('dashboard.floors_statuses.change_status') }}', {
                _token: '{{ csrf_token() }}',
                id: $switch.data('id'),
                is_active: $switch.is(':checked') ? 1 : 0
            }).done(function () {
                swal({
                    title: "{{ __('dash.successful_operation') }}",
                    text: "{{ __('dash.request_executed_successfully') }}",
                    type: 'success',
                    padding: '2em'
                });
            }).fail(function (xhr) {
                console.error('Error:', xhr.responseText);
                swal({
                    title: "{{ __('dash.operation_failed') }}",
                    text: "{{ __('dash.request_failed') }}",
                    type: 'error',
                    padding: '2em'
                });
            });
        });
    });
</script>
@endpush