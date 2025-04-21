// ========== [1] JavaScript for Saving Car ==========
$(document).ready(function () {
    $(document).on("click", "#saveCar", function () {
        const plate = $("#plateInput").val().trim();
        const userId = $("#modal_car_user_id").val();
        const $btn = $(this);
        const nextLabel = $btn.data("next-label") || "التالي";

        if (!plate || !userId) {
            toastr.warning("يرجى إدخال رقم اللوحة والتأكد من وجود العميل");
            return;
        }

        $btn.prop("disabled", true).html(
            '<span class="spinner-border spinner-border-sm mr-1"></span> جاري التحقق...'
        );

        $.post("/admin/check-car", {
            _token: csrfToken,
            user_id: userId,
            Plate_number: plate,
        })
            .done(function (res) {
                if (res.exists) {
                    $('input[name="car_id"]').val(res.car_id);
                    toastr.success("تم العثور على السيارة، جاري المتابعة");
                    $("#createCarModal").modal("hide");
                    setTimeout(() => {
                        goToStep(3);
                    }, 300);
                } else {
                    $.post(
                        "/admin/store-car",
                        $("#modalCreateCarForm").serialize()
                    )
                        .done(function (res2) {
                            if (res2.status && res2.car_id) {
                                toastr.success("تم إنشاء السيارة بنجاح");

                                $("#createCarModal").modal("hide");
                                fetchCustomerCars(userId);

                                setTimeout(() => {
                                    $(`#car_${res2.car_id}`)
                                        .prop("checked", true)
                                        .trigger("change");
                                    $('input[name="car_id"]').val(res2.car_id);
                                    goToStep(3);
                                }, 600);
                            } else {
                                toastr.error(res2.message || "فشل حفظ السيارة");
                            }
                        })
                        .fail(() => {
                            toastr.error("حدث خطأ أثناء حفظ السيارة");
                        })
                        .always(() => {
                            $btn.prop("disabled", false).html(nextLabel);
                        });
                }

                $btn.prop("disabled", false).html(nextLabel);
            })
            .fail(() => {
                toastr.error("فشل في التحقق من السيارة");
                $btn.prop("disabled", false).html(nextLabel);
            });
    });
});
