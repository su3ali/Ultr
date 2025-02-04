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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">{{ __('dash.home')
                                    }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('dash.suppliers') }}</li>
                        </ol>
                    </nav>
                </div>
            </li>
        </ul>
    </header>
</div>
@endsection


@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="col-md-12 text-right mb-3">
                    <button type="button" id="add-supplier-btn" class="btn btn-primary card-tools" data-toggle="modal"
                        data-target="#supplierModal">
                        {{ __('dash.add_supplier') }}
                    </button>
                </div>
                <table id="suppliers-table" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('dash.name') }}</th>
                            <th>{{ __('dash.email') }}</th>
                            <th>{{ __('dash.phone') }}</th>
                            <th>{{ __('dash.address') }}</th>
                            <th class="no-content">{{ __('dash.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('dashboard.core.suppliers.create')
@include('dashboard.core.suppliers.edit')
@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#suppliers-table').DataTable({
            dom: "<'dt--top-section d-flex justify-content-between align-items-center'<'col-sm-12 col-md-4 d-flex justify-content-start'l><'col-sm-12 col-md-4 d-flex justify-content-center'B><'col-sm-12 col-md-4 d-flex justify-content-end'f>>" +
                "<'table-responsive'tr>" + // Table rows
                "<'dt--bottom-section d-flex justify-content-between'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'p>>" +
                "<'dt--pages-count text-center mt-2'i>", // Entry count at the bottom-center

            order: [[0, 'desc']],
            pageLength: 10,
            lengthMenu: [
                [10, 30, 100, 200],
                [10, 30, 100, 200]
            ],
            language: {
                "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
            },
            buttons: [
                {
                            extend: 'copy',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.copy") }}'


                        },
                        {
                            extend: 'csv',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.csv") }}'
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.excel") }}'
                        },
                        {
                            extend: 'print',
                            className: 'btn btn-sm',
                            text: '{{ __("dash.print") }}'
                        }
            ],
            processing: true,
            serverSide: true,
            ajax: '{{ route('dashboard.core.suppliers.index') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'supplier_name', name: 'supplier_name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'address', name: 'address' },
                {
                        data: 'control',
                        name: 'control',
                        orderable: false,
                        searchable: false
                    }
            ]
        });

        $(document).on('click', '#edit-supplier', function () {
    // Retrieve the data attributes from the clicked button
    let supplierData = $(this).data();
    console.log(supplierData); // Debugging

    // Assign values to the modal fields
    $('#edit_supplier_id').val(supplierData.id);
    $('#edit_email').val(supplierData.email);
    $('#edit_phone').val(supplierData.phone);
    $('#edit_name_ar').val(supplierData.name_ar);
    $('#edit_name_en').val(supplierData.name_en);
    $('#edit_tax_number').val(supplierData.tax_number);
    $('#edit_address').val(supplierData.address);

    // Dynamically update the form action URL
    let updateUrl = "{{ route('dashboard.core.suppliers.update', ':id') }}".replace(':id', supplierData.id);
    $('#edit_supplier_form').attr('action', updateUrl);
});

});



       



    
</script>

@endpush