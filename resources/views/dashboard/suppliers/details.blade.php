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
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard.home') }}">{{ __('dash.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('dash.technicians') }}
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
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="col-md-12 text-right mb-3">

                </div>

                <ul class="nav nav-tabs mb-3" id="technicianTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-technical_data" data-toggle="tab" href="#technical_data"
                            role="tab" aria-controls="technical_data" aria-selected="true">{{ __('dash.technical_data')
                            }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="tab-settings" data-toggle="tab" href="#settings" role="tab"
                            aria-controls="settings" aria-selected="false">{{ __('dash.orders') }}</a>
                    </li>
                </ul>

                <div class="tab-content" id="technicianTabsContent">
                    <div class="tab-pane fade show active" id="technical_data" role="tabpanel"
                        aria-labelledby="tab-technical_data">

                        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dash.name') }}</th>
                                    <th>{{ __('dash.specialization') }}</th>
                                    <th>{{ __('dash.phone') }}</th>
                                    <th>{{ __('dash.group') }}</th>
                                    <th>{{ __('dash.zone') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- {{ $technician->group->region }} --}}
                                    <td>{{ $technician->id }}</td>
                                    <td>{{ $technician->name }}</td>

                                    <td>{{ $technician->specialization?->name }}</td>
                                    <td>{{ $technician->phone ?? '' }}</td>
                                    <td>{{ $technician->group?->name ?? '' }}</td>
                                    <td>{{ $technician->group?->name ?? '' }}</td>


                                </tr>
                            </tbody>
                        </table>

                    </div>



                    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="tab-settings">
                        <table id="settings-table" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>رقم الطلب</th>
                                    <th>رقم الحجز</th>
                                    <th>موعد الحجز</th>
                                    <th>الفريق</th>
                                    <th>وقت البدء</th>
                                    <th>وقت الانتهاء</th>
                                    <th>المده</th>
                                    <th>الحاله</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visits as $visit)
                                <tr>
                                    <th>{{ $visit->booking_id }}</th>
                                    <th> {{ $visit->id }}</th>
                                    <th> {{ \Carbon\Carbon::parse($visit->created_at)->format('Y-m-d') }}</th>
                                    <th>{{ $visit->group?->name }}</th>
                                    <th> {{
                                        \Carbon\Carbon::parse($visit->start_time)->timezone('Asia/Riyadh')->format('g:i
                                        A') }}
                                    </th>
                                    <th> {{
                                        \Carbon\Carbon::parse($visit->end_time)->timezone('Asia/Riyadh')->format('g:i
                                        A') }}
                                    </th>
                                    <th>{{ $visit->duration }}</th>
                                    <th>{{ $visit->status->name }}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        <div class="pagination-container">
                            {{ $visits->appends(['tab' => 'settings'])->links('vendor.pagination.bootstrap-4') }}
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    // $(document).ready(function() {
        //     var table = $('#html5-extension').DataTable({
        //         dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
        //             "<'table-responsive'tr>" +
        //             "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        //         order: [
        //             [0, 'desc']
        //         ],
        //         language: {
        //             url: "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
        //         },
        //         buttons: [{
        //                 extend: 'copy',
        //                 className: 'btn btn-sm',
        //                 text: 'نسخ'
        //             },
        //             {
        //                 extend: 'csv',
        //                 className: 'btn btn-sm',
        //                 text: 'تصدير إلى CSV'
        //             },
        //             {
        //                 extend: 'excel',
        //                 className: 'btn btn-sm',
        //                 text: 'تصدير إلى Excel'
        //             },
        //             {
        //                 extend: 'print',
        //                 className: 'btn btn-sm',
        //                 text: 'طباعة'
        //             }
        //         ],
        //         processing: true,
        //         serverSide: true,
        //         ajax: {
        //             url: route('dashboard.core.technician.details', ['id' => $technician - > id]),

        //             data: function(d) {
        //                 d.group_id = $('#group_filter').val();
        //                 d.spec_id = $('#spec_filter').val();
        //                 d['search[value]'] = $('#searchInput').val();
        //             }
        //         },
        //         columns: [{
        //                 data: 'id',
        //                 name: 'id'
        //             },
        //             {
        //                 data: 'name',
        //                 name: 'name'
        //             },
        //             {
        //                 data: 't_image',
        //                 name: 't_image',
        //                 orderable: false,
        //                 searchable: false
        //             },
        //             {
        //                 data: 'spec',
        //                 name: 'spec'
        //             },
        //             {
        //                 data: 'phone',
        //                 name: 'phone'
        //             },
        //             {
        //                 data: 'group',
        //                 name: 'group'
        //             },
        //             {
        //                 data: 'status',
        //                 name: 'status'
        //             },
        //             {
        //                 data: 'control',
        //                 name: 'control',
        //                 orderable: false,
        //                 searchable: false
        //             }
        //         ]
        //     });
        // });
</script>
@endpush