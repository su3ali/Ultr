@extends('dashboard.layout.layout')

@section('sub-header')
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
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
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard.home') }}">{{ __('dash.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('dash.business_orders') }}
                            </li>
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
        <div class="col-xl-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="text-right mb-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                        {{ __('dash.add_new') }}
                    </button>
                </div>

                <table id="ordersTable" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('dash.customer_name') }}</th>
                            <th>{{ __('dash.category') }}</th>
                            <th>{{ __('dash.service') }}</th>
                            <th>{{ __('dash.price') }}</th>
                            <th>{{ __('dash.payment_method') }}</th>
                            <th>{{ __('dash.status') }}</th>
                            <th>{{ __('dash.created_at') }}</th>
                            <th class="no-content">{{ __('dash.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('dashboard.business_orders.create')
{{-- @include('dashboard.business_orders.edit_modal') --}}
@endsection

@push('script')
<script>
    $(function () {
        $('#ordersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("dashboard.business_orders.index") }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'user', name: 'user' },
                { data: 'category', name: 'category' },
                { data: 'service', name: 'service' },
                { data: 'price', name: 'price' },
                { data: 'paymentMethod.name_ar', name: 'paymentMethod.name_ar' },
                { data: 'status_id', name: 'status_id' },
                { data: 'created_at', name: 'created_at' },
                { data: 'controll', name: 'controll', orderable: false, searchable: false }
            ],
            language: {
                url: "{{ app()->getLocale() === 'ar'
                    ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json'
                    : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
            }
        });
    });
</script>
@endpush