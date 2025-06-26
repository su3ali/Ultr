<div class="modal fade" id="refundModal" tabindex="-1" role="dialog" aria-labelledby="refundModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" id="refundForm" action="">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> {{ __('dash.refund_title') }}</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('dash.refund_text') }}</p>
                    <p class="text-success font-weight-bold" id="refundAmountText"></p>
                    <input type="hidden" name="type" value="points">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"> {{ __('dash.refund_confirm') }}</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('dash.close') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('script')
<script>
    $(document).on('click', '.refund-btn', function () {
    let orderId = $(this).data('order_id');
    let amount = parseFloat($(this).data('order_total')).toFixed(2);
    let actionUrl = '{{ route("dashboard.orders.refund", ":id") }}'.replace(':id', orderId);

    $('#refundForm').attr('action', actionUrl);
    $('#refundAmountText').text('المبلغ: ' + amount + ' ريال');
});

$('#refundForm').on('submit', function (e) {
    e.preventDefault();

    let $form = $(this);
    let url = $form.attr('action');
    let data = $form.serialize();
    let $submitBtn = $form.find('button[type="submit"]');

    $submitBtn.prop('disabled', true).text('... جارٍ المعالجة');

    $.post(url, data)
        .done(function (response) {
            if (response.success) {
                toastr.success(response.message);
                $('#refundModal').modal('hide');
                // Optional: reload DataTable or refresh the UI
                // $('#yourDataTableId').DataTable().ajax.reload();
            } else {
                toastr.error(response.message || 'فشل الاسترداد.');
            }
        })
        .fail(function (xhr) {
            let error = xhr.responseJSON?.message || 'حدث خطأ غير متوقع';
            toastr.error(error);
        })
        .always(function () {
            $submitBtn.prop('disabled', false).text('تأكيد الاسترداد');
        });
});

</script>

@endpush