<!-- Modal for Rescheduling -->
<div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">المواعيد المتاحة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p class="text-center">يرجى اختيار أحد الخيارات:</p>

                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <!-- Keep the same time option -->
                    <label class="option-card">
                        <input type="radio" name="timeChoice" id="keepSameTime" value="same" checked>
                        <div class="option-content">
                            <i class="fas fa-clock"></i>
                            <p>الاحتفاظ بالموعد الأصلي</p>
                        </div>
                    </label>

                    <!-- Select a new time option -->
                    <label class="option-card">
                        <input type="radio" name="timeChoice" id="chooseNewTime" value="new">
                        <div class="option-content">
                            <i class="fas fa-calendar-alt"></i>
                            <p>اختيار وقت جديد</p>
                        </div>
                    </label>
                </div>

                <div id="newTimeContainer" class="mt-3 d-none">
                    <p class="text-center">يرجى اختيار وقت جديد من الأوقات المتاحة:</p>
                    <div id="timeButtonsContainer"></div>
                    <div id="loadingSpinner" class="d-none text-center mt-3">
                        <i class="fa fa-spinner fa-spin"></i> تحميل البيانات...
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">رجوع</button>
                <button type="button" class="btn btn-primary" id="confirmButton">تأكيد</button>
            </div>
        </div>
    </div>
</div>