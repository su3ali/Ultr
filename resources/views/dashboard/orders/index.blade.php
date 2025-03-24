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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('dash.client_orders') }}</li>
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>


    </header>
</div>

{{-- @include('dashboard.orders.create') --}}
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
            <div class="widget-content widget-content-area br-6" style="width: 95%">
                <div class="col-md-12  mb-3">


                    <div class="row">



                        <div class="col-md-1">
                            <label for="inputEmail4"> {{ __('dash.status') }}
                            </label>
                        </div>
                        <div class="col-md-4">
                            <select class="select2 status_filter form-control" name="status_filter">
                                <option value="all" selected>الكل</option>
                                @foreach ($statuses as $id => $status)
                                <option value="{{ $id }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                </div>
                <div class="col-md-12 text-right mb-3">

                    {{-- <button type="button" id="" class="btn btn-primary card-tools" data-toggle="modal" --}} {{--
                        data-target="#createOrderModel"> --}}
                        {{-- {{__('dash.add_new')}} --}}
                        {{-- </button> --}}

                    <a href="{{ route('dashboard.orders.create') }}" id="" class="btn btn-primary card-tools">
                        {{ __('dash.add_new') }}
                    </a>

                </div>
                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('dash.order_number') }}</th>
                            <th>{{ __('dash.booking_number') }}</th>
                            <th>{{ __('dash.customer_name') }}</th>
                            <th>{{ __('dash.phone') }}</th>
                            <th>{{ __('dash.service') }}</th>
                            <th>{{ __('dash.quantity') }}</th>
                            <th>{{ __('dash.price_value') }}</th>
                            <th>{{ __('dash.payment_method') }}</th>
                            <th>{{ __('dash.zone') }}</th>
                            <th>{{ __('dash.status') }}</th>
                            <th>{{ __('dash.date') }}</th>

                            <th class="no-content">{{ __('dash.actions') }}</th>
                        </tr>
                    </thead>
                </table>


            </div>
        </div>

    </div>

</div>
{{-- @include('dashboard.orders.edit') --}}
@include('dashboard.orders.partial.show_bookings')
@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function() {
            var table = $('#html5-extension').DataTable({
                dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-4 d-flex justify-content-md-start justify-content-center'l><'col-sm-12 col-md-4 d-flex justify-content-center'B><'col-sm-12 col-md-4 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count mb-sm-0 mb-3'i><'dt--pagination'p>>",

                lengthMenu: [
                    [10, 25, 50, 100, 200, 500, 1000, 2000, 5000, 10000, 20000],
                    [10, 25, 50, 100, 200, 500, 1000, 2000, 5000, 10000, 20000]
                ],
                pageLength: 10,
                order: [
                    [0, 'desc']
                ],
                "language": {
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
                responsive: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('dashboard.orders.index') }}',
                    data: function(d) {

                       

                        d.start = d.start; 
                        d.length = d.length; 


                    }
                },
                pagingType: 'full_numbers',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'booking_id',
                        name: 'booking_id'
                    },
                    {
                        data: 'user',
                        name: 'user'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'service',
                        name: 'service'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'payment_method',
                        name: 'payment_method'
                    },
                    {
                        data: 'region',
                        name: 'region'
                    },

                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'control',
                        name: 'control',
                        orderable: false,
                        searchable: false
                    },
                ],



            });
            $('input[type="search"]').on('input', function() {
                table.ajax.reload();
            });

            function updateTableData() {
                var status_filter = $('.status_filter').val();
                var url = '{{ route('dashboard.orders.index') }}';

                if (status_filter && status_filter !== 'all') {
                    url += '?status=' + status_filter;
                }

                // Update table data
                table.ajax.url(url).load();
            }



            $('.status_filter').change(function() {
                updateTableData();
            });

            // Trigger table reload when search input changes
            $('input[type="search"]').on('input', function() {
                table.ajax.reload();
            });

        });






        /*         {{-- $(document).on('click', '#edit-order', function () { --}}
                {{--    let id = $(this).data('id'); --}}
                {{--    let user_id = $(this).data('user_id'); --}}
                {{--    let category_id = $(this).data('category_id'); --}}
                {{--    let service_id = $(this).data('service_id'); --}}
                {{--    let price = $(this).data('price'); --}}
                {{--    let payment_method = $(this).data('payment_method'); --}}
                {{--    let notes = $(this).data('notes'); --}}
                {{--    $('#edit_customer_name').val(user_id).trigger('change') --}}
                {{--    $('#edit_category_id').val(category_id).trigger('change') --}}
                {{--    $('#edit_service_id').val(service_id).trigger('change') --}}
                {{--    $('#edit_price').val(price) --}}
                {{--    $('#edit_notes').html(notes) --}}

                {{--    if (payment_method === 'visa'){ --}}
                {{--        $('#edit_payment_method_visa').prop('checked', true) --}}
                {{--        $('#edit_payment_method_cache').prop('checked', false) --}}
                {{--    }else { --}}
                {{--        $('#edit_payment_method_visa').prop('checked', false) --}}
                {{--        $('#edit_payment_method_cache').prop('checked', true) --}}
                {{--    } --}}
                {{--    let action = "{{route('dashboard.orders.update', 'id')}}"; --}}
                {{--    action = action.replace('id', id) --}}
                {{--    $('#edit_order_form').attr('action', action); --}}


                {{-- }) --}} */

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
                    })
                }
            });
        })
</script>
@endpush