@extends('dashboard.layout.layout')
@push('style')
<link href="{{ asset('css/VisitShowStyle.css') }}" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item active" aria-current="page">عرض الشكوى</li>
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

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-5">
                                <h3 class="card-title">تفاصيل الشكوى</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">

                        <table class="table table-bordered nowrap">

                            <thead>
                                <tr>
                                    <th>اسم العميل</th>
                                    <td>{{ $user?->first_name . '' . $user?->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>هاتف العميل</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>رقم الشكوى</th>
                                    <td>{{ $customerComplaint->id }}</td>
                                </tr>
                                <tr>
                                    @php
                                    $date =
                                    Illuminate\Support\Carbon::parse($customerComplaint->created_at)->timezone('Asia/Riyadh');
                                    @endphp
                                    <th>تاريخ الشكوى</th>
                                    <td>{{ $date->format('Y-m-d H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>نص الشكوى</th>
                                    <td>{{ $customerComplaint->text }}</td>
                                </tr>
                                <tr>
                                    <th>الصور</th>
                                    <td>
                                        @if ($customerComplaintImages && count($customerComplaintImages) > 0)
                                        @foreach ($customerComplaintImages as $customerComplaintImage)
                                        <div class="container__img-holder">
                                            <img class="img-fluid" src="{{ asset($customerComplaintImage->image) }}">

                                        </div>
                                        @endforeach
                                        @else
                                        لا يوجد صور
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>الفيديو</th>
                                    <td>
                                        @if ($customerComplaint->video != null)
                                        <div class="card-body p-0" style="margin: auto">

                                            <video width="500" height="240" controls>
                                                <source src="{{ URL::asset($customerComplaint->video) }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>

                                        </div>
                                        @else
                                        لا يوجد فيديو
                                        @endif
                                    </td>
                                </tr>

                            </thead>

                        </table><!-- end of table -->
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body p-0">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-5">
                                    <h3 class="card-title">تفاصيل الطلب</h3>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered nowrap">

                            <thead>
                                <tr>
                                    <th>رقم الطلب</th>
                                    <td>{{ $order->id }}</td>
                                </tr>
                                <tr>
                                    @php
                                    $date =
                                    Illuminate\Support\Carbon::parse($order->created_at)->timezone('Asia/Riyadh');
                                    @endphp
                                    <th>تاريخ الطلب</th>
                                    <td>{{ $date->format('Y-m-d H:i:s') }}</td>
                                </tr>

                                <tr>

                                    <th>القسم</th>
                                    <td>
                                        @foreach ($categories as $item)
                                        <button class="btn-sm btn-primary">{{ $item->title }}</button>
                                        @endforeach
                                    </td>
                                </tr>

                                <tr>

                                    <th>عدد الخدمات</th>
                                    <td>
                                        {{ $order->services->count() }}
                                    </td>
                                </tr>


                                <tr>
                                    <th>حاله الطلب</th>
                                    <td>{{ $order->status?->name }}</td>
                                </tr>
                                <tr>
                                    <th>طريقه الدفع</th>
                                    <td>{{ $order->transaction?->payment_method }}</td>
                                </tr>
                                <tr>
                                    <th>الاجمالي</th>
                                    <td>{{ $order->sub_total }}</td>
                                </tr>
                                <tr>
                                    <th>الاجمالي بعد الخصم</th>
                                    <td>{{ $order->total }}</td>
                                </tr>

                                <tr>
                                    <th>نوع السياره</th>
                                    <td>{{ $order->userCar?->type?->name }}</td>
                                </tr>
                                <tr>
                                    <th>موديل السياره</th>
                                    <td>{{ $order->userCar?->model?->name }}</td>
                                </tr>
                                <tr>
                                    <th>لون السياره</th>
                                    <td>{{ $order->userCar?->color }}</td>
                                </tr>
                                <tr>
                                    <th>رقم لوحة السياره</th>
                                    <td>{{ $order->userCar?->Plate_number }}</td>
                                </tr>
                                <tr>
                                    <th>اسماء الخدمات</th>

                                    <td>
                                        @foreach ($order->services as $service)
                                        <button class="btn-sm btn-primary">{{ $service->title }}</button>
                                        @endforeach
                                    </td>

                                </tr>
                                @if ($order->image != null || $order->image != '')
                                <tr>
                                    <th>صوره المرفقه</th>
                                    <td>
                                        <div class="container__img-holder">
                                            {{-- <img
                                                src="https://images.pexels.com/photos/459225/pexels-photo-459225.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
                                                alt="Image"> --}}
                                            <img class="img-fluid" src="{{ asset($order->image) }}">

                                        </div>
                                        {{-- <img class="img-fluid" style="width: 40px;" src="{{asset($order->image)}}">
                                        --}}
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <th>الملاحظات</th>
                                    <td>{{ $order->notes }}</td>
                                </tr>

                            </thead>

                        </table><!-- end of table -->


                    </div>
                    <!-- /.card-body -->
                </div>

                @if ($order->file != null)
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-5">
                                <h3 class="card-title">عرض الفيديو</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0" style="margin: auto">

                        <video width="500" height="240" controls>
                            <source src="{{ URL::asset($order->file) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>

                    </div>
                    <!-- /.card-body -->
                </div>
                @endif


                <div class="col-md-7 text-end btn-action">

                    <button id="openComplaintModal" class="btn btn-primary">
                        {{ __('dash.add_reply')
                        }}
                    </button>
                </div>

                <div class="card">
                    <div class="card-body p-0">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title">{{ __('dash.reply_details_to_complaint')
                                        }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <!--  complaintReply -->
                                    @forelse ($customerComplaint->complaintReply as $reply)
                                    <tr>
                                        <th>{{ __('dash.responsible_employee')
                                            }}</th>
                                        <td>
                                            {{ optional($reply->admin)->first_name . ' ' .
                                            optional($reply->admin)->last_name ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> {{ __('dash.reply_details')
                                            }}</th>
                                        <td>{{ $reply->text ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th> {{ __('dash.reply_date')
                                            }}</th>
                                        <td>{{ optional($reply->created_at)->format('Y-m-d') ?? '' }}</td>
                                    </tr>

                                    @if (!empty($reply->file_path))
                                    <tr>
                                        <th>{{ __('dash.attachment')
                                            }}</th>
                                        <td>
                                            <a href="{{ asset($reply->file_path) }}" target="_blank">
                                                <img class="img-fluid rounded border"
                                                    src="{{ asset($reply->file_path) }}" alt="{{ __('dash.attachment')
                                            }}" style="max-width: 150px; max-height: 150px;">
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @empty
                                    <tr>
                                        <td colspan="2" class="text-center">{{ __('dash.no_reply_to_complaint')
                                            }}</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table><!-- end of table -->
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>



                <!--  Modal -->
                <div class="modal fade" id="complaintModal" tabindex="-1" aria-labelledby="complaintModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="complaintModalLabel">معالجة الشكوى</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('dashboard.order.complaintsAction') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $customerComplaint->id }}">

                                    <div class="mb-3">
                                        <label for="status" class="form-label">حالة الشكوى</label>
                                        <select class="form-select" id="status" name="status">
                                            @foreach ($statuses as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="attachment" class="form-label">إرفاق ملف</label>
                                        <input type="file" class="form-control" id="attachment" name="file_path">
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">اضافة تفاصيل للإجراء</label>
                                        <textarea class="form-control" id="description" name="desc" rows="3"></textarea>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">إغلاق</button>
                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>




    </div>

</div>

<div class="img-popup">
    <img src="" alt="Popup Image">
    <div class="close-btn">
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {

            // required elements
            var imgPopup = $('.img-popup');
            var imgCont = $('.container__img-holder');
            var popupImage = $('.img-popup img');
            var closeBtn = $('.close-btn');

            // handle events
            imgCont.on('click', function() {
                var img_src = $(this).children('img').attr('src');
                imgPopup.children('img').attr('src', img_src);
                imgPopup.addClass('opened');
            });

            $(imgPopup, closeBtn).on('click', function() {
                imgPopup.removeClass('opened');
                imgPopup.children('img').attr('src', '');
            });

            popupImage.on('click', function(e) {
                e.stopPropagation();
            });

        });


        document.addEventListener("DOMContentLoaded", function () {
        var complaintButton = document.getElementById("openComplaintModal");
        var complaintModal = new bootstrap.Modal(document.getElementById("complaintModal"));

        complaintButton.addEventListener("click", function () {
            complaintModal.show();
        });
    });
</script>
@endpush