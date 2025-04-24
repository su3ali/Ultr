$(document).ready(function () {
    $("#saveCustomer").on("click", function () {
        const phone = $("#phoneInput").val().trim();
        const fullPhone = "966" + phone;
        const $btn = $(this);

        // التحقق من صحة الرقم
        if (!/^5\d{8}$/.test(phone)) {
            toastr.error(
                "الرجاء إدخال رقم جوال صحيح مكون من 9 أرقام ويبدأ بـ 5"
            );
            return;
        }

        // تعيين القيمة النهائية للرقم داخل الفورم
        $('input[name="phone"]').val(fullPhone);

        // تعطيل الزر أثناء المعالجة
        $btn.prop("disabled", true).html(
            '<span class="spinner-border spinner-border-sm"></span> جاري الحفظ...'
        );

        // إرسال البيانات إلى السيرفر
        $.post(storeCustomerUrl, $("#createCustomerForm").serialize())
            .done(function (res) {
                const userId = res.user_id;
                createdUserId = userId;
                $("#car_user_id, #order_user_id").val(userId);

                // عرض السيارات إن وجدت
                if (res.cars && res.cars.length > 0) {
                    debugger;
                    renderUserCars(res.cars);
                } else {
                    showCreateCarOption();
                }

                // الانتقال للخطوة الثانية
                $("#stepperTabs .nav-link").eq(1).tab("show");
                toastr.success(res.message || "تم حفظ العميل بنجاح");
            })
            .fail(function (xhr) {
                if (xhr.status === 422 && xhr.responseJSON?.errors) {
                    const errors = xhr.responseJSON.errors;
                    const allMessages = Object.values(errors).map(
                        (msg) => msg[0]
                    );
                    toastr.error(allMessages.join("<br>"));
                } else {
                    console.error(xhr.responseText);
                    toastr.error("حدث خطأ أثناء حفظ العميل");
                }
            })
            .always(function () {
                $btn.prop("disabled", false).html("التالي");
            });
    });

    //  وظائف مساعدة

    function renderUserCars(cars) {
        let html = `<label class="mb-2 font-weight-bold d-block">اختر سيارة:</label>`;
        cars.forEach((car) => {
            html += `
                <div class="form-check mb-2 car-radio-wrapper">
                    <input class="form-check-input" type="radio" name="car_id" id="car_${car.id}" value="${car.id}">
                    <label class="form-check-label" for="car_${car.id}">${car.plate_number}</label>
                </div>`;
        });

        $("#existingCarsContainer").html(html).show();
        $("#createCarSection").hide();

        // إضافة تغيير اللون عند التحديد
        $('input[name="car_id"]').on("change", function () {
            $(".car-radio-wrapper").removeClass("bg-selected");
            $(this).closest(".car-radio-wrapper").addClass("bg-selected");
        });
    }

    function showCreateCarOption() {
        $("#existingCarsContainer")
            .html(
                '<div class="alert alert-warning">لا توجد سيارات مسجلة لهذا العميل.</div>'
            )
            .show();
        $("#createCarSection").show();
    }
});
