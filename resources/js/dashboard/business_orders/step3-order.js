$(document).ready(function () {
    function fetchServicePrice() {
        const projectId = $("#client_project_id").val();
        const serviceId = $("#serviceSelect").val();

        if (!projectId || !serviceId) {
            $("#servicePriceInput").val("");
            return;
        }

        $.post(
            "/admin/get-service-price",
            {
                _token: csrfToken,
                client_project_id: projectId,
                service_id: serviceId,
            },
            function (res) {
                $("#servicePriceInput").val(res.price ?? "");
            }
        ).fail(() => {
            toastr.error("فشل في تحميل سعر الخدمة");
            $("#servicePriceInput").val("");
        });
    }

    $("#client_project_id").on("change", function () {
        const projectId = $(this).val();
        $("#branch_id").html('<option value="">تحميل...</option>');
        $("#floor_id").html('<option value="">اختر</option>');

        if (projectId) {
            $.get(
                `/admin/get-project-branches/${projectId}`,
                function (branches) {
                    let html =
                        '<option value="">{{ __("dash.choose") }}</option>';
                    branches.forEach((branch) => {
                        html += `<option value="${branch.id}">${branch.name_ar}</option>`;
                    });
                    $("#branch_id").html(html);
                }
            ).fail(() => toastr.error("فشل تحميل الفروع"));
        }
    });

    $("#branch_id").on("change", function () {
        const branchId = $(this).val();
        $("#floor_id").html('<option value="">تحميل...</option>');

        if (branchId) {
            $.get(`/admin/get-branch-floors/${branchId}`, function (floors) {
                let html = '<option value="">{{ __("dash.choose") }}</option>';
                floors.forEach((floor) => {
                    html += `<option value="${floor.id}">${floor.name_ar}</option>`;
                });
                $("#floor_id").html(html);
            }).fail(() => toastr.error("فشل تحميل الطوابق"));
        }
    });

    $("#client_project_id, #serviceSelect").on("change", fetchServicePrice);

    // لو فتحنا المودال نحدث السعر مباشرة
    $("#createModal").on("shown.bs.modal", fetchServicePrice);
});
