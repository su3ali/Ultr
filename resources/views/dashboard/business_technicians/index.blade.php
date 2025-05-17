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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('dash.business_technicians') }}
                            </li>
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>


    </header>
</div>

@include('dashboard.core.technicians.create')
@endsection
<style>
    .whatsapp-link {
        color: #0074cc;
        /* Default color */
        text-decoration: none;
        /* Remove underline */
    }

    .whatsapp-link:hover {
        color: #25d366;
        /* Color on hover (WhatsApp green) */
    }
</style>
@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="col-md-12 text-right mb-3">

                    <button type="button" id="" class="btn btn-primary card-tools" data-toggle="modal"
                        data-target="#technicianModal">
                        {{ __('dash.add_new') }}
                    </button>

                </div>

                <div class="col-md-4">
                    <select id="dateFilter" class="form-control">
                        <option value="today" selected>{{ __('dash.technicians_today') }}</option>
                        <option value="all">{{ __('dash.all') }}</option>
                    </select>
                </div>


                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('dash.name') }}</th>
                            <th>{{ __('dash.image') }}</th>
                            <th>{{ __('dash.specialization') }}</th>
                            <th>{{ __('dash.phone') }}</th>
                            <th>{{ __('dash.group') }}</th>
                            <th>{{ __('dash.zone') }}</th>
                            <th>{{ __('dash.status') }}</th>
                            <th class="no-content">{{ __('dash.actions') }}</th>
                        </tr>
                    </thead>
                </table>


            </div>
        </div>

    </div>

</div>
@include('dashboard.core.technicians.edit')
@endsection
@push('script')
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#html5-extension').DataTable({
            dom: "<'dt--top-section d-flex justify-content-between align-items-center'<'col-sm-12 col-md-4 d-flex justify-content-start'l><'col-sm-12 col-md-4 d-flex justify-content-center'B><'col-sm-12 col-md-4 d-flex justify-content-end'f>>" +
                "<'table-responsive'tr>" + // Table rows
                "<'dt--bottom-section d-flex justify-content-between'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'p>>" +
                "<'dt--pages-count text-center mt-2'i>", // Entry count at the bottom-center

            order: [
                [0, 'desc']
            ],
            pageLength: 10,
            lengthMenu: [
                [10, 30, 100, 200],
                [10, 30, 100, 200]
            ],
            language: {
                "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
            },
            buttons: [
                { extend: 'copy', className: 'btn btn-sm', text: '{{ __("dash.copy") }}' },
                { extend: 'csv', className: 'btn btn-sm', text: '{{ __("dash.csv") }}' },
                { extend: 'excel', className: 'btn btn-sm', text: '{{ __("dash.excel") }}' },
                { extend: 'print', className: 'btn btn-sm', text: '{{ __("dash.print") }}' }
            ],
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('dashboard.businessTechnician.index') }}',
                data: function(d) {
                    // Add filter data to the DataTable request
                    d.group_id = $('#group_filter').val();
                    d.spec_id = $('#spec_filter').val();
                    d['search[value]'] = $('#searchInput').val(); 
                    d.date_filter = $('#dateFilter').val(); // Get the selected value from dropdown
                }
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 't_image', name: 't_image', orderable: false, searchable: false },
                { data: 'spec', name: 'spec' },
                { data: 'phone', name: 'phone' },
                { data: 'group', name: 'group' },
                { data: 'region', name: 'region' },
                { data: 'status', name: 'status' },
                { data: 'control', name: 'control', orderable: false, searchable: false }
            ],
            initComplete: function() {
                // Set up group and spec filter dropdowns
                $('#group_filter').change(function() {
                    table.draw();
                });

                $('#spec_filter').change(function() {
                    table.draw();
                });

                // Search functionality
                $('#searchInput').keyup(function() {
                    table.draw();
                });

                // Date Filter functionality
                $('#dateFilter').change(function() {
                    table.draw(); // Redraw the table when the date filter changes
                });
            }
        });

       $(document).on('click', '#edit-tech', function() {
    let id = $(this).data('id');
    let name = $(this).data('name');
    let user_name = $(this).data('user_name');
    let email = $(this).data('email');
    let phone = $(this).data('phone');
    let specialization = $(this).data('specialization');
    let active = $(this).data('active');
    let group_id = $(this).data('group_id');
    let day_id = $(this).data('day_id');
    let country_id = $(this).data('country_id');
    let address = $(this).data('address');
    let wallet_id = $(this).data('wallet_id');
    let birth_date = $(this).data('birth_date');
    let identity_number = $(this).data('identity_number');
    let image = $(this).data('image');

    let is_business = $(this).data('is_business');
    let client_project_id = $(this).data('client_project_id');
    let branch_id = $(this).data('branch_id');
    let floor_ids = $(this).data('floor_ids'); // should be array like [1,2,3]

    // Fill form fields
    $('#tech_id').val(id);
    $('#edit_name').val(name);
    $('#edit_user_name').val(user_name);
    $('#edit_email').val(email);
    $('#edit_phone').val(phone);
    $('#edit_spec').val(specialization).trigger('change');
    $('#edit_group').val(group_id).trigger('change');
    $('#edit_day_id').val(day_id).trigger('change');
    $('#edit_country_id').val(country_id).trigger('change');
    $('#edit_wallet').val(wallet_id).trigger('change');
    $('#edit_birth').val(birth_date);
    $('#edit_identity_id').val(identity_number);
    $('#edit_address').val(address);

    // Handle active status checkbox
    $('#edit_status').prop('checked', Boolean(active));

    // Technician Type
    if (is_business == 1) {
        $('#edit_businessTech').prop('checked', true).trigger('change');
        $('#editBusinessFields').slideDown();

        // Select Project
        $('#edit_client_project_id').val(client_project_id).trigger('change');

        // Load branches dynamically
        $.get(`/admin/get-project-branches/${client_project_id}`, function (branches) {
            $('#edit_branch_id').html('<option value="">{{ __("dash.choose") }}</option>');
            $.each(branches, function (i, branch) {
                $('#edit_branch_id').append(`<option value="${branch.id}">${branch.name_ar}</option>`);
            });

            // Set selected branch
            $('#edit_branch_id').val(branch_id).trigger('change');

            // Load floors dynamically
            $.get(`/admin/get-branch-floors/${branch_id}`, function (floors) {
                $('#edit_floor_ids').empty();
                $.each(floors, function (i, floor) {
                    $('#edit_floor_ids').append(`<option value="${floor.id}">${floor.name_ar}</option>`);
                });

                // Set selected floors (multiple)
                if (floor_ids && floor_ids.length > 0) {
                    $('#edit_floor_ids').val(floor_ids).trigger('change');
                }
            });
        });

    } else {
        $('#edit_personalTech').prop('checked', true).trigger('change');
        $('#editBusinessFields').slideUp();
    }

    // Set form action
    let action = "{{ route('dashboard.core.technician.update', 'id') }}";
    $('#edit_tech_form').attr('action', action.replace('id', id));
});


        $("body").on('change', '#customSwitchtech', function() {
            let active = $(this).is(':checked');
            let id = $(this).attr('data-id');

            $.ajax({
                url: '{{ route('dashboard.core.technician.change_status') }}',
                type: 'get',
                data: {
                    id: id,
                    active: active
                },
                success: function(data) {
                    swal({
                        title: "{{ __('dash.successful_operation') }}",
                        text: "{{ __('dash.request_executed_successfully') }}",
                        type: 'success',
                        padding: '2em'
                    });
                }
            });
        });
    });


    
</script>
@endpush