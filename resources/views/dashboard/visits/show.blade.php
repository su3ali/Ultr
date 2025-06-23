@extends('dashboard.layout.layout')
@push('style')
<link href="{{ asset('css/VisitShowStyle.css') }}" rel="stylesheet" type="text/css" />
<style>
    .table td,
    .table th {
        vertical-align: middle !important;
    }

    .table .table-secondary th {
        background-color: #f8f9fa;
        font-weight: bold;
        text-align: center;
    }
</style>

@endpush

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
                            <li class="breadcrumb-item active" aria-current="page">عرض الطلب</li>
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

        <div class="col-xl-6 col-lg-6 col-sm-6  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-5">
                                <h3 class="card-title">تفاصيل الطلب</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">

                        <table class="table table-bordered nowrap">

                            <thead>

                                <tr>
                                    <th>رقم الزياره</th>
                                    <td>{{ $visits->visite_id }}</td>
                                </tr>
                                <tr>
                                    @if ($visits->booking && $visits->booking->type == 'service')
                                    <th>اسم التصنيف</th>
                                    <td>{{ $visits->booking?->category?->title }}</td>
                                    @else
                                    <th>اسم الباقه</th>
                                    <td>{{ $visits->booking?->package?->name }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>اسماء الخدمات</th>

                                    <td>
                                        @foreach ($services as $service)
                                        <button class="btn-sm btn-primary">{{ $service }}</button>
                                        @endforeach
                                    </td>

                                </tr>
                                <tr>
                                    <th>اسم المجموعه الفنيه</th>
                                    <td>{{ $visits->group?->name }}</td>
                                </tr>
                                <tr>
                                    <th>موعد الزياره</th>
                                    <td>{{ $visits->booking?->date }}</td>
                                </tr>

                                <tr>
                                    <th>تاريخ البدء</th>
                                    <td>{{ Carbon\Carbon::parse($visits->start_time)->format('g:ia') }}</td>
                                </tr>

                                <tr>
                                    <th>تاريخ الانتهاء</th>
                                    <td>{{ Carbon\Carbon::parse($visits->end_time)->format('g:ia') }}</td>
                                </tr>

                                <tr>
                                    <th>الحاله</th>
                                    <td>{{ $visits->status?->name }}</td>
                                </tr>
                                @if ($visits->start_date)
                                <tr>
                                    <th>وقت البدء الفعلي</th>
                                    <td>{{ Carbon\Carbon::parse($visits->start_date)->format('g:ia') }}</td>
                                </tr>
                                @endif
                                @if ($visits->end_date)
                                <tr>
                                    <th>وقت الاننتهاء الفعلي</th>
                                    <td>{{ Carbon\Carbon::parse($visits->end_date)->format('g:ia') }}</td>
                                </tr>
                                @endif
                                @if ($visits->visits_status_id == 6)
                                <tr>
                                    <th>سبب الالغاء</th>
                                    <td>{{ $visits->cancelReason?->reason }}</td>
                                </tr>
                                @endif

                                @if ($visits->visits_status_id == 5)
                                <tr>
                                    <th>صوره اكتمال الطلب</th>
                                    <td>
                                        <a href="{{ asset($visits->image) }}" target="_blank">
                                            <img class="img-fluid" style="width: 40px;"
                                                src="{{ asset($visits->image) }}" target="_blank">
                                        </a>
                                    </td>
                                </tr>
                                @endif

                                <tr>
                                    <th>الملاحظات</th>
                                    <td>{!! $visits->note !!}</td>
                                </tr>

                                <tr>
                                    <th>اسم العميل</th>
                                    <td>{{ $user->first_name }}</td>
                                </tr>

                                <tr>
                                    <th>رقم العميل</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>

                                {{-- Car Details Section --}}
                                <tr class="table-secondary">
                                    <th colspan="2" class="text-center">تفاصيل السيارة</th>
                                </tr>

                                <tr>
                                    <th>رقم اللوحة</th>
                                    <td>{{ $user->cars->first()?->Plate_number ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>نوع السيارة</th>
                                    <td>{{ $user->cars->first()?->type?->name_ar ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>لون السيارة</th>
                                    <td>{{ $user->cars->first()?->color ?? '-' }}</td>
                                </tr>






                            </thead>

                        </table><!-- end of table -->


                    </div>
                    <!-- /.card-body -->
                </div>


            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-sm-6  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="card">
                    <div class="card-body p-0">
                        <button id="copy-location" class="btn btn-primary">Copy Location URL</button>
                        <div id="floating-panel">
                            <b>Mode of Travel: </b>
                            <select id="mode">
                                <option value="DRIVING">Driving</option>
                                <option value="WALKING">Walking</option>
                                <option value="BICYCLING">Bicycling</option>
                                <option value="TRANSIT">Transit</option>
                            </select>
                        </div>
                        <div id="map">

                        </div>



                    </div>
                    <!-- /.card-body -->
                </div>


            </div>
        </div>



        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="card">
                    <div class="card-body p-0">

                        <div class="stepper-horizontal" id="stepper1">
                            @foreach ($visit_status as $key => $status)
                            <div class="step" data-id="{{ $status->id }}">
                                <div class="step-circle">
                                    {{-- <span>{{$status->id}}</span> --}}
                                </div>
                                <div class="step-title">{{ $status->name }}</div>
                                @if ($key != $visit_status->keys()->last())
                                <div class="step-bar-left"></div>
                                @endif

                            </div>
                            @endforeach

                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>


            </div>
        </div>


    </div>

</div>
@endsection

@php
$latUser = $visits->booking?->address?->lat;
$longUser = $visits->booking?->address?->long;
$latTechn = $visits->lat ?? 0;
$longTechn = $visits->long ?? 0;

$locations = [['lat' => $latUser, 'lng' => $longUser], ['lat' => $latTechn, 'lng' => $longTechn]];
@endphp
@push('script')
<script type="text/javascript">
    $(document).ready(function() {
            $('#html5-extension').DataTable({
                dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                order: [
                    [0, 'desc']
                ],
                "language": {
                    "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json' }}"
                },
                processing: true,
                serverSide: false,
                ajax: '{{ route('dashboard.visits.index') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'visite_id',
                        name: 'visite_id'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'group_name',
                        name: 'group_name'
                    },
                    {
                        data: 'start_time',
                        name: 'start_time'
                    },
                    {
                        data: 'end_time',
                        name: 'end_time'
                    },
                    {
                        data: 'duration',
                        name: 'duration'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'control',
                        name: 'control',
                        orderable: false,
                        searchable: false
                    },

                ]
            });
            document.getElementById('copy-location').addEventListener('click', function() {
                const latLng = endMarker.getPosition(); // Get the end location's LatLng from the map
                const googleMapsUrl = `https://www.google.com/maps?q=${latLng.lat()},${latLng.lng()}`;

                // Create a temporary input to copy the URL
                const tempInput = document.createElement('input');
                tempInput.value = googleMapsUrl;
                document.body.appendChild(tempInput);

                tempInput.select();
                tempInput.setSelectionRange(0, 99999); // For mobile devices
                document.execCommand('copy'); // Copy the URL to clipboard

                document.body.removeChild(tempInput); // Remove the temporary input element

                // Optional: Show a confirmation message
                alert('Location URL copied to clipboard: ' + googleMapsUrl);
            });

        });
</script>

<script type="text/javascript">
    $(document).ready(function() {
            visitStatus();
        })

        function visitStatus() {
            var id = "{{ $visits->id }}";
            $.ajax({
                url: '{{ route('dashboard.visits.updateStatus') }}',
                type: 'post',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    var steps = document.getElementsByClassName('step');

                    $.each(steps, function(index, node) {
                        var stepNum = node.getAttribute('data-id');
                        if (data != 5 && data != 6) {

                            if (stepNum == data) {
                                node.setAttribute("id", "await");
                            }
                            if (stepNum < data) {
                                node.setAttribute("id", "done");
                            }
                        } else if (data == 5 || data == 6) {


                            if (stepNum == 5 && data == 5) {
                                node.querySelector('.step-bar-left').setAttribute("style",
                                    "display:none;")
                            }

                            if (stepNum == data) {
                                node.setAttribute("id", "done");

                            }
                            if (stepNum < data) {
                                node.setAttribute("id", "done");
                            }

                            if (stepNum == 6 && data == 5) {
                                node.setAttribute("style", "display:none;");
                            } else if (stepNum == 5 && data == 6) {
                                node.setAttribute("style", "display:none;");
                            }


                        }


                    })
                }
            });
        }
</script>

<script type="text/javascript">
    var map, directionsService, directionsRenderer, currentZoomLevel, currentMapCenter;
        var startMarker;
        var endMarker;

        function initMap() {
            // Create a new map centered on the starting point
            const locations = <?php echo json_encode($locations); ?>;
            const myLatLng = {
                lat: Number(locations[0].lat),
                lng: Number(locations[0].lng)
            };
            console.log(myLatLng);
            console.log({
                lat: Number(locations[1].lat),
                lng: Number(locations[1].lng)
            });
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: myLatLng
            });
            startMarker = new google.maps.Marker({
                position: {
                    lat: Number(locations[1].lat),
                    lng: Number(locations[1].lng)
                },

                icon: {
                    url: '{{ asset('storage/images/technicians/tech.png') }}',
                    scaledSize: new google.maps.Size(60, 60), // scaled size
                    origin: new google.maps.Point(0, 0), // origin
                    anchor: new google.maps.Point(30, 30) // anchor
                },

                map: map
            });
            endMarker = new google.maps.Marker({
                position: myLatLng,

                map: map
            });

            // const marker = new google.maps.Marker({
            //     position: myLatLng,
            //     map,
            // });

            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps
                .DirectionsRenderer({
                    map: map,
                    suppressMarkers: true
                });
            currentZoomLevel = map.getZoom();
            currentMapCenter = map.getCenter();

            setInterval(getLocation, 10000);
        };


        function getLocation() {
            var id = "{{ $visits->id }}";
            $.ajax({
                url: '{{ route('dashboard.visits.getLocation') }}',
                type: 'post',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data[1].lat != 0 && data[1].lng != 0 && data[0].lat != 0 && data[0].lng != 0) {
                        updateRoute(data);
                        //  clearMarkers();
                    } else {
                        const myLatLng = {
                            lat: data[0].lat,
                            lng: data[0].lng
                        };
                        const marker = new google.maps.Marker({
                            position: myLatLng,
                            map,
                        });
                    }
                }
            });
        };


        function updateRoute(locations) {
            var startingPoint = new google.maps.LatLng(locations[1].lat, locations[1].lng);
            var destination = new google.maps.LatLng(locations[0].lat, locations[0].lng);

            currentZoomLevel = map.getZoom();
            currentMapCenter = map.getCenter();


            var request = {
                origin: startingPoint,
                destination: destination,
                travelMode: 'DRIVING'
            };

            directionsService.route(request, function(result, status) {
                if (status == 'OK') {
                    // Display the updated route on the map
                    directionsRenderer.setDirections(result);
                    // Update the position of the start marker
                    startMarker.setPosition(result.routes[0].legs[0].start_location);
                    // Update the position of the end marker
                    endMarker.setPosition(result.routes[0].legs[0].end_location);
                    map.setZoom(currentZoomLevel);
                    map.setCenter(currentMapCenter);

                }
            });
        };



        window.initMap = initMap;

        setInterval(visitStatus, 10000);
</script>


<script type="text/javascript" async defer
    src="https://maps.google.com/maps/api/js?key={{ Config::get('app.GOOGLE_MAP_KEY') }}&callback=initMap"></script>
@endpush