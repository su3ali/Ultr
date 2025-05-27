@extends('dashboard.layout.layout')

@section('sub-header')
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse">
            <i class="feather feather-menu"></i>
        </a>
        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">{{ __('dash.home')
                                    }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('dash.customer_orders') }}</li>
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
        <div class="col-12 mb-3">
            <h5 class="fw-bold">
                {{ __('dash.customer_orders') }}:
                <span class="text-primary">#{{ $user->id }}</span>
                <span class="ms-2">{{ $user->first_name }} {{ $user->last_name }}</span>
            </h5>
        </div>

        <div class="col-12">
            <div class="widget-content widget-content-area br-6">

                {{-- Filters --}}
                <div class="row mb-4">
                    <div class="col-md-2">
                        <label>{{ __('dash.status') }}</label>
                        <select id="status_filter" class="form-control">
                            <option value="">{{ __('dash.all') }}</option>
                            @foreach ($statuses as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>{{ __('dash.from') }}</label>
                        <input type="date" class="form-control" id="date_from">
                    </div>
                    <div class="col-md-3">
                        <label>{{ __('dash.to') }}</label>
                        <input type="date" class="form-control" id="date_to">
                    </div>
                </div>

                {{-- Orders Table --}}
                <div class="table-responsive">
                    <table id="orders-table" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('dash.status') }}</th>
                                <th>{{ __('dash.service') }}</th>
                                <th>{{ __('dash.payment_method') }}</th>
                                <th>{{ __('dash.price') }}</th>
                                <th>{{ __('dash.date') }}</th>
                                {{-- <th>{{ __('dash.control') }}</th> --}}
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(function () {
        const table = $('#orders-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("dashboard.customer.orders", $customer_id) }}',
                data: function (d) {
                    d.status = $('#status_filter').val();
                    d.date   = $('#date_from').val();
                    d.date2  = $('#date_to').val();
                }
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'status', name: 'status.name_ar', className: 'text-center' },
                { data: 'services', name: 'services.title', orderable: false, searchable: false },
                { data: 'payment', name: 'transaction.payment_method', orderable: false, searchable: false, className: 'text-center' },
                { data: 'total', name: 'total', render: $.fn.dataTable.render.number(',', '.', 2), className: 'text-end' },
                { data: 'created_at', name: 'created_at', className: 'text-center' },
                // { data: 'actions', orderable: false, searchable: false, className: 'text-center' }
            ],
            language: {
                url: '{{ app()->getLocale() === "ar"
                    ? "//cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json"
                    : "//cdn.datatables.net/plug-ins/1.11.3/i18n/en-gb.json" }}'
            },
            order: [[0, 'desc']]
        });

        $('#status_filter, #date_from, #date_to').on('change', function () {
            table.ajax.reload();
        });
    });
</script>
@endpush