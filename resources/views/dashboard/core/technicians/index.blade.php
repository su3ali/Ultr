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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('dash.technicians') }}</li>
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



    .filter-row label {
        font-weight: 600;
        font-size: 14px;
        color: #333;
        margin-bottom: 4px;
    }

    .filter-row select.form-control {
        border-radius: 6px;
        border-color: #ced4da;
        font-size: 14px;
        padding: 6px 12px;
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

                <div class="row align-items-end filter-row">
                    <div class="col-md-3">
                        <label for="region_filter">{{ __('dash.region') }}</label>
                        <select id="region_filter" class="form-control" name="region_id">
                            <option value="all">{{ __('dash.all_regions') }}</option>
                            @foreach($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select id="dateFilter" class="form-control">
                            <option value="today" selected>{{ __('dash.technicians_today') }}</option>
                            <option value="all">{{ __('dash.all') }}</option>
                        </select>
                    </div>
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
                url: '{{ route('dashboard.core.technician.index') }}',
                data: function(d) {
                    // Add filter data to the DataTable request
                    d.group_id = $('#group_filter').val();
                    d.spec_id = $('#spec_filter').val();
                    d['search[value]'] = $('#searchInput').val(); 
                    d.date_filter = $('#dateFilter').val(); 
                    d.region_id = $('#region_filter').val(); 

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

                 $('#region_filter').change(function() {
                    table.draw(); // Redraw the table when the date filter changes
                });
            }
        });

       $(document).on('click', '#edit-tech', function () {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let user_name = $(this).data('user_name');
            let email = $(this).data('email');
            let phone = $(this).data('phone');
            let specialization = $(this).data('specialization');
            let active = $(this).data('active');
            let group_id = $(this).data('group_id');
            let day_id = $(this).data('day_id'); // JSON array or string
            let country_id = $(this).data('country_id');
            let address = $(this).data('address');
            let wallet_id = $(this).data('wallet_id');
            let birth_date = $(this).data('birth_date');
            let identity_number = $(this).data('identity_number');
            let image = $(this).data('image');

            // Defensive fix for day_id to ensure it's always an array
            let selectedDays = Array.isArray(day_id) ? day_id : (day_id ? JSON.parse(day_id) : []);
            
            // Fill form fields
            $('#tech_id').val(id);
            $('#edit_name').val(name);
            $('#edit_user_name').val(user_name);
            $('#edit_email').val(email);
            $('#edit_phone').val(phone);
            $('#edit_spec').val(specialization).trigger('change');
            $('#edit_group').val(group_id).trigger('change');
            $('#edit_day_id').val(selectedDays).trigger('change');
            $('#edit_country_id').val(country_id).trigger('change');
            $('#edit_wallet').val(wallet_id).trigger('change');
            $('#edit_birth').val(birth_date);
            $('#edit_identity_id').val(identity_number);
            $('#edit_address').val(address);

            // Handle active status checkbox
            $('#edit_status').prop('checked', Boolean(active));

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