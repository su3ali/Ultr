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

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="col-md-12 text-right mb-3">

                    <button type="button" id="add-work-exp" class="btn btn-primary card-tools" data-toggle="modal"
                        data-target="#exampleModal">
                        {{__('dash.add_new')}}
                    </button>

                </div>
                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('dash.name')}}</th>
                            <th class="no-content">{{__('dash.actions')}}</th>
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
        $('#html5-extension').DataTable({
            dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
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
            serverSide: false,
            ajax: '{{ route('dashboard.business_projects.index') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'controll', name: 'controll', orderable: false, searchable: false },
            ]
        });

        // Handle edit-project button click
        $('body').on('click', '.edit-project', function () {
    const btn = $(this);

    $('#edit_name_ar').val(btn.data('name_ar'));
    $('#edit_name_en').val(btn.data('name_en'));
    $('#edit_admin_first_name').val(btn.data('admin_first_name'));
    $('#edit_admin_last_name').val(btn.data('admin_last_name'));
    $('#edit_admin_phone').val(btn.data('admin_phone'));
    $('#edit_admin_email').val(btn.data('admin_email'));

    $('#demo-form-edit').attr('action', btn.data('action'));
    $('#editModel').modal('show');
});

    });
</script>
@endpush