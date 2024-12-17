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
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.home') }}">{{ __('dash.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('dash.trainees') }}</li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>


        </header>
    </div>

    @include('dashboard.core.trainees.create')
@endsection

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="col-md-12 text-right mb-3">

                        <button type="button" id="" class="btn btn-primary card-tools" data-toggle="modal"
                            data-target="#technicianModal">
                            {{ __('dash.add_trainee') }}
                        </button>

                    </div>
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('dash.name') }}</th>
                                <th>{{ __('dash.rate') }}</th>
                                <th>{{ __('dash.upgrade_trainee') }}</th>

                                <th>المرفق</th>

                                <th>{{ __('dash.note') }}</th>

                                <th class="no-content">{{ __('dash.actions') }}</th>
                            </tr>
                        </thead>
                    </table>


                </div>
            </div>

        </div>

    </div>
    @include('dashboard.core.trainees.edit')
@endsection

@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#html5-extension').DataTable({
                dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                order: [
                    [0, 'desc']
                ],
                "language": {
                    "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
                },
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm',
                        text: 'نسخ'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm',
                        text: 'تصدير إلى CSV'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm',
                        text: 'تصدير إلى Excel'
                    },

                    {
                        extend: 'print',
                        className: 'btn btn-sm',
                        text: 'طباعة'
                    }
                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('dashboard.core.trainee.index') }}',
                    data: function(d) {
                        // Add filter data to the DataTable request
                        d.group_id = $('#group_filter').val();
                        d.spec_id = $('#spec_filter').val();
                        d['search[value]'] = $('#searchInput')
                            .val(); // Use the correct key to pass search value
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'rate',
                        name: 'rate'
                    },


                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'file',
                        name: 'file'
                    },
                    {
                        data: 'note',
                        name: 'note'
                    },

                    {
                        data: 'control',
                        name: 'control',
                        orderable: false,
                        searchable: false
                    }
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
                }
            });
        });



        $(document).on('click', '#edit-tech', function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let user_name = $(this).data('user_name');
            let email = $(this).data('email');
            let phone = $(this).data('phone');
            let specialization = $(this).data('specialization');
            let is_trainee = $(this).data('is_trainee');
            let group_id = $(this).data('group_id');
            let country_id = $(this).data('country_id');
            let address = $(this).data('address');
            let wallet_id = $(this).data('wallet_id');
            let birth_date = $(this).data('birth_date');
            let identity_number = $(this).data('identity_number');
            let image = $(this).data('image');
            $('#tech_id').val(id)
            $('#edit_name').val(name)
            $('#edit_user_name').val(user_name)
            $('#edit_email').val(email)
            $('#edit_phone').val(phone)
            $('#edit_spec').val(specialization).trigger('change')
            $('#edit_group').val(group_id).trigger('change')
            $('#edit_country_id').val(country_id).trigger('change')
            $('#edit_address').html(address)
            $('#edit_wallet').val(wallet_id).trigger('change')
            $('#edit_birth').val(birth_date)
            $('#edit_identity_id').val(identity_number)
            if (is_trainee && is_trainee === 1) {
                $('#edit_status').prop('checked', true)
            } else {
                $('#edit_status').prop('checked', false)
            }
            debugger
            // $('.editImage .custom-file-container__image-preview').css('background-image', 'url(' + 'data:image/png;base64,' + img + ')');
            //
            let action = "{{ route('dashboard.core.trainee.update', 'id') }}";
            action = action.replace('id', id)
            $('#edit_tech_form').attr('action', action);


        })

        $("body").on('change', '#customSwitchtech', function() {
            let is_trainee = $(this).is(':checked');
            let id = $(this).attr('data-id');

            $.ajax({
                url: '{{ route('dashboard.core.trainee.change_status') }}',
                type: 'get',

                data: {
                    id: id,
                    is_trainee: is_trainee
                },

                success: function(data) {
                    swal({
                        title: "{{ __('dash.successful_operation') }}",
                        text: "{{ __('api.trainee_upgrade') }}",
                        type: 'success',
                        padding: '2em'
                    })
                }
            });
        })
    </script>
@endpush
