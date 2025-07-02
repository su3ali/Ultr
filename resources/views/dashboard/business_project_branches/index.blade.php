@extends('dashboard.layout.layout')

@section('sub-header')
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
        </a>

        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 py-2">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">{{ __('dash.home')
                                    }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">مشاريع العملاء</li>
                        </ol>
                    </nav>
                </div>
            </li>
        </ul>
    </header>
</div>

@include('dashboard.business_projects.create')
@endsection

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="col-md-12 text-right mb-3">
                    <button type="button" id="add-work-exp" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModal">
                        {{ __('dash.add_new') }}
                    </button>
                </div>
                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('dash.name') }}</th>
                            <th class="no-content">{{ __('dash.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('dashboard.business_projects.edit')
@endsection



@push('script')
<script type="text/javascript">
    $(document).ready(function () {
        const table = $('#html5-extension').DataTable({
            dom: "<'dt--top-section'<'row'<'col-md-6'B><'col-md-6'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count'i><'dt--pagination'p>>",
            language: {
                url: "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
            },
            buttons: [
                { extend: 'copy', className: 'btn btn-sm', text: 'نسخ' },
                { extend: 'csv', className: 'btn btn-sm', text: 'تصدير إلى CSV' },
                { extend: 'excel', className: 'btn btn-sm', text: 'تصدير إلى Excel' },
                { extend: 'print', className: 'btn btn-sm', text: 'طباعة' }
            ],
            order: [[0, 'desc']],
            processing: true,
            serverSide: false,
            ajax: '{{ route('dashboard.business_projects.index') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'controll', name: 'controll', orderable: false, searchable: false },
            ]
        });

        // Fix class to match the button generated from controller: class="btn btn-primary btn-sm edit"
        $("body").on('click', '.edit', function () {
            const button = $(this);
            const name_ar = button.data('name_ar');
            const name_en = button.data('name_en');
            const id = button.data('id');

            // Set form values
            $('#editModel #name_ar').val(name_ar);
            $('#editModel #name_en').val(name_en);

            // Set form action dynamically
            const actionUrl = "{{ url('dashboard/business-projects') }}/" + id;
            $('#editModel #demo-form-edit').attr('action', actionUrl);

            // Show modal
            $('#editModel').modal('show');
        });
    });
</script>
@endpush