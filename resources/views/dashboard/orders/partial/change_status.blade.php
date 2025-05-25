<!-- Change Status Modal -->
<div class="modal fade" id="changeStatusModal" tabindex="-1" aria-labelledby="changeStatusModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="changeStatusForm" class="modal-content shadow-sm border-0 rounded-3">
            @csrf

            <div class="modal-header bg-light border-bottom-0">
                <h5 class="modal-title fw-bold text-dark" id="changeStatusModalLabel">
                    <i class="fas fa-sync-alt me-2 text-primary"></i> تغيير حالة الطلب
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="orderId" name="order_id">
                <div class="mb-3">
                    <label for="newStatus" class="form-label fw-semibold text-secondary">{{ __('dash.choose_status')
                        }}</label>
                    <select class="form-select rounded-2" id="newStatus" name="status_id" required>
                        @foreach($orderStatusOptions as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="modal-footer bg-light border-top-0 d-flex justify-content-between">
                <button type="submit" class="btn btn-success px-4">
                    <i class="fas fa-check-circle me-1"></i> {{ __('dash.save') }}

                </button>
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">
                    {{ __('dash.close') }}
                </button>
            </div>
        </form>
    </div>
</div>