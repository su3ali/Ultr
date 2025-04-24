@extends('dashboard.layout.layout')




@section('sub-header')
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">

        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-menu">
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
                            <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">{{__('dash.home')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> {{ __('dash.project_brnaches') }}
                            </li>
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>


    </header>
</div>
@if ($errors->any() && session('edit_mode'))
@push('script')
<script>
    $(document).ready(function () {
                $('#editModel').modal('show');
            });
</script>
@endpush
@endif

@include('dashboard.business-project-branches.create')
@endsection


@section('content')


<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="col-md-12 text-right mb-3">

                    <button type="button" id="add-work-exp" class="btn btn-primary card-tools" data-toggle="modal"
                        data-target="#exampleModal">
                        {{__('dash.add_new')}}
                    </button>

                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="client_project_filter" class="form-label d-block text-muted mb-2">
                            {{ __('dash.filter_by_project') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0">
                                    <i class="fas fa-filter text-primary"></i>
                                </span>
                            </div>
                            <select id="client_project_filter" class="form-control border-left-0">
                                <option value="">{{ __('dash.all') }}</option>
                                @foreach($clientProjects as $project)
                                <option value="{{ $project->id }}">
                                    {{ app()->getLocale() == 'ar' ? $project->name_ar : $project->name_en }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('dash.name')}}</th>
                            <th>{{__('dash.project_name')}}</th>
                            <th class="no-content">{{__('dash.actions')}}</th>
                        </tr>
                    </thead>
                </table>


            </div>
        </div>

    </div>

</div>
@include('dashboard.business-project-branches.edit')

@endsection


@push('script')
<script type="text/javascript">
    let table;

    $(document).ready(function () {
        table = $('#html5-extension').DataTable({
            dom:
                "<'row mb-3'" +
                    "<'col-12 text-center'B>" +
                ">" +
                "<'row mb-3'" +
                    "<'col-md-3 offset-md-7 d-flex justify-content-end'f>" +
                ">" +
                "<'table-responsive'tr>" +
                "<'row mt-3'" +
                    "<'col-sm-12 col-md-6 text-left'i>" +
                    "<'col-sm-12 col-md-6 text-right'p>" +
                ">",
            language: {
                url: "{{ app()->getLocale() == 'ar' 
                    ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' 
                    : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
            },
            buttons: [
                { extend: 'copy', className: 'btn btn-sm', text: 'نسخ' },
                { extend: 'csv', className: 'btn btn-sm', text: 'تصدير إلى CSV' },
                { extend: 'excel', className: 'btn btn-sm', text: 'تصدير إلى Excel' },
                { extend: 'print', className: 'btn btn-sm', text: 'طباعة' }
            ],
            order: [[0, 'desc']],
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('dashboard.business-project-branches.index') }}',
                data: function (d) {
                    d.client_project_id = $('#client_project_filter').val();
                }
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'project_name', name: 'project_name' },
                { data: 'controll', name: 'controll', orderable: false, searchable: false }
            ]
        });

        // تحريك شريط البحث 20%
        setTimeout(() => {
            $('.dataTables_filter').css('margin-left', '20%');
        }, 150);

        // تحديث الجدول عند تغيير الفلتر
        $('#client_project_filter').change(function () {
            table.ajax.reload();
        });

        // فتح مودال التعديل وتعبئة البيانات
        $("body").on('click', '.edit', function () {
            const id = $(this).data('id');
            const name_ar = $(this).data('name_ar');
            const name_en = $(this).data('name_en');
            const project_id = $(this).data('client_project_id');

            $('#name_ar').val(name_ar);
            $('#name_en').val(name_en);

            // تنظيف وتعيين المشروع المختار
            $('#edit_client_project_id option').prop('selected', false);
            $('#edit_client_project_id').val(project_id);

            const action = window.location.origin + '/admin/business-project-branches/' + id;
            $('#demo-form-edit').attr('action', action);
        });
    });
</script>
@endpush