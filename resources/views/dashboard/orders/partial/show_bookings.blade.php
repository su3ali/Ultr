<div class="modal fade " id="changeGroupModel" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dash.bookings') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <table id="bookings-table" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>رقم الحجز</th>
                            <th>اسم الفني</th>
                            <th>التاريخ</th>
                            <th>الوقت</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dynamic rows will be inserted here -->
                    </tbody>
                </table>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                        {{ __('dash.close') }}
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>


@push('script')
<script type="text/javascript">
    $(document).on('click', '#show-bookings', function() {
            /*         let bookings = $(this).data('bookings'); */
            let orderId = $(this).data('id');
            /*  console.log(bookings); */

            if ($.fn.DataTable.isDataTable('#bookings-table')) {
                $('#bookings-table').DataTable().destroy();
            }

            $('#bookings-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                paging: false,
                info: false,
                searching: false,
                lengthChange: false,
                ajax: {
                    url: '{{ route('dashboard.orders.bookings', ':orderId') }}'.replace(':orderId',
                        orderId), // Assuming bookings is not empty
                    dataSrc: function(json) {
                        return json.data || [];
                    }
                },
                columns: [{
                        data: 'booking_id',
                        name: 'booking_id'
                    },
                    {
                        data: 'technican_name',
                        name: 'technican_name'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'time',
                        name: 'time'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    }
                ]
            });
        });
</script>
@endpush